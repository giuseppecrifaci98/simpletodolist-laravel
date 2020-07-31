@extends('layouts.app')
@section('content')
<div class="container">
<form action="/task/" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-8 offset-2">
            @csrf

            <div class="row">
                <h1>Create new Task</h1>
            </div>

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title:</label>
                    <input type="text" id="title"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" autocomplete="title">
                    @if($errors->has('title'))
                        <strong class="text-danger">{{$errors->first('title')}}</strong>
                    @endif
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label">Description:</label>
                    <input type="text" name="description"  class="form-control @error('description') is-invalid @enderror" id="description" value="{{old('description')}}"  autocomplete="description"></textarea>
                    @if($errors->has('description'))
                        <strong class="text-danger">{{$errors->first('description')}}</strong>
                    @endif
            </div>

            <div class="row pt-2">
                <button class="btn btn-primary">Create Task</button>
            </div>


        </div>
    </div>

</div>
@endsection
