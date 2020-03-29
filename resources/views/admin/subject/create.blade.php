@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create subject</h5>
        </div>
        <form method="post" action="{{route('subjects.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="subject_name" class="col-form-label">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="subject_name" name="title" type="text">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subject_description" class="col-form-label">Description</label>
                    <textarea rows="5" class="form-control @error('description') is-invalid @enderror" id="subject_description" name="description" type="text"></textarea>
                    @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subject_min_age" class="col-form-label">Min age</label>
                            <input class="form-control @error('min_age') is-invalid @enderror" type="number" id="subject_min_age" name="min_age">
                            @error('min_age')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="subject_max_age" class="col-form-label">Max age</label>
                            <input class="form-control @error('max_age') is-invalid @enderror" type="number" id="subject_max_age" name="max_age">
                            @error('max_age')
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
