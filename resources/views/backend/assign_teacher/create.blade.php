@extends('backend.layouts.app')
@section('title','Assign Teacher Class Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Assign Teacher Class Form -->
            <form action="{{ route('class-teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Assign Teacher Class</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('class-teachers.index') }}" title="Back to Assign Teacher Class List">
                                    <span class="fa fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- Class Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Class Name</label>
                            <div class="col-md-6">
                                <select name="class_id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Teacher Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Teacher Name</label>

                            <div class="col-md-6">
                                @foreach($teachers as $teacher)
                                    <div class="form-check mb-1">
                                        <input
                                            type="checkbox"
                                            name="teacher_id[]"
                                            id="teacher_{{ $teacher->id }}"
                                            value="{{ $teacher->id }}"
                                            class="form-check-input"
                                            {{-- keep old checked values if validation fails --}}
                                            {{ in_array($teacher->id, old('teacher_id', [])) ? 'checked' : '' }}

                                        >
                                        <label class="form-check-label" for="teacher_{{ $teacher->id }}">
                                            {{ $teacher->name }} {{ $teacher->last_name }}
                                        </label>
                                    </div>
                                @endforeach

                                @error('teacher_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- Staatus Code -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label"> Status</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                                    <select name="status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Clear Form</button>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
