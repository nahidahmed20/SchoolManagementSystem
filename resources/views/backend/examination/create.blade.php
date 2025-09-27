@extends('backend.layouts.app')
@section('title','Examination | Create | School Management System')
@section('content')
@push('styles')
    <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <!-- Create Examination | Form -->
            <form action="{{ route('examinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Create</strong> Examination</h3>
                        <ul class="panel-controls">
                            <li>
                                <a href="{{ route('examinations.index') }}" title="Back to Examination List">
                                    <span class="fa fa-list"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <!-- Examination Name -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Examination Name</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Examination Name" required>
                                </div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <!-- Examination Type -->
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Note</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <textarea name="note" class="form-control" placeholder="Enter Examination Note" >{{ old('note', $examination->note ?? '') }}</textarea>
                                </div>
                                @error('note') <span class="text-danger">{{ $message }}</span> @enderror
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
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#class_id').select2({
            placeholder: "Select a class",
            allowClear: true
        });
    });
</script>
@endsection
