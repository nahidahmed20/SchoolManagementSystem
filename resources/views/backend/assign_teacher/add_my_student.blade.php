@extends('backend.layouts.app')

@section('title','My Students | School Management System')

@section('content')
<style>
    .dataTables_length label,
    .dataTables_filter label {
        line-height: 18px;
    }
    .dt-buttons-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
        gap: 5px;
    }
    table.dataTable th,
    table.dataTable td {
        white-space: nowrap;
        text-align: center;
        vertical-align: middle;
    }
    @media (max-width: 768px) {
        .page-title h2 {
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
    <li><a href="#">My Students</a></li>
    <li class="active">List</li>
</ul>

<!-- PAGE TITLE -->
<div class="page-title d-flex justify-content-between align-items-center">
    <h2><span class="fa fa-arrow-circle-o-left"></span> My Students </h2>
    
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="classTeacherTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center !important;">#SL</th>
                                <th style="text-align: center !important;">Student Names</th>
                                <th style="text-align: center !important;">Created By</th>
                                <th style="text-align: center !important;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($myStudents as $assign)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Show all student names in this class --}}
                                <td>
                                    @if($assign->class && $assign->class->students->count())
                                        @foreach($assign->class->students as $student)
                                            <span class="d-block">{{ $student->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @switch($assign->created_by)
                                        @case(1) Super Admin @break
                                        @case(3) School Admin @break
                                        @default -
                                    @endswitch
                                </td>

                                <td>
                                    @if($assign->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
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
{{-- DataTables CSS/JS --}}


<script>
    $(function () {
        $('#classTeacherTable').DataTable({
            responsive: true,
            scrollX: true,
            pageLength: 10,
            autoWidth: false,
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12 dt-buttons-wrapper'B>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                { extend: 'csvHtml5',   text: '<i class="fa fa-file-csv"></i> CSV',   className: 'btn btn-success btn-sm' },
                { extend: 'excelHtml5', text: '<i class="fa fa-file-excel"></i> Excel', className: 'btn btn-success btn-sm' },
                { extend: 'pdfHtml5',   text: '<i class="fa fa-file-pdf"></i> PDF',   className: 'btn btn-danger btn-sm' },
                { extend: 'print',      text: '<i class="fa fa-print"></i> Print',    className: 'btn btn-info btn-sm' }
            ]
        });
    });
</script>
@endsection
