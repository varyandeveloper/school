@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create student</h5>
        </div>
        <form method="post" action="{{route('teachers.store')}}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="student_name" class="col-form-label">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="student_name" name="name" type="text">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="student_email" class="col-form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="student_email" name="email" type="email">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="teacher_business_phone" class="col-form-label">Business phone</label>
                            <input class="form-control @error('business_phone') is-invalid @enderror" id="teacher_business_phone" name="business_phone" type="text">
                            @error('business_phone')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="student_password" class="col-form-label">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="student_password" name="password" type="password">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="student_schedules" class="col-form-label">Schedules</label>
                            <select class="form-control @error('schedules') is-invalid @enderror" id="student_schedules" name="schedules[]" multiple>
                                <option value="">-- Select Schedules --</option>
                                @foreach($schedules as $schedule)
                                    <option value="{{$schedule->id}}">{{$schedule->name}}</option>
                                @endforeach
                            </select>
                            @error('schedules')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                            <div class="form-group">
                                <label for="student_subjects" class="col-form-label">Subjects</label>
                                <select class="form-control @error('subjects') is-invalid @enderror" id="student_subjects" name="subjects[]" multiple>
                                    <option value="">-- Select Schedules --</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                                    @endforeach
                                </select>
                                @error('subjects')
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
