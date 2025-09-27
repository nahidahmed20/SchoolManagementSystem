<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Examination;
use App\Models\ClassSubject;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examinations = Examination::orderBy('id', 'desc')->get();
        return view('backend.examination.index', compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.examination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
        ]);
        Examination::create([
            'name'          => $request->name,
            'note'          => $request->note,
            'created_by'    => Auth::user()->id,
        ]);

        return redirect()->route('examinations.index')->with('success', 'Examination created successfully!');
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
        $examination = Examination::findOrFail($id);
        return view('backend.examination.edit', compact('examination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $examination = Examination::findOrFail($id);

        $examination->update([
            'name'       => $request->name,
            'note'       => $request->note,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('examinations.index')
                        ->with('success', 'Examination updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $examination = Examination::findOrFail($id);
        $examination->delete();

        return redirect()->route('examinations.index')
                        ->with('success', 'Examination deleted successfully!');
    }

    public function examinationShedules()
    {
        $examinations = Examination::all();
        $classes = Classes::all();

        return view('backend.examination.examination_shedule',compact('examinations','classes'));   
    }

    public function getClassSubjects(Request $request)
    {
        $examination_id = $request->examination_id;
        $class_id = $request->class_id;

        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found or not allowed'], 404);
        }

        if ($user->class_id != $class_id) {
            return response()->json(['error' => 'Class mismatch'], 403);
        }

        // get all class subjects
        $classSubjects = ClassSubject::with('subject')->where('class_id', $class_id)->get();

        // get existing exam schedules for this exam + class
        $examSchedules = ExamSchedule::where('exam_id', $examination_id)
                            ->where('class_id', $class_id)
                            ->get()
                            ->keyBy('subject_id'); // easy lookup

        $subjects = [];

        foreach ($classSubjects as $cs) {
            $schedule = $examSchedules->get($cs->subject_id); // null if not exists

            $subjects[] = [
                'subject_id' => $cs->subject_id,
                'subject_name' => $cs->subject->name,
                'exam_date' => $schedule->exam_date ?? '',
                'start_time' => $schedule->start_time ?? '',
                'end_time' => $schedule->end_time ?? '',
                'room_number' => $schedule->room_number ?? '',
                'full_marks' => $schedule->full_marks ?? '',
                'pass_marks' => $schedule->pass_marks ?? '',
            ];
        }

        return response()->json(['subjects' => $subjects]);
    }


    public function examTimetableStore(Request $request)
    {
        $data = $request->input('subjects'); 
        $class_id = $request->input('class_id');

        if (!$data || !$class_id) {
            return response()->json([
                'success' => false,
                'message' => 'No data found to save.'
            ], 400);
        }

        foreach ($data as $subject) {
            $schedule = ExamSchedule::where('exam_id', $subject['exam_id'])
                        ->where('class_id', $subject['class_id'])
                        ->where('subject_id', $subject['subject_id'])
                        ->first();

            if ($schedule) {
                $schedule->update([
                    'exam_date'   => $subject['exam_date'],
                    'start_time'  => $subject['start_time'],
                    'end_time'    => $subject['end_time'],
                    'room_number' => $subject['room_number'],
                    'full_marks'  => $subject['full_marks'],
                    'pass_marks'  => $subject['pass_marks'],
                ]);
            } else {
                ExamSchedule::create([
                    'exam_id'     => $subject['exam_id'],
                    'class_id'    => $subject['class_id'],
                    'subject_id'  => $subject['subject_id'],
                    'exam_date'   => $subject['exam_date'],
                    'start_time'  => $subject['start_time'],
                    'end_time'    => $subject['end_time'],
                    'room_number' => $subject['room_number'],
                    'full_marks'  => $subject['full_marks'],
                    'pass_marks'  => $subject['pass_marks'],
                ]);
            }
        }

        return response()->json([
            'success'  => true,
            'message'  => 'Exam schedule saved successfully.',
            'class_id' => $class_id,
            'exam_id'  => $data[0]['exam_id'] ?? null
        ]);
    }

}
