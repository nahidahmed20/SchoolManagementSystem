@extends('backend.layouts.app')
@section('title','Parent Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Student Form -->
            <form action="{{ route('parents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Parent</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('parents.index') }}" title="Back to Parent List">
                                    <span class="fa fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- First Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">First Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter First Name" required>
                                </div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Enter Last Name">
                                </div>
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Gender</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
                                        <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
                                        <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
                                    </select>
                                </div>
                                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Occupation -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Occupation</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-control">
                                </div>
                                @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="number" name="number" value="{{ old('number') }}" class="form-control">
                                </div>
                                @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                </div>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Profile Picture</label>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="preview-image" src="{{ asset('backend/img/dummy-image.webp') }}"
                                        alt="Profile Preview"
                                        class="img-thumbnail rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                    <input type="file" name="image" id="profile-picture-input" class="form-control" accept="image/*">
                                </div>
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- Status -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Status</label>
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
