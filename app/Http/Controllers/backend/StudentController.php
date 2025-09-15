<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('is_admin', 5)->with('classes')->get();
        // dd($students);
        return view('backend.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::where('status',1)->get();
        return view('backend.student.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'              => 'required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'admission_number'  => 'required|unique:users,admission_number',
            'roll_number'       => 'nullable|unique:users,roll_number',
            'gender'            => 'required',
            'date_of_birth'     => 'required',
            'class_id'          => 'required',
            'caste'             => 'nullable|string|max:255',
            'religion'          => 'nullable|string|max:255',
            'number'            => 'required|string|max:20',
            'admission_date'    => 'required|date',
            'blood_group'       => 'nullable',
            'height'            => 'nullable|string|max:50',
            'weight'            => 'nullable|string|max:50',
            'nationality'       => 'nullable|string|max:255',
            'address'           => 'nullable|string|max:500',
            'note'              => 'nullable|string|max:1000',
            'password'          => 'required|string|min:8|confirmed',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            $image->move($destinationPath, $name);
            $imageUrl = 'uploads/students/'.$name;
        }

        User::create([
            'name'              => $request->name,
            'last_name'         => $request->last_name,
            'admission_number'  => $request->admission_number,
            'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'date_of_birth'     => $request->date_of_birth,
            'class_id'          => $request->class_id,
            'caste'             => $request->caste,
            'religion'          => $request->religion,
            'number'            => $request->number,
            'admission_date'   => $request->admission_date,
            'blood_group'       => $request->blood_group,
            'height'            => $request->height,
            'weight'            => $request->weight,
            'nationality'       => $request->nationality,
            'address'           => $request->address,
            'note'              => $request->note,
            'password'          => Hash::make($request->password),
            'image'             => $imageUrl,
            'is_admin'          => 5,
            'created_by'        => Auth::user()->id,
            'status'            => $request->status,
        ]);

        flash()->success('Student has been created successfully!');

        return redirect()->route('students.index');
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
        $student = User::findOrFail($id);
        $classes = Classes::where('status',1)->get();

        return view('backend.student.edit',compact('student','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = User::findOrFail($id);

        $request->validate([
            'name'              => 'required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'admission_number'  => 'required',
            'roll_number'       => 'nullable' ,
            'gender'            => 'required|in:Male,Female,Other',
            'date_of_birth'     => 'required|date|before:today',
            'class_id'          => 'required',
            'caste'             => 'nullable|string|max:255',
            'religion'          => 'nullable|string|max:255',
            'number'            => 'required|string|max:20',
            'admission_date'    => 'required|date',
            'blood_group'       => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'height'            => 'nullable|string|max:50',
            'weight'            => 'nullable|string|max:50',
            'nationality'       => 'nullable|string|max:255',
            'address'           => 'nullable|string|max:500',
            'note'              => 'nullable|string|max:1000',
            'password'          => 'nullable|string|min:8|confirmed',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'            => 'required|in:0,1',
        ]);

        $data = $request->only([
            'name','last_name','admission_number','roll_number','gender',
            'date_of_birth','class_id','caste','religion','number','admission_date',
            'blood_group','height','weight','nationality','address','note','status'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($student->image && file_exists(public_path($student->image))) {
                unlink(public_path($student->image));
            }

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/students/'), $name);
            $data['image'] = 'uploads/students/'.$name;
        }

        // $data['updated_by'] = Auth::id();

        $student->update($data);

        flash()->success('Student has been updated successfully!');

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = User::find($id);
        if($student->image && file_exists(public_path($student->image))){
            unlink(public_path($student->image));
        }
        $student->delete();

        flash()->success('Student has been deleted successfully!');

        return redirect()->route('students.index');
    }
}
