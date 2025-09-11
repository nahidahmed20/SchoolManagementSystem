@extends('backend.layouts.app')
@section('title','Edit Student | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Edit Student Form -->
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> Student</h3>
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
                                    <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control" required>
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
                                    <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" class="form-control">
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
                                    <input type="text" name="admission_number" value="{{ old('admission_number', $student->admission_number) }}" class="form-control" required>
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
                                    <input type="text" name="roll_number" value="{{ old('roll_number', $student->roll_number) }}" class="form-control">
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
                                        <option value="Male" {{ old('gender', $student->gender)=='Male'?'selected':'' }}>Male</option>
                                        <option value="Female" {{ old('gender', $student->gender)=='Female'?'selected':'' }}>Female</option>
                                        <option value="Other" {{ old('gender', $student->gender)=='Other'?'selected':'' }}>Other</option>
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
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" class="form-control">
                                </div>
                                @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Class -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Class</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ old('class_id', $student->class_id)==$class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
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
                                    <input type="text" name="caste" value="{{ old('caste', $student->caste) }}" class="form-control">
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
                                    <input type="text" name="religion" value="{{ old('religion', $student->religion) }}" class="form-control">
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
                                    <input type="text" name="number" value="{{ old('number', $student->number) }}" class="form-control">
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
                                    <input type="date" name="adminssion_date" value="{{ old('adminssion_date', $student->adminssion_date) }}" class="form-control">
                                </div>
                                @error('adminssion_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Blood Group -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Blood Group</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                                    <input type="text" name="blood_group" value="{{ old('blood_group', $student->blood_group) }}" class="form-control">
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
                                    <input type="text" name="height" value="{{ old('height', $student->height) }}" class="form-control">
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
                                    <input type="text" name="weight" value="{{ old('weight', $student->weight) }}" class="form-control">
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
                                    <input type="text" name="nationality" value="{{ old('nationality', $student->nationality) }}" class="form-control">
                                </div>
                                @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="address" value="{{ old('address', $student->address) }}" class="form-control">
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
                                    <textarea name="note" class="form-control" rows="4">{{ old('note', $student->note) }}</textarea>
                                </div>
                                @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Profile Picture</label>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="preview-image"
                                         src="{{ $student->image ? asset($student->image) : asset('backend/img/dummy-image.webp') }}"
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
                                    <input type="password" name="password" class="form-control" placeholder="Leave blank if not changing">
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
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Leave blank if not changing">
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
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status', $student->status)==1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $student->status)==0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <a href="{{ route('students.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
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
