<?php

namespace App\Http\Controllers\backend;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ClassController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view class', only: ['index']),
            new Middleware('permission:create class', only: ['create']),
            new Middleware('permission:edit class', only: ['edit']),
            new Middleware('permission:delete class', only: ['destroy']),
        ];
    }
    public function index()
    {
        $classes = Classes::orderByDesc('id')->get();

        return view('backend.class.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
        ]);

        Classes::create([
            'name'      => $request->name,
            'created_by'      => Auth::user()->id,
            'status'  => $request->status,
        ]);


        flash()->success('Class has been created successfully!');

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::find($id);

        return view('backend.class.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
        ]);

        $classes = Classes::find($id);

        $classes->name = $request->name;
        $classes->status = $request->status;
        $classes->created_by = Auth::user()->id;

        $classes->save();

        flash()->success('Class has been updated successfully!');

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classes = Classes::find($id);

        $classes->delete();
        flash()->success('Class has been deleted successfully!');
        return redirect()->route('classes.index');
    }
}
