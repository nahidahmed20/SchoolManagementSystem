<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SchoolController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view school', only: ['index']),
            new Middleware('permission:create school', only: ['create']),
            new Middleware('permission:edit school', only: ['edit']),
            new Middleware('permission:delete school', only: ['destroy']),
        ];
    }

    public function index()
    {
        $schools = User::orderBy('id', 'desc')->where('is_admin', 2)->get();

        return view('backend.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users',
            'address'          => 'required|string|max:255',
            'password'         => 'required|string|min:6|confirmed',
            'profile_picture'  => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('profile_picture')){
            $image = $request->file('profile_picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/schools/');
            $image->move($destinationPath, $name);
            $imageUrl = '/uploads/schools/'.$name;
        }

        User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'address'          => $request->address,
            'password'         => Hash::make($request->password),   
            'image'            => $imageUrl,
            'is_admin'         => 2,
            'created_by'       => Auth::user()->id,
            'status'           => $request->status,
        ]);

        flash()->success('School created successfully.', ['title' => 'Success']);
        return redirect()->route('schools.index');

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
    public function edit($id)
    {
        $school = User::findOrFail($id);
        return view('backend.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $school = User::findOrFail($id);

        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users,email,'.$school->id,
            'address'          => 'required|string|max:255',
            'password'         => 'nullable|string|min:6|confirmed',
            'profile_picture'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'           => 'required|boolean',
        ]);
        $imageUrl = $school->image;
        // Handle profile picture
        if($request->hasFile('profile_picture')){
            if($school->image && file_exists(public_path('uploads/schools/'.$school->image))){
                unlink(public_path('uploads/schools/'.$school->image)); 
            }
            $image = $request->file('profile_picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/schools/'), $name);
            $imageUrl = '/uploads/schools/'.$name;
        }
        
        $school->name    = $request->name;
        $school->email   = $request->email;
        $school->address = $request->address;
        $school->image   = $imageUrl;
        $school->status  = $request->status;

        if($request->password){
            $school->password = Hash::make($request->password);
        }

        $school->save();

        flash()->success('School updated successfully.', ['title' => 'Success']);
        return redirect()->route('schools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $school = User::findOrFail($id);

        if($school->image && file_exists(public_path('uploads/schools/'.$school->image))){
            unlink(public_path('uploads/schools/'.$school->image));
        }

        $school->delete();

        flash()->success('School deleted successfully.', ['title' => 'Success']);
        return redirect()->back();
    }
}
