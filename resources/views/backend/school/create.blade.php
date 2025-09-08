@extends('backend.layouts.app')
@section('title','School Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Role Form -->
            <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> School</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('schools.index') }}" title="Back to School List">
                                    <span class="fa fa-list"></span> 
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- School Name -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">School Name</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter School Name" required>
                                </div>       

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-6">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
                                </div>       
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Address</label>
                            <div class="col-md-6">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter Address" required>
                                </div>       
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-6">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                </div>       
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Confirm Password</label>
                            <div class="col-md-6">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                </div>       
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Profile Picture</label>
                            <div class="col-md-6">
                                <!-- Image Preview Box -->
                                <div class="mb-2">
                                    <img id="preview-image" src="{{ asset('backend/img/dummy-image.webp') }}" 
                                        alt="Profile Preview" 
                                        class="img-thumbnail rounded-circle" 
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                </div>

                                <!-- File Input -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                    <input type="file" name="profile_picture" id="profile-picture-input" 
                                        class="form-control" accept="image/*">
                                </div>

                                @error('profile_picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Preview Script -->
                        

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-6">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-toggle-on"></span></span>
                                    <select name="status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>       
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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

@section('scripts')
<script>
    document.getElementById('profile-picture-input').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection