@extends('backend.layouts.app')
@section('title','Permission Create | School Management System')
@section('content')

    <div class="page-content-wrap">
                    
        <div class="row">
            <div class="col-md-12">
                
                <form action="{{ route('permission.store') }}" method="POST">
                    @csrf
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Permission</strong> Create</h3>
                            <ul class="panel-controls">
                                <li>
                                    <a href="{{ route('permission.index') }}">
                                        <span class="fa fa-list"></span> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Text Field</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter Permission Name" required>
                                    </div>       

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default">Clear Form</button>                                    
                            <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>                    
        
    </div>

@endsection