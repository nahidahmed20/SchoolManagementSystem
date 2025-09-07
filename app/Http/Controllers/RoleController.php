<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view role', only: ['index']),
            new Middleware('permission:create role', only: ['create']),
            new Middleware('permission:edit role', only: ['edit']),
            new Middleware('permission:delete role', only: ['destroy']),
        ];
    }
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();

        return view('role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array', // optional validation
        ]);

        // নতুন role create
        $role = Role::create(['name' => $request->name]);

        // Permissions assign (if any)
        $role->syncPermissions($request->permissions ?? []);

        flash()->success('Role created successfully.', ['title' => 'Success']);
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('name', 'asc')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' =>'required|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        $permissionIds = $request->permissions ?? [];

        // Convert IDs to names
        $permissionNames = Permission::whereIn('id', $permissionIds)
                            ->pluck('name')
                            ->toArray();

        $role->syncPermissions($permissionNames);

        flash()->success('Role updated successfully.', ['title' => 'Success']);
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();        
        flash()->success('Role deleted successfully.', ['title' => 'Success']);
        return redirect()->route('role.index');
    }
}
