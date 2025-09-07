@extends('backend.layouts.app')
@section('title','User Edit | School Management System')
@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create User Form -->

            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit</strong> User</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('user.index') }}" title="Back to User List">
                                    <span class="fa fa-list"></span> 
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- User Name -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">User Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                                </div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                                </div>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">New Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter new password (leave blank to keep old)">
                                </div>
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                                </div>
                                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Roles -->
                        <div class="form-group row">
                            <label class="col-md-3 col-xs-12 control-label">Roles</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="max-height: 200px; overflow-y: auto;">
                                        @foreach($roles as $role)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                        {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default" id="backBtn"><i class="fa fa-undo"></i>Back</button>
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
    $(document).ready(function() {
        $('#backBtn').click(function() {
            // previous page এ redirect
            window.location.href = "{{ route('user.index') }}";
        });
    });
</script>
@endsection