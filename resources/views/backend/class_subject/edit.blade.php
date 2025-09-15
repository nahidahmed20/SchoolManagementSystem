@extends('backend.layouts.app')
@section('title','Edit Class Subject | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Edit Class Subject Form -->
            <form action="{{ route('class-subjects.update', $classSubject->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> Class Subject</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('class-subjects.index') }}" title="Back to Class Subject List">
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
                                        <option value="{{ $class->id }}" {{ $classSubject->classRelation && $classSubject->classRelation->id == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Subject Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Subject Name</label>
                            <div class="col-md-6">
                                <select name="subject_id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $classSubject->subject && $classSubject->subject->id == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }} - {{ $subject->type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Status Code -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label"> Status</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $classSubject->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $classSubject->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <a href="{{ route('class-subjects.index') }}" class="btn btn-default">Cancel</a>                                  
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>                    
</div>

@endsection
