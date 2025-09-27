@extends('backend.layouts.app')
@section('title','Assign Class Teacher | School Management System')
@section('content')

<style>
    .dataTables_length label, .dataTables_filter label {
        line-height: 18px;
    }
    .dt-buttons-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
        gap: 5px;
    }
    /* Table responsiveness fix */
    table.dataTable th,
    table.dataTable td {
        white-space: nowrap;
        text-align: center;
        vertical-align: middle;
    }
    
    @media (max-width: 768px) {
        .page-title h2, 
        .page-title h4 {
            font-size: 16px;
        }
        .btn {
            font-size: 12px;
            padding: 4px 8px;
        }
    }

    
</style>


<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{ route('dashboard') }}">Home</a></li>
    <li><a href="#">Assign Class Teacher</a></li>
    <li class="active">List</li>
</ul>

<!-- PAGE TITLE -->
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Assign Class Teacher</h2>
    @can('create class-teacher')
        <a href="{{ route('class-teachers.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
        </a>
    @endcan
</div>
<hr style="border: 1px solid #333; margin: 10px 0px;">
<div class="page-title d-flex justify-content-between align-items-center mb-3 p-3 border-bottom">
    <h4 class="fw-bold mb-0" style="font-weight: 600; font-family: 'Open Sans', sans-serif; color: #031cfa;">
        <i class="fa fa-chalkboard-teacher me-2 text-primary"></i>
        Assign Class Teachers <span class="badge bg-primary">{{ $totalClassTeachers }}</span>
    </h4>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="classTeacherTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr >
                                <th style="text-align: center !important;">#SL</th>
                                <th style="text-align: center !important;">Class Name</th>
                                <th style="text-align: center !important;">Teacher Name</th>
                                <th style="text-align: center !important;">Create By</th>
                                <th style="text-align: center !important;">Status</th>
                                <th style="text-align: center !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classTeachers as $assign)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assign->class->name ?? '-' }}</td>
                                    <td>{{ $assign->teacher->name ?? '-'}} {{ $assign->teacher->last_name ?? '-'}}</td>
                                    <td>
                                        @if($assign->created_by == 1 )
                                        Super Admin
                                        @elseif ($assign->created_by == 3)
                                        School Admin
                                        @endif
                                    </td>
                                    <td>
                                        @if($assign->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td >
                                        <div style="display: flex; gap:5px; justify-content: center;">
                                            @can('edit class-teacher')
                                                <a href="{{ route('class-teachers.edit', $assign->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            @endcan
                                            @can('delete class-teacher')
                                                <form action="{{ route('class-teachers.destroy', $assign->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
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

@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#classTeacherTable').DataTable({
            responsive: true,
            scrollX: true, // Horizontal scroll add
            lengthChange: true,
            pageLength: 10,
            autoWidth: false,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-12 dt-buttons-wrapper'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                { extend: 'csvHtml5', text: '<i class="fa fa-file-csv"></i> CSV', className: 'btn btn-success btn-sm', exportOptions: { columns: ':not(:last-child)' }},
                { extend: 'excelHtml5', text: '<i class="fa fa-file-excel"></i> Excel', className: 'btn btn-success btn-sm', exportOptions: { columns: ':not(:last-child)' }},
                { extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf"></i> PDF', className: 'btn btn-danger btn-sm', exportOptions: { columns: ':not(:last-child)' }},
                { extend: 'print', text: '<i class="fa fa-print"></i> Print', className: 'btn btn-info btn-sm', exportOptions: { columns: ':not(:last-child)' }},
            ]
        });

        // Delete confirmation
        $('.delete-btn').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
