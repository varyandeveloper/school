@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Locations</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($locations as $location)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">{{$location->title}}</div>
                            <div class="col-6">Capacity: {{$location->capacity}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{route('locations.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Location</a>
        </div>
    </div>
@endsection
