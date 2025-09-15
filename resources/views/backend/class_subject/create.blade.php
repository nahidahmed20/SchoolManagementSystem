@extends('backend.layouts.app')
@section('title','Class Subject Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Class Subject Form -->
            <form action="{{ route('class-subjects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Class Subject</h3>
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
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                        <option value="{{ $subject->id }}">{{ $subject->name }} - {{ $subject->type }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
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
