@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Possible schedules</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($schedules as $schedule)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">{{$schedule->name}}</div>
                            <div class="col-6">{{$schedule->start_date}} - {{$schedule->end_date}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{route('schedules.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Schedule</a>
        </div>
    </div>
@endsection
