<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\AssignClassTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignCalssTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classTeachers'] = AssignClassTeacher::with(['teacher','class'])->orderByDesc('id')->get();
        $data['totalClassTeachers'] = $data['classTeachers']->count();

        return view('backend.assign_teacher.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['teachers'] = User::where('is_admin',4)->where('status',1)->get();
        $data['classes'] = Classes::where('status',1)->get();

        return view('backend.assign_teacher.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'class_id'      => 'required|integer|exists:classes,id',
            'teacher_id'    => 'required|array',
            'teacher_id.*'  => 'integer|exists:users,id', // each teacher must exist
            'status'        => 'required|in:0,1',
        ]);

        $createdCount = 0;

        foreach ($validated['teacher_id'] as $teacherId) {
            // Skip if already assigned to this class
            $exists = AssignClassTeacher::where('class_id', $validated['class_id'])
                ->where('teacher_id', $teacherId)
                ->exists();

            if ($exists) {
                continue;
            }

            AssignClassTeacher::create([
                'class_id'   => $validated['class_id'],
                'teacher_id' => $teacherId,
                'status'     => $validated['status'],
                'created_by' => Auth::id(),
            ]);

            $createdCount++;
        }

        if ($createdCount === 0) {
            return redirect()
                ->back()
                ->with('error', 'All selected teachers were already assigned to this class.')
                ->withInput();
        }

        return redirect()
            ->route('class-teachers.index')
            ->with('success', "Class teachers assigned successfully ({$createdCount} added).");
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
        $data['classTeacher']   = AssignClassTeacher::findOrFail($id);
        $data['classes'] = Classes::where('status',1)->get();
        $data['teachers'] = User::where('is_admin',4)->where('status',1)->get();

        return view('backend.assign_teacher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'class_id'   => 'required|integer|exists:classes,id',
            'teacher_id' => 'required|integer|exists:users,id',
            'status'     => 'required|in:0,1',
        ]);

        $assign = AssignClassTeacher::findOrFail($id);

        $duplicate = AssignClassTeacher::where('class_id', $validated['class_id'])
            ->where('teacher_id', $validated['teacher_id'])
            ->where('id', '!=', $assign->id) // ignore current row
            ->exists();

        if ($duplicate) {
            return back()
                ->with('error', 'This teacher is already assigned to this class.')
                ->withInput();
        }

        $assign->update([
            'class_id'   => $validated['class_id'],
            'teacher_id' => $validated['teacher_id'],
            'status'     => $validated['status'],
            'updated_by' => Auth::id(),   // if you track who updates
        ]);

        return redirect()
            ->route('class-teachers.index')
            ->with('success', 'Class-teacher assignment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignTeacher = AssignClassTeacher::findOrFail($id);
        $assignTeacher->delete();

        return redirect()->route('class-teachers.index')
            ->with('success', 'Assign class teacher deleted successfully.');
    }

    public function classSubjectShow()
    {
        $userId = Auth::id();
        $data['classSubjects'] = AssignClassTeacher::with([
                'classSubject.class',
                'classSubject.subject'
            ])
            ->where('teacher_id', $userId)
            ->where('status', 1)
            ->get();
            
        return view('backend.assign_teacher.class_subject_show', $data);
    }
}
