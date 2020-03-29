@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Students</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($students as $student)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">{{$student->user->name}}</div>
                            <div class="col-6">

                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{route('students.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Student</a>
        </div>
    </div>
@endsection
