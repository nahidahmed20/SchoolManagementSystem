@extends('backend.layouts.app')
@section('title','Teacher Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Teacher Form -->
            <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Teacher</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('teachers.index') }}" title="Back to Teacher List">
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

                        <!-- Email -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
                                </div>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- Date of Birth -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Date of Birth</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                                </div>
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Date of Joining -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Date of Joining</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="date_of_joining" value="{{ old('date_of_joining') }}" class="form-control">
                                </div>
                                @error('date_of_joining') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Designation -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Designation</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-control">
                                </div>
                                @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Department</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" name="department" value="{{ old('department') }}" class="form-control">
                                </div>
                                @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="number" value="{{ old('number') }}" class="form-control">
                                </div>
                                @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Marital Status -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Marital Status</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                    <select name="marital_status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Single" {{ old('marital_status')=='Single'?'selected':'' }}>Single</option>
                                        <option value="Married" {{ old('marital_status')=='Married'?'selected':'' }}>Married</option>
                                    </select>
                                </div>
                                @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Qualification -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Qualification</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <input type="text" name="qualification" value="{{ old('qualification') }}" class="form-control">
                                </div>
                                @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Working Experience -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Working Experience</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" name="work_experience" value="{{ old('work_experience') }}" class="form-control">
                                </div>
                                @error('work_experience') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Nationality</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control">
                                </div>
                                @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Blood Group -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Blood Group</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                                    <input type="text" name="blood_group" value="{{ old('blood_group') }}" class="form-control">
                                </div>
                                @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- Note -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Note</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
                                    <textarea name="note" id="note" class="form-control" rows="4" placeholder="Write your note here..." ></textarea>
                                </div>
                                @error('note') <span class="text-danger">{{ $message }}</span> @enderror
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
