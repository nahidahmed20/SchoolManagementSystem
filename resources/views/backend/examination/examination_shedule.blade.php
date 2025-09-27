@extends('backend.layouts.app')
@section('title','Exam Schedule | School Management System')

@section('content')

@push('styles')
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
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

    .custom-select-box {
        padding: 5px;
        font-weight: 500;
        background-color: #f8f9fa;
        transition: all 0.3s ease-in-out;
        width: 60%;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
    .custom-select-box:focus {
        border-color: #198754;
        box-shadow: 0 0 5px rgba(25, 135, 84, 0.5);
        background-color: #fff;
    }
                        
</style>
@endpush

<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2>Exam Schedule</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="fw-bold my-2">Search Exam Schedule</h5>

                    <form class="row g-3 my-4" style="margin-top: 20px; ">
                        <div class="row g-3 align-items-end">
                            <!-- Exam -->
                            <div class="col-md-4">
                                <label for="examination_id" class="form-label fw-bold">Select Exam</label>
                                <select id="examination_id" class="form-select custom-select-box">
                                    <option value="">-- Choose Exam --</option>
                                    @foreach($examinations as $examination)
                                        <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Class -->
                            <div class="col-md-4">
                                <label for="class_id" class="form-label fw-bold">Select Class</label>
                                <select id="class_id" class="form-select custom-select-box">
                                    <option value="">-- Choose Class --</option>
                                    @foreach($classes as $classe)
                                        <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="col-md-4 d-flex gap-2">
                                <button type="submit" id="sumbitBtn" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Search
                                </button>
                                <a href="" id="resetBtn" class="btn btn-info">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body table-responsive ">
                    <div id="messageContainer"></div> 
                    
                    <form id="timetableForm" method="POST" action="{{ route('examTimetables.store') }}">
                        @csrf
                        <input type="hidden" name="class_id" id="hidden_class_id">
                        <input type="hidden" name="subject_id" id="hidden_subject_id">

                        <div id="timetableWrapper">
                            <table class="table table-bordered table-striped" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Exam Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room Number</th>
                                        <th>Full Marks</th>
                                        <th>Pass Marks</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            @can('save examination-shedule')
                                <button type="submit" id="btnSaveTimetable" class="btn btn-primary mt-3" style="display: none;">
                                    Save Timetable
                                </button>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {

        // Toastr options
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        // reset button
        $('#resetBtn').on('click', function(e) {
            e.preventDefault();
            $('#examination_id').val('');
            $('#class_id').val('');
            $('#studentTable tbody').empty();
            $('#btnSaveTimetable').hide();
        });

        // search button
        $('#sumbitBtn').on('click', function(e) {
            e.preventDefault();
            var examination_id = $('#examination_id').val();
            var class_id = $('#class_id').val();

            if (examination_id && class_id) {
                loadExamSchedule(class_id, examination_id);
            } else {
                toastr.error('Please select exam and class!');
            }
        });

        // save timetable form submit
        $(document).on('submit', '#timetableForm', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if(response.success) {
                        toastr.success(response.message);

                        // reload table data
                        loadExamSchedule(response.class_id, response.exam_id);
                    }
                },
                error: function(xhr) {
                    let errorMessage = xhr.responseJSON?.message || 'Something went wrong!';
                    toastr.error(errorMessage);
                }
            });
        });

    });

    // reusable function to fetch timetable
    function loadExamSchedule(class_id, exam_id) {
        $.ajax({
            url: "{{ route('getClassSubjects') }}",
            method: "POST",
            data: {
                examination_id: exam_id,
                class_id: class_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.subjects && response.subjects.length > 0) {
                    var tbody = $('#studentTable tbody');
                    tbody.empty();
                    $('#btnSaveTimetable').show();

                    $.each(response.subjects, function(index, sub) {
                        tbody.append(`
                            <tr>
                                <td>${index+1}</td>
                                <td>
                                    ${sub.subject_name}
                                    <input type="hidden" name="subjects[${index}][subject_id]" value="${sub.subject_id}">
                                    <input type="hidden" name="subjects[${index}][class_id]" value="${class_id}">
                                    <input type="hidden" name="subjects[${index}][exam_id]" value="${exam_id}">
                                </td>
                                <td><input type="date" name="subjects[${index}][exam_date]" class="form-control" value="${sub.exam_date ?? ''}"></td>
                                <td><input type="time" name="subjects[${index}][start_time]" class="form-control" value="${sub.start_time ?? ''}"></td>
                                <td><input type="time" name="subjects[${index}][end_time]" class="form-control" value="${sub.end_time ?? ''}"></td>
                                <td><input type="number" name="subjects[${index}][room_number]" class="form-control" value="${sub.room_number ?? ''}"></td>
                                <td><input type="text" name="subjects[${index}][full_marks]" class="form-control" value="${sub.full_marks ?? ''}"></td>
                                <td><input type="text" name="subjects[${index}][pass_marks]" class="form-control" value="${sub.pass_marks ?? ''}"></td>
                            </tr>
                        `);
                    });

                    $('#timetableWrapper').show();
                    $('#hidden_class_id').val(class_id);
                } else {
                    toastr.warning('No subjects found for this class.');
                    $('#studentTable tbody').empty();
                    $('#btnSaveTimetable').hide();
                }
            },
            error: function(xhr) {
                let errorMessage = xhr.responseJSON?.error || 'Something went wrong!';
                toastr.error(errorMessage);
                $('#btnSaveTimetable').hide();
            }
        });
    }

</script>

@endsection