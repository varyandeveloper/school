@extends('layouts.admin.master')

@section('admin:content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Subjects</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($subjects as $subject)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">{{$subject->title}}</div>
                            <div class="col-6">{{$subject->description}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{route('subjects.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Subject</a>
        </div>
    </div>
@endsection
