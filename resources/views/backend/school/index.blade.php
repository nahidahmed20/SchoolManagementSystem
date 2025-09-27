@extends('backend.layouts.app')
@section('title','School List | School Management System')
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
    <li><a href="{{route('dashboard')}}">Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">School</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><span class="fa fa-arrow-circle-o-left"></span> School Table</h2>
    @can('schools.create')
        <a href="{{ route('schools.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
        </a>
    @endcan
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="schoolsTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            @foreach($schools as $school)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->address }}</td>
                                    <td>{{ $school->email }}</td>
                                    <td>    
                                        <img src="{{ asset($school->image) }}" alt="{{ $school->name }}" width="50" height="50">
                                    <td>
                                        <div style="display: flex; gap: 5px; align-items: center;">
                                            @if($school->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 5px; align-items: center;">
                                            @can('schools.edit')
                                                <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            @endcan
                                            @can('schools.delete')
                                                <form method="POST" action="{{ route('schools.destroy', $school->id) }}" class="delete-form">    
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
        $('#schoolsTable').DataTable({
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
                text: "You won't be able to revert this!",
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
