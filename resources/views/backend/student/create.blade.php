@extends('backend.layouts.app')
@section('title','Student Create | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Student Form -->
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Studnet</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('students.index') }}" title="Back to Student List">
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

                        <!-- Admission Number -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Admission Number</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="admission_number" value="{{ old('admission_number') }}" class="form-control" placeholder="Enter admission number" required>
                                </div>
                                @error('admission_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Roll Number -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Roll Number</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="roll_number" value="{{ old('roll_number') }}" class="form-control" placeholder="Enter roll number" required>
                                </div>
                                @error('roll_number') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- Class -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Class </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}" {{ old('class_id')}}>{{$class->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Caste -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Caste</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="caste" value="{{ old('caste') }}" class="form-control">
                                </div>
                                @error('caste') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Religion -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Religion</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="text" name="religion" value="{{ old('religion') }}" class="form-control">
                                </div>
                                @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- Admission Date -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Admission Date</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="date" name="admission_date" value="{{ old('admission_date') }}" class="form-control">
                                </div>
                                @error('admission_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Blood Group -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Blood Group</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <input type="text" name="blood_group" value="{{ old('blood_group') }}" class="form-control">
                                </div>
                                @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Height -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Height</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="number" name="height" value="{{ old('height') }}" class="form-control">
                                </div>
                                @error('height') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Weight -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Weight</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <input type="number" name="weight" value="{{ old('weight') }}" class="form-control">
                                </div>
                                @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
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
