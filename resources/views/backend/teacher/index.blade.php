@extends('backend.layouts.app')
@section('title','Teacher List | School Management System')

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
        justify-content: center; /* center buttons */
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
</style>
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Teachers Table</h2>
    @can('teacher.create')
        <a href="{{ route('teachers.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Create
        </a>
    @endcan
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body table-responsive">
                    <table class="table table-bordered table-striped" id="teacherTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name }} {{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->designation }}</td>
                                    <td>
                                        @if($teacher->status == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm view-btn" 
                                            data-teacher='@json($teacher)'>
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
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
<style>
/* Custom modal header layout */
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
.modal-title {
    margin-bottom: 10px;
    margin-top: 5px;
    font-size: 16px;
    font-weight: 600;
    color: #00e7ff;
}
.close-btn {
    margin-bottom: 10px;
    margin-top: 5px;
    font-size: 14px !important;
    font-weight: 600;
    color: #00e7ff;
}
</style>

<!-- Teacher View Modal -->
<div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      
    <!-- Modal Header -->
    <div class="modal-header bg-primary text-white custom-modal-header">
        <span class="modal-title"  id="teacherModalLabel">Teacher Details</span>
        <button type="button" id="closeBtn" class="btn btn-primary btn-sm close-btn">Close</button>
    </div>


      <!-- Modal Body -->
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
                              <tr><th>Email</th><td id="modal-email"></td></tr>
                              <tr><th>Gender</th><td id="modal-gender"></td></tr>
                              <tr><th>Date of Birth</th><td id="modal-dob"></td></tr>
                              <tr><th>Date of Joining</th><td id="modal-doj"></td></tr>
                              <tr><th>Designation</th><td id="modal-designation"></td></tr>
                              <tr><th>Department</th><td id="modal-department"></td></tr>
                              <tr><th>Phone</th><td id="modal-number"></td></tr>
                              <tr><th>Marital Status</th><td id="modal-marital"></td></tr>
                              <tr><th>Qualification</th><td id="modal-qualification"></td></tr>
                              <tr><th>Working Experience</th><td id="modal-experience"></td></tr>
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

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closeBtn" data-bs-dismiss="modal">Close</button>
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
    $('#teacherTable').DataTable({
        responsive: true,
        lengthChange: true, // show "Show entries" dropdown
        pageLength: 10,     // default entries
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + 
            "<'row'<'col-sm-12 col-md-12 dt-buttons-wrapper'B>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            { extend: 'csvHtml5', text: '<i class="fa fa-file-csv"></i> CSV', className: 'btn btn-success btn-sm', exportOptions: {
                columns: ':not(:last-child):not(:nth-last-child(3))'  
                } 
            },
            { extend: 'excelHtml5', text: '<i class="fa fa-file-excel"></i> Excel', className: 'btn btn-success btn-sm', exportOptions: {
                columns: ':not(:last-child):not(:nth-last-child(3))'  
                } 
            },
            { extend: 'pdfHtml5', text: '<i class="fa fa-file-pdf"></i> PDF', className: 'btn btn-danger btn-sm', exportOptions: {
                columns: ':not(:last-child):not(:nth-last-child(3))'  
                } 
            },
            { extend: 'print', text: '<i class="fa fa-print"></i> Print', className: 'btn btn-info btn-sm', exportOptions: {
                columns: ':not(:last-child):not(:nth-last-child(3))'  
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


<script>
$(document).ready(function() {
    $('#teacher-table').DataTable({
        "order": [[ 0, "asc" ]]
    });

    // View button click
    $('.view-btn').on('click', function() {
        let teacher = $(this).data('teacher');

        // Correct image path
        let imagePath = teacher.image ? "{{ asset('') }}" + teacher.image : "{{ asset('backend/img/dummy-image.webp') }}";
        $('#modal-image').attr('src', imagePath);

        $('#modal-fullname').text(teacher.name + ' ' + teacher.last_name);
        $('#modal-email').text(teacher.email);
        $('#modal-gender').text(teacher.gender);
        $('#modal-dob').text(teacher.date_of_birth);
        $('#modal-doj').text(teacher.date_of_joining);
        $('#modal-designation').text(teacher.designation);
        $('#modal-department').text(teacher.department);
        $('#modal-number').text(teacher.number);
        $('#modal-marital').text(teacher.marital_status);
        $('#modal-qualification').text(teacher.qualification);
        $('#modal-experience').text(teacher.working_experience);
        $('#modal-nationality').text(teacher.nationality);
        $('#modal-blood').text(teacher.blood_group);
        $('#modal-address').text(teacher.address);
        $('#modal-note').text(teacher.note);
        $('#modal-status').text(teacher.status == 1 ? 'Active' : 'Inactive');

        $('#teacherModal').modal('show');
    });
});
</script>

<script>
$(document).ready(function() {
    $('#closeBtn').click(function() {
        $('#teacherModal').modal('hide');
    });
});
</script>

@endsection
