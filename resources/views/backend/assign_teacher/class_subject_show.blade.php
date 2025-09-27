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
    <h2><span class="fa fa-arrow-circle-o-left"></span> Assign Class And Subject </h2>
    @can('create class-teacher')
        <a href="{{ route('class-teachers.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
        </a>
    @endcan
    @if($classSubjects->isNotEmpty())
        <div class="mb-3">
            <a href="{{ route('teacher-timeTable', ['class_id' => $classSubjects->first()->class_id]) }}" 
                class="btn btn-info btn-sm rounded-0 border-0">
                My Class Timetable
            </a>
        </div>
    @endif

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
                                <th style="text-align: center !important;">Subject Name</th>
                                <th style="text-align: center !important;">Create By</th>
                                {{-- <th style="text-align: center !important;">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classSubjects as $assign)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assign->classSubject->class->name ?? '-' }}</td>
                                    <td>{{ $assign->classSubject->subject->name ?? '-' }}</td>
                                    <td>
                                        @if($assign->created_by == 1 )
                                        Super Admin
                                        @elseif ($assign->created_by == 3)
                                        School Admin
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('teacher-timeTable', ['class_id' => $assign->class_id]) }}" 
                                            class="btn btn-info btn-sm rounded-0 border-0">
                                            My Class Timetable
                                        </a>
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

    });
</script>
@endsection
