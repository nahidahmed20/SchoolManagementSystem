@extends('backend.layouts.app')
@section('title','Student List | School Management System')
@section('content')

<style>
    .dataTables_length label, .dataTables_filter label {
        line-height: 18px;
    }
    .dt-buttons-wrapper {
        display: flex;
        justify-content: center; /* center buttons */
        margin-bottom: 10px;
        flex-wrap: wrap; /* responsive wrap if too many buttons */
    }
</style>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{ route('dashboard') }}">Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Student list</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><span class="fa fa-users"></span> Students List</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="parentsTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Parents</th>
                                <th>Admission No</th>
                                <th>Roll No</th>
                                <th>Class</th>
                                <th>Blood Group</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentLists as $st)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $st->name }} {{ $st->last_name }}</td>
                                    <td>{{ $st->gender }}</td>
                                    <td>{{ $st->date_of_birth }}</td>
                                    <td>{{ $st->parent->name ?? '' }} {{ $st->parent->last_name ?? '' }}</td>
                                    <td>{{ $st->admission_number }}</td>
                                    <td>{{ $st->roll_number }}</td>
                                    <td>{{ $st->classes->name  }}</td>
                                    <td>{{ $st->blood_group }}</td>
                                    <td>
                                        <div style="display: flex; justify-content: center; gap: 5px; align-items: center;">
                                            @can('edit.parent')
                                                <a href="{{ route('parents.edit', $st->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            @endcan
                                            @can('mystudent.parent')
                                                <a href="{{ route('parents.addMyStudent',['student_id' => $st->id, 'parent_id' => $parent->id]) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-user-plus"></i> Add This
                                                </a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                                    
                </div>
            </div>                            
        </div>
    </div>
</div>

<hr style="border: 1px solid #333; margin: 0;">

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="parentsTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Admission No</th>
                                <th>Roll No</th>
                                <th>Class</th>
                                <th>Blood Group</th>
                                {{-- <th style="text-align: center;">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $stu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stu->name }} {{ $stu->last_name }}</td>
                                    <td>{{ $stu->gender }}</td>
                                    <td>{{ $stu->date_of_birth }}</td>
                                    <td>{{ $stu->admission_number }}</td>
                                    <td>{{ $stu->roll_number }}</td>
                                    <td>{{ $stu->classes->name  }}</td>
                                    <td>{{ $stu->blood_group }}</td>
                                    {{-- <td>
                                        <div style="display: flex; justify-content: center; gap: 5px; align-items: center;">
                                            @can('edit.parent')
                                                <a href="{{ route('parents.edit', $stu->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            @endcan
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                                    
                </div>
            </div>                            
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#parentsTable').DataTable({
        responsive: true,
        lengthChange: true, // show "Show entries" dropdown
        pageLength: 10,     // default entries
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + 
            "<'row'<'col-sm-12 col-md-12 dt-buttons-wrapper'B>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            { extend: 'csvHtml5', text: '<i class="fa fa-file-csv"></i> CSV', className: 'btn btn-success btn-sm', exportOptions: {
                columns: ':not(:last-child)'   
                } 
            },
            { extend: 'excelHtml5', text: '<i class="fa fa-file-excel"></i> Excel', className: 'btn btn-success btn-sm', exportOptions: {
                columns: ':not(:last-child)'   
                } 
            },
            { extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf"></i> PDF', className: 'btn btn-danger btn-sm', exportOptions: {
                columns: ':not(:last-child)'   
                } 
            },
            { extend: 'print', text: '<i class="fa fa-print"></i> Print', className: 'btn btn-info btn-sm', exportOptions: {
                columns: ':not(:last-child)'   
                } 
            },
        ]
    });

    // Delete confirmation
    $('.delete-btn').click(function(e) {
        e.preventDefault(); 
        var form = $(this).closest('form'); 

        Swal.fire({
            title: 'Are you sure?',
            text: "This parent will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
