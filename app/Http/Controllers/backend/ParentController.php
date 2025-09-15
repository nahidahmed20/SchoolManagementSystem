<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = User::where('is_admin',6)->orderBy('id', 'desc')->get();

        return view('backend.parent.index', compact('parents'));
    }

    public function myStudents($id)
    {
        $studentLists = User::where('is_admin',5)->orderBy('id', 'desc')->get();

        $parent = User::find($id);
        $students = $parent->students;
        
        return view('backend.parent.my-students', compact('studentLists','parent','students'));
    }

    public function addMyStudent($student, $parent)
    {
        $student = User::find($student);
        $student->parent_id = $parent;
        $student->save();
        
        flash()->success('Parent has been added successfully!');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.parent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'gender'     => 'required|in:Male,Female,Other',
            'occupation' => 'nullable|string|max:255',
            'number'     => 'required|string|max:20',
            'address'    => 'nullable|string|max:255',
            'password'   => 'required|confirmed|min:6',
            'status'     => 'required|in:0,1',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/parents/');
            $image->move($destinationPath, $name);
            $imagePath = 'uploads/parents/'.$name;
        }

        $parent = User::create([
            'name'        => $validated['name'],
            'last_name'   => $validated['last_name'] ?? null,
            'gender'      => $validated['gender'],
            'occupation'  => $validated['occupation'] ?? null,
            'number'      => $validated['number'],
            'address'     => $validated['address'] ?? null,
            'password'    => Hash::make($validated['password']),
            'status'      => $validated['status'],
            'image'       => $imagePath,
            'is_admin'    => 6, 
            'created_by'  => Auth::user()->id,
        ]);

        flash()->success('Parent has been created successfully!');

        return redirect()->route('parents.index');
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
        $parent = User::find($id);

        return view('backend.parent.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $parent = User::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'last_name'  => 'nullable|string|max:100',
            'gender'     => 'required|in:Male,Female,Other',
            'occupation' => 'nullable|string|max:255',
            'number'     => 'required|string|max:20',
            'address'    => 'nullable|string|max:255',
            'password'   => 'nullable|confirmed|min:6',
            'status'     => 'required|in:0,1',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Image upload handling
        if($request->hasFile('image')){
            // Delete old image if exists
            if($parent->image && file_exists(public_path($parent->image))){
                unlink(public_path($parent->image));
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/parents/');
            $image->move($destinationPath, $name);
            $imagePath = 'uploads/parents/'.$name;
        } else {
            $imagePath = $parent->image; // keep old image
        }

        $parent->update([
            'name'        => $validated['name'],
            'last_name'   => $validated['last_name'] ?? null,
            'gender'      => $validated['gender'],
            'occupation'  => $validated['occupation'] ?? null,
            'number'      => $validated['number'],
            'address'     => $validated['address'] ?? null,
            'password'    => $validated['password'] ? Hash::make($validated['password']) : $parent->password,
            'status'      => $validated['status'],
            'image'       => $imagePath,
        ]);

        flash()->success('Parent has been updated successfully!');
        return redirect()->route('parents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parent = User::findOrFail($id);

        // Delete image if exists
        if($parent->image && file_exists(public_path($parent->image))){
            unlink(public_path($parent->image));
        }

        $parent->delete();

        flash()->success('Parent has been deleted successfully!');
        return redirect()->route('parents.index');
    }

}
