@extends('backend.layouts.app')
@section('title','Role Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Role Form -->
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Role</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('role.index') }}" title="Back to Role List">
                                    <span class="fa fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- Role Name -->
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Role Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Role Name" required>
                                </div>

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="clearfix" style="margin-bottom: 20px;"></div>

                        

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
