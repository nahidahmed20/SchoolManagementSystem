<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TeacherController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view teacher', only: ['index']),
            new Middleware('permission:create teacher', only: ['create']),
            new Middleware('permission:edit teacher', only: ['edit']),
            new Middleware('permission:delete teacher', only: ['destroy']),
        ];
    }
    public function index()
    {
        $teachers = User::where('is_admin',4)->orderByDesc('id')->get();
        return view('backend.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email,',
            'gender'            => 'required|in:Male,Female,Other',
            'date_of_birth'     => 'required|date|before:today',
            'date_of_joining'   => 'required|date',
            'designation'       => 'required|string|max:100',
            'department'        => 'required|string|max:100',
            'number'            => 'required|string|max:20',
            'marital_status'    => 'required',
            'qualification'     => 'required|string|max:150',
            'work_experience'   => 'required|string|max:150',
            'nationality'       => 'required|string|max:100',
            'blood_group'       => 'required',
            'address'           => 'required|string|max:200',
            'note'              => 'required|string|max:255',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'password'          => 'required|string|min:8|confirmed',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/teachers/');
            $image->move($destinationPath, $name);
            $imageUrl = 'uploads/teachers/'.$name;
        }

        User::create([
            'name'              => $request->name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'gender'            => $request->gender,
            'date_of_birth'     => $request->date_of_birth,
            'date_of_joining'   => $request->date_of_joining,
            'designation'       => $request->designation,
            'department'        => $request->department,
            'number'            => $request->number,
            'marital_status'    => $request->marital_status,
            'qualification'     => $request->qualification,
            'work_experience'   => $request->work_experience,
            'nationality'       => $request->nationality,
            'blood_group'       => $request->blood_group,
            'address'           => $request->address,
            'note'              => $request->note,
            'image'             => $imageUrl,
            'password'          => Hash::make($request->password),
            'is_admin'          => 4,
            'created_by'        => Auth::user()->id,
            'status'            => $request->status,
        ]);

        flash()->success('Teacher has been created successfully!');

        return redirect()->route('teachers.index');

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
        $teacher = User::find($id);
        return view('backend.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teacher = User::findOrFail($id);

        $request->validate([
            'name'              => 'required|string|max:100',
            'last_name'         => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email,' . $teacher->id,
            'gender'            => 'required|in:Male,Female,Other',
            'date_of_birth'     => 'required|date|before:today',
            'date_of_joining'   => 'required|date',
            'designation'       => 'required|string|max:100',
            'department'        => 'required|string|max:100',
            'number'            => 'required|string|max:20',
            'marital_status'    => 'required',
            'qualification'     => 'required|string|max:150',
            'work_experience'   => 'required|string|max:150',
            'nationality'       => 'required|string|max:100',
            'blood_group'       => 'required',
            'address'           => 'required|string|max:200',
            'note'              => 'required|string|max:255',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'password'          => 'nullable|string|min:8|confirmed',
        ]);

        // Handle image upload
        if($request->hasFile('image')){
            // Delete old image if exists
            if($teacher->image && file_exists(public_path($teacher->image))){
                unlink(public_path($teacher->image));
            }

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/teachers/');
            $image->move($destinationPath, $name);
            $teacher->image = 'uploads/teachers/' . $name;
        }

        // Update fields
        $teacher->name              = $request->name;
        $teacher->last_name         = $request->last_name;
        $teacher->email             = $request->email;
        $teacher->gender            = $request->gender;
        $teacher->date_of_birth     = $request->date_of_birth;
        $teacher->date_of_joining   = $request->date_of_joining;
        $teacher->designation       = $request->designation;
        $teacher->department        = $request->department;
        $teacher->number            = $request->number;
        $teacher->marital_status    = $request->marital_status;
        $teacher->qualification     = $request->qualification;
        $teacher->work_experience   = $request->work_experience;
        $teacher->nationality       = $request->nationality;
        $teacher->blood_group       = $request->blood_group;
        $teacher->address           = $request->address;
        $teacher->note              = $request->note;
        $teacher->status            = $request->status;

        // Update password only if provided
        if($request->filled('password')){
            $teacher->password = bcrypt($request->password);
        }

        $teacher->save();

        flash()->success('Teacher has been updated successfully!');

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = User::find($id);
        if($teacher->image && file_exists(public_path($teacher->image))){
            unlink(public_path($teacher->image));
        }
        $teacher->delete();

        flash()->success('Teacher has been deleted successfully!');

        return redirect()->route('teachers.index');
    }
}
