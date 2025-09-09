@extends('backend.layouts.app')
@section('title','Class Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Class Form -->
            <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Class</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('classes.index') }}" title="Back to Class List">
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
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Class Name" required>
                                </div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Class Type -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Statuss</label>
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
