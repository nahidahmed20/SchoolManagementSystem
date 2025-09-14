@extends('backend.layouts.app')
@section('title','Student List | School Management System')

@section('content')
<style>
    .dataTables_length label, .dataTables_filter label {
        line-height: 18px;
    }
    .dt-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .dt-buttons-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .custom-modal-header {
        display: flex;               /* flex layout */
        justify-content: space-between; /* title left, button right */
        align-items: center;         /* vertical center alignment */
    }
    .custom-modal-header .modal-title {
        margin: 0;                   /* remove default margin */
        font-weight: bold;
        font-size: 1.25rem;
    }
</style>
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Students Table</h2>
    @can('create.student')
        <a href="{{ route('students.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
        </a>
    @endcan
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>Roll No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->classes->name ?? 'N/A' }}</td>
                                    <td>{{ $student->roll_number }}</td>
                                    <td>
                                        @if($student->status == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm view-btn" 
                                            data-student='@json($student)'>
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        @can('edit.student')
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                        @endcan
                                        @can('delete.student')
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        @endcan
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

<!-- Student View Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

    <div class="modal-header bg-primary text-white custom-modal-header">
        <span class="modal-title"  id="studentModalLabel">Student Details</span>
        <button type="button" id="closeBtn" class="btn btn-primary btn-sm">Close</button>
    </div>

      <div class="modal-body">
          <div class="row">
              <div class="col-md-4 text-center mb-3">
                  <img id="modal-image" src="{{ asset('backend/img/dummy-image.webp') }}" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
              </div>
              <div class="col-md-8">
                  <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                          <tbody>
                              <tr><th>Full Name</th><td id="modal-fullname"></td></tr>
                              <tr><th>Gender</th><td id="modal-gender"></td></tr>
                              <tr><th>Date of Birth</th><td id="modal-dob"></td></tr>
                              <tr><th>Admission No</th><td id="modal-admission"></td></tr>
                              <tr><th>Roll No</th><td id="modal-roll"></td></tr>
                              <tr><th>Class</th><td id="modal-class"></td></tr>
                              <tr><th>Phone</th><td id="modal-number"></td></tr>
                              <tr><th>Nationality</th><td id="modal-nationality"></td></tr>
                              <tr><th>Blood Group</th><td id="modal-blood"></td></tr>
                              <tr><th>Address</th><td id="modal-address"></td></tr>
                              <tr><th>Note</th><td id="modal-note"></td></tr>
                              <tr><th>Status</th><td id="modal-status"></td></tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeBtn2" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection

@section('scripts')

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

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
    $('#studentTable').DataTable({
        responsive: true,
        pageLength: 10,
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + 
            "<'row'<'col-sm-12 col-md-12 dt-buttons-wrapper'B>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            { extend: 'csvHtml5', text: '<i class="fa fa-file-csv"></i> CSV', className: 'btn btn-success btn-sm' },
            { extend: 'excelHtml5', text: '<i class="fa fa-file-excel"></i> Excel', className: 'btn btn-success btn-sm' },
            { extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf"></i> PDF', className: 'btn btn-danger btn-sm' },
            { extend: 'print', text: '<i class="fa fa-print"></i> Print', className: 'btn btn-info btn-sm' },
        ]
    });

    // Delete confirmation
    $('.delete-btn').click(function(e) {
        e.preventDefault(); 
        var form = $(this).closest('form'); 
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the student record!",
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

    // View button
    $('.view-btn').on('click', function() {
        let student = $(this).data('student');
        let imagePath = student.image ? "{{ asset('') }}" + student.image : "{{ asset('backend/img/dummy-image.webp') }}";
        $('#modal-image').attr('src', imagePath);

        $('#modal-fullname').text(student.name + ' ' + (student.last_name ?? ''));
        $('#modal-gender').text(student.gender);
        $('#modal-dob').text(student.date_of_birth);
        $('#modal-admission').text(student.admission_number);
        $('#modal-roll').text(student.roll_number);
        $('#modal-class').text(student.classes ? student.classes.name : 'N/A');
        $('#modal-number').text(student.number);
        $('#modal-nationality').text(student.nationality);
        $('#modal-blood').text(student.blood_group);
        $('#modal-address').text(student.address);
        $('#modal-note').text(student.note);
        $('#modal-status').text(student.status == 1 ? 'Active' : 'Inactive');

        $('#studentModal').modal('show');
    });

    $('#closeBtn, #closeBtn2').click(function() {
        $('#studentModal').modal('hide');
    });
});
</script>
@endsection
