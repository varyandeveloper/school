@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create Class</h5>
        </div>
        <form method="post" action="{{route('classes.store')}}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class_title" class="col-form-label">Title</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="class_title" name="title" type="text">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class_start_date" class="col-form-label">Class Start Date</label>
                            <input class="form-control datetime-picker @error('start_date') is-invalid @enderror" id="class_start_date" name="start_date" type="text">
                            @error('start_date')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class_end_date" class="col-form-label">Class End Date</label>
                            <input class="form-control datetime-picker @error('end_date') is-invalid @enderror" id="class_end_date" name="end_date" type="text">
                            @error('end_date')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="class_subject" class="col-form-label">Subject</label>
                            <select class="form-control @error('subject') is-invalid @enderror" id="class_subject" name="subject">
                                <option value="">-- Select Subject --</option>
                            </select>
                            @error('subject')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="class_teacher" class="col-form-label">Teacher</label>
                            <select class="form-control @error('teacher') is-invalid @enderror" id="class_teacher" name="teacher">
                                <option value="">-- Select Teacher --</option>
                            </select>
                            @error('teacher')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="class_location" class="col-form-label">Location</label>
                            <select class="form-control @error('location') is-invalid @enderror" id="class_location" name="location">
                                <option value="">-- Select Location --</option>
                            </select>
                            @error('location')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="class_location" class="col-form-label">Students</label>
                            <select multiple class="form-control @error('students') is-invalid @enderror" id="class_location" name="students[]">
                                <option value="">-- Select Students --</option>
                            </select>
                            @error('students')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
