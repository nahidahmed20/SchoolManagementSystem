<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only: ['index']),
            new Middleware('permission:create user', only: ['create']),
            new Middleware('permission:edit user', only: ['edit']),
            new Middleware('permission:delete user', only: ['destroy']),
        ];
    }
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $roles = Role::orderBy('name', 'asc')->get();
        return view('user.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'asc')->get();
  
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles'    => 'required|array',
        ]);

        // User create
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign roles (Spatie Permission)
        if (!empty($validatedData['roles'])) {
            $user->syncRoles($validatedData['roles']); 
        }

        // Success message
        flash()->success('User created successfully.', ['title' => 'Success']);
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        // Show user data
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray(); 

        return view('user.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'required|array'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->syncRoles($roleNames);

        flash()->success('User updated successfully.', ['title' => 'Success']);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flash()->success('User deleted successfully.', ['title' => 'Success']);
        return redirect()->route('user.index');
    }
}
