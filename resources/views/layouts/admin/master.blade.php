@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Admin Dashboard</h2>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Sidebar</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="{{route('schedules.index')}}">Schedules</a></li>
                            <li><a href="{{route('teachers.index')}}">Teachers</a></li>
                            <li><a href="{{route('students.index')}}">Students</a></li>
                            <li><a href="{{route('classes.index')}}">Classes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9">
                @yield('admin:content')
            </div>
        </div>
    </div>
@endsection
