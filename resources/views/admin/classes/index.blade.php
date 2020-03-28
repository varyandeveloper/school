@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Classes</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($classes as $class)
                    <li class="list-group-item">

                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{route('classes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Class</a>
        </div>
    </div>
@endsection
