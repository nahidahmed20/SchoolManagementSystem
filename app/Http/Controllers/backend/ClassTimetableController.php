<?php

namespace App\Http\Controllers\backend;

use App\Models\Week;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use App\Models\ClassTimetable;
use App\Http\Controllers\Controller;

class ClassTimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();  
        return view('backend.class_timetable.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classId = $request->class_id;
        $subjectId = $request->subject_id;

        $weeks = Week::all();

        foreach ($weeks as $week) {
            $start_time = $request->start_time[$week->id] ?? null;
            $end_time = $request->end_time[$week->id] ?? null;
            $room = $request->class_room[$week->id] ?? null;

            if($start_time && $end_time && $room) {
                // Check if data exists
                $timetable = ClassTimetable::where('class_id', $classId)
                    ->where('subject_id', $subjectId)
                    ->where('week_id', $week->id)
                    ->first();

                if($timetable) {
                    // Update existing
                    $timetable->update([
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'room_number' => $room
                    ]);
                } else {
                    // Create new
                    ClassTimetable::create([
                        'class_id' => $classId,
                        'subject_id' => $subjectId,
                        'week_id' => $week->id,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'room_number' => $room
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Class timetable saved successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSubjects(Request $request)
    {
        $classId = $request->class_id;
        $classSubject = ClassSubject::where('class_id', $classId)->get();
        $subjects = Subject::whereIn('id', $classSubject->pluck('subject_id')->toArray())->get();
  
        return response()->json(['subjects' => $subjects]);
    }


    public function getClassTimetable(Request $request)
    {
        $classId = $request->class_id;
        $subjectId = $request->subject_id;

        $weeks = Week::all();

        $timetableData = [];

        foreach ($weeks as $week) {
            $timetable = ClassTimetable::where('class_id', $classId)
                ->where('subject_id', $subjectId)
                ->where('week_id', $week->id)
                ->first();

            $timetableData[] = [
                'week_name' => $week->name,
                'week_id' => $week->id,
                'start_time' => $timetable->start_time ?? '',
                'end_time' => $timetable->end_time ?? '',
                'room_number' => $timetable->room_number ?? '',
            ];
        }

        return response()->json([
            'weeks' => $timetableData
        ]);
    }
    
}
