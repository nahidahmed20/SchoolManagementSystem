<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permission', only: ['index']),
            new Middleware('permission:create permission', only: ['create']),
            new Middleware('permission:edit permission', only: ['edit']),
            new Middleware('permission:delete permission', only: ['destroy']),
        ];
    }
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:permissions,name',
        ]);

        Permission::create($request->all());
        flash()->success('Permission created successfully.', ['title' => 'Success']);
        return redirect()->route('permission.index');
    }


    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update($request->only('name'));

        flash()->success('Permission updated successfully.', ['title' => 'Success']);
        return redirect()->route('permission.index');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        flash()->success('Permission deleted successfully.', ['title' => 'Success']);
        return redirect()->back();
    }
}
