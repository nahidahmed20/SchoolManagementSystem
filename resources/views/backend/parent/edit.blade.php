@extends('backend.layouts.app')
@section('title','Parent Edit | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Edit Parent Form -->
            <form action="{{ route('parents.update', $parent->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> Parent</h3>
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
                                    <input type="text" name="name" value="{{ old('name', $parent->name) }}" class="form-control" required>
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
                                    <input type="text" name="last_name" value="{{ old('last_name', $parent->last_name) }}" class="form-control">
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
                                        <option value="Male" {{ old('gender', $parent->gender)=='Male'?'selected':'' }}>Male</option>
                                        <option value="Female" {{ old('gender', $parent->gender)=='Female'?'selected':'' }}>Female</option>
                                        <option value="Other" {{ old('gender', $parent->gender)=='Other'?'selected':'' }}>Other</option>
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
                                    <input type="text" name="occupation" value="{{ old('occupation', $parent->occupation) }}" class="form-control">
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
                                    <input type="number" name="number" value="{{ old('number', $parent->number) }}" class="form-control">
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
                                    <input type="text" name="address" value="{{ old('address', $parent->address) }}" class="form-control">
                                </div>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Profile Picture</label>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <img id="preview-image" 
                                         src="{{ $parent->image ? asset($parent->image) : asset('backend/img/dummy-image.webp') }}"
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

                        <!-- Password (optional) -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter new password (optional)">
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
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password (optional)">
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
                                        <option value="1" {{ old('status', $parent->status)==1 ? 'selected':'' }}>Active</option>
                                        <option value="0" {{ old('status', $parent->status)==0 ? 'selected':'' }}>Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Reset</button>
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
    // Profile Picture Preview
    document.getElementById('profile-picture-input').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection
