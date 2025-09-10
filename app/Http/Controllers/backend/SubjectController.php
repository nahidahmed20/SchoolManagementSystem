<?php

namespace App\Http\Controllers\backend;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::orderByDesc('id')->get();

        return view('backend.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'type' =>'required|string|max:255',
            'status' =>'required',
        ]);

        Subject::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'type'      => $request->type,
           'status'     => $request->status,
           'created_by' => Auth::user()->id,
        ]);

        flash()->success('Subject created successfully!');
        return redirect()->route('subjects.index');
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
        $subject = Subject::find($id);

        return view('backend.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'type' =>'required|string|max:255',
           'status' =>'required',
        ]);

        $subject = Subject::find($id);

        $subject->name = $request->name;
        $subject->slug = Str::slug($request->name);
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->create_by = Auth::user()->id;

        $subject->save();

        flash()->success('Subject updated successfully!');
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        flash()->success('Subject deleted successfully!');
        return redirect()->route('subjects.index');
    }
}

