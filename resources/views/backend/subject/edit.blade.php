@extends('backend.layouts.app')
@section('title','Subject Edit | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Subject Form -->
            <form action="{{ route('subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> Subject</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('subjects.index') }}" title="Back to Subject List">
                                    <span class="fa fa-list"></span> 
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- Subject Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Subject Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="name" value="{{ old('name',$subject->name) }}" class="form-control" placeholder="Enter Subject Name" required>
                                </div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">Type</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="type" value="{{ old('type',$subject->type) }}" class="form-control" placeholder="Enter Subject Type" required>
                                </div>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Subject Code -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Subject Status</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>
                                    <select name="status" class="form-control" required>
                                        <option value="1" @if($subject->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($subject->status == 0) selected @endif>Inactive</option>
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
