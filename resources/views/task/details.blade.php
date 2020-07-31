@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @csrf

                <div class="row">
                    <h1>Details for task {{$task->id}} </h1>
                </div>
                
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title:</label>
                    <input type="text" id="title" readonly  class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $task->title}}" autocomplete="title">
                    @if($errors->has('title'))
                        <strong class="text-danger">{{$errors->first('title')}}</strong>
                    @endif
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label">Description:</label>
                    <input type="text" readonly name="description"  class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') ?? $task->description }}"  autocomplete="description"></textarea>
                    @if($errors->has('description'))
                        <strong class="text-danger">{{$errors->first('description')}}</strong>
                    @endif
            </div>
            
            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label">Status:</label>
                <input type="text" id="status" readonly  class="form-control @error('status') is-invalid @enderror" name="status" value="{{old('status') ?? $task->status}}" autocomplete="status">
                @if($errors->has('status'))
                    <strong class="text-danger">{{$errors->first('status')}}</strong>
                @endif
            </div>

            <div class="row pt-2">
                <a class="btn btn-primary"  href="{{ url('/home/') }}">Back to list</a>
            </div>
            
            </div>
        </div>
</div>
@endsection

