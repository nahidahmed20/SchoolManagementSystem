@extends('backend.layouts.app')

@section('title','My Timetable | School Management System')

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

    /* Week name styling */
    .week-title {
        font-weight: bold;
        font-size: 18px;
        color: #2c3e50;
        background: #f1f1f1;
        padding: 8px 12px;
        border-left: 5px solid #3498db;
        margin-top: 15px;
        border-radius: 4px;
    }
</style>

<!-- BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{ route('dashboard') }}">Home</a></li>
    <li><a href="#">My Timetable</a></li>
    <li class="active">List</li>
</ul>

<!-- PAGE TITLE -->
<div class="page-title d-flex justify-content-between align-items-center">
    <h2><span class="fa fa-arrow-circle-o-left"></span> My Timetable </h2>
</div>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach ($timeTables->groupBy('class.name') as $className => $classSchedules)
                        <h3 style="font-weight: 800;">Class: {{ $className }}</h3>

                        @foreach ($classSchedules->groupBy('weekday.name') as $day => $schedules)
                            <div class="week-title" style="font-weight: bold; color: blue; margin-top: 10px;">
                                {{ $day }}
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->subject->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


