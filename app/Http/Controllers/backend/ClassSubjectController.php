<?php

namespace App\Http\Controllers\backend;

use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use Illuminate\Support\Facades\Auth;


class ClassSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classSubjects = ClassSubject::with(['classRelation','subject'])->get();
        return view('backend.class_subject.index', compact('classSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::get();
        $subjects = Subject::get();

        return view('backend.class_subject.create', compact('classes','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            "class_id"   => "required",
            "subject_id" => "required",
            "status"     => "required"
        ]);

        // Check duplicate
        $exists = ClassSubject::where('class_id', $request->class_id)
                    ->where('subject_id', $request->subject_id)
                    ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->with('error', 'This subject is already assigned to this class.')
                ->withInput();
        }

        ClassSubject::create([
            "class_id"   => $request->class_id,
            "subject_id" => $request->subject_id,
            "status"     => $request->status,
            'created_by' => Auth::user()->id,
        ]);

        flash("Class Subject Created Successfully");
        return redirect()->route('class-subjects.index');
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
        $classes = Classes::get();
        $subjects = Subject::get();
        $classSubject = ClassSubject::find($id);

        return view('backend.class_subject.edit',compact('classSubject', 'classes','subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "class_id"   => "required",
            "subject_id" => "required",
            "status"     => "required"
        ]);

        $exists = ClassSubject::where('class_id', $request->class_id)
            ->where('subject_id', $request->subject_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->route('class-subjects.index')
                ->with('success', 'Class Subject updated successfully.');
        }

        $classSubject = ClassSubject::findOrFail($id);

        $classSubject->update([
            "class_id"   => $request->class_id,
            "subject_id" => $request->subject_id,
            "status"     => $request->status,
            'updated_by' => Auth::id(),
        ]);

        
        return redirect()->route('class-subjects.index')
            ->with('success', 'Class Subject updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classSubject = ClassSubject::findOrFail($id);
        $classSubject->delete();

        return redirect()->route('class-subjects.index')
            ->with('success', 'Class Subject deleted successfully.');
    }

}
