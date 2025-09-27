@extends('backend.layouts.app')
@section('title','Student List | School Management System')

@section('content')
@push('styles')
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
@endpush
<div class="page-title" style="display: flex; justify-content: space-between; align-items: center;">
    <h2>Class Timetable Table</h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="fw-bold my-2">Search Timetable Table</h5>

                    <form class="row g-3 mb-4">

                        <div class="col-md-4">
                            <label for="class_id" class="form-label" style="font-weight: 800">Select Class</label>
                            <select id="class_id" class="form-control">
                                <option value="" >-- Choose Class --</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-4">
                            <label for="subject_id" class="form-label" style="font-weight: 800">Select Subject</label>
                            <select id="subject_id" class="form-control">
                                <option value="">-- Choose Subject --</option>
                            </select>
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
                    <form method="POST" action="{{ route('class-timetables.store') }}">
                        @csrf

                        <input type="hidden" name="class_id" id="hidden_class_id">
                        <input type="hidden" name="subject_id" id="hidden_subject_id">

                        <div id="timetableWrapper" style="display: none;">
                            <table class="table table-bordered table-striped" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Week Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Class Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            @can('save class-timetables')
                                <button type="submit" class="btn btn-primary mt-3">Save Timetable</button>
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
<script>
    $(document).ready(function() {

        $('#class_id').on('change', function() {
            var class_id = $(this).val();
            $.ajax({
                url: "{{ route('getSubjects') }}",
                type: "POST",
                data: {
                    class_id: class_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let options = '<option value="">-- Choose Subject --</option>';
                    $.each(response.subjects, function(index, subject) {
                        options += `<option value="${subject.id}">${subject.name}</option>`;
                    });
                    $('#subject_id').html(options);
                }
            });
        });

        $('#subject_id').on('change', function() {
            var classId = $('#class_id').val();
            var subjectId = $(this).val();

            $('#hidden_class_id').val(classId);
            $('#hidden_subject_id').val(subjectId);

            if(classId && subjectId) {
                $.ajax({
                    url: "{{ route('getClassTimetable') }}",
                    type: "GET",
                    data: {
                        class_id: classId,
                        subject_id: subjectId
                    },
                    success: function(response) {
                        var tbody = $('#studentTable tbody');
                        tbody.empty();

                        if(response.weeks.length > 0) {
                            $.each(response.weeks, function(index, week) {
                                tbody.append(`
                                    <tr>
                                        <td>${index+1}</td>
                                        <td>${week.week_name}</td>
                                        <td>
                                            <input type="time" name="start_time[${week.week_id}]" 
                                                value="${week.start_time}" class="form-control timepicker">
                                        </td>
                                        <td>
                                            <input type="time" name="end_time[${week.week_id}]" 
                                                value="${week.end_time}" class="form-control timepicker">
                                        </td>
                                        <td>
                                            <input type="time" name="class_room[${week.week_id}]" 
                                                value="${week.room_number}" class="form-control" placeholder="Enter class room">
                                        </td>
                                    </tr>
                                `);
                            });

                            $('#timetableWrapper').slideDown();

                            // Initialize Flatpickr
                            $(".timepicker").flatpickr({
                                enableTime: true,
                                noCalendar: true,
                                dateFormat: "h:i K"
                            });

                        } else {
                            $('#timetableWrapper').slideUp();
                            toastr.warning('No timetable found for this class & subject.');
                        }
                    },
                    error: function() {
                        $('#timetableWrapper').slideUp();
                        toastr.error('Something went wrong while fetching timetable.');
                    }
                });
            } else {
                $('#timetableWrapper').slideUp();
            }
        });

    });
</script>

@endsection