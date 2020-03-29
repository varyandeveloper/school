@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create location</h5>
        </div>
        <form method="post" action="{{route('locations.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="location_title" class="col-form-label">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="location_title" name="title" type="text">
                    @error('title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location_capacity" class="col-form-label">Capacity</label>
                    <input class="form-control @error('capacity') is-invalid @enderror" id="location_capacity" name="capacity" type="number">
                    @error('capacity')
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
