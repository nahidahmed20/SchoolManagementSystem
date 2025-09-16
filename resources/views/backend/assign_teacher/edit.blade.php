@extends('backend.layouts.app')
@section('title','Edit Assign Teacher Class | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('class-teachers.update', $classTeacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> Assign Teacher Class</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('class-teachers.index') }}" title="Back to List">
                                    <span class="fa fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        {{-- Class Name --}}
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Class Name</label>
                            <div class="col-md-6">
                                <select name="class_id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ old('class_id', $classTeacher->class_id) == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Teacher --}}
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Teacher Name</label>
                            <div class="col-md-6">
                                <select name="teacher_id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            {{ old('teacher_id', $classTeacher->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                            {{ $teacher->name }} {{ $teacher->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ old('status', $classTeacher->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $classTeacher->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                        <a href="{{ route('class-teachers.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
