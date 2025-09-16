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
        $classSubjects = ClassSubject::with(['classRelation','subject'])->orderByDesc('id')->get();
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
        $validated = $request->validate([
            'class_id'     => 'required|integer|exists:classes,id',
            'subject_id'   => 'required|array',                 // array of IDs
            'subject_id.*' => 'integer|exists:subjects,id',   // each must exist
            'status'       => 'required|in:0,1',                // example status rule
        ]);

        $createdCount = 0;

        foreach ($validated['subject_id'] as $subjectId) {
            // Skip if already assigned
            $exists = ClassSubject::where('class_id', $validated['class_id'])
                ->where('subject_id', $subjectId)
                ->exists();

            if ($exists) {
                continue; // or collect duplicates if you want to show them
            }

            ClassSubject::create([
                'class_id'   => $validated['class_id'],
                'subject_id' => $subjectId,
                'status'     => $validated['status'],
                'created_by' => Auth::id(),
            ]);

            $createdCount++;
        }

        if ($createdCount === 0) {
            return redirect()
                ->back()
                ->with('error', 'All selected subjects were already assigned to this class.')
                ->withInput();
        }

        return redirect()
            ->route('class-subjects.index')
            ->with('success', "Class subjects created successfully ({$createdCount} added).");
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'class_id'    => 'required|integer|exists:classes,id',
            'subject_id'  => 'required|array',
            'subject_id.*'=> 'integer|exists:subjects,id',
            'status'      => 'required|in:0,1',
        ]);

        $classSubject = ClassSubject::findOrFail($id);

        ClassSubject::where('class_id', $validated['class_id'])->delete();

        foreach ($validated['subject_id'] as $subjectId) {
            ClassSubject::create([
                'class_id'   => $validated['class_id'],
                'subject_id' => $subjectId,
                'status'     => $validated['status'],
                'created_by' => Auth::id(),
            ]);
        }

        return redirect()
            ->route('class-subjects.index')
            ->with('success', 'Class subjects updated successfully.');
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
