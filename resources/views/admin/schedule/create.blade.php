@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create schedule</h5>
        </div>
        <form method="post" action="{{route('schedules.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="schedule_name" class="col-form-label">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="schedule_name" name="name" type="text">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="schedule_start_date" class="col-form-label">Schedule Start</label>
                    <input class="form-control datetime-picker @error('start_date') is-invalid @enderror" id="schedule_start_date" name="start_date" type="text">
                    @error('start_date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="schedule_end_date" class="col-form-label">Schedule End</label>
                    <input class="form-control datetime-picker @error('end_date') is-invalid @enderror" id="schedule_end_date" name="end_date" type="text">
                    @error('end_date')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
