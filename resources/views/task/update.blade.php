@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/task/{{$task->id}}/update" method="POST">
        <div class="row">
            <div class="col-8 offset-2">
                @csrf
                @method('PATCH')

                <div class="row">
                    <h1>Update status for task {{$task->id}} </h1>
                    <input type="hidden" value="{{$task->id}}" name="id">
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                </div>

                <!-- 
                <div class="row">
                    @if(!$task->status)
                    <p class="text-danger">When you click on the button the status of the task is changed to 1</p>
                    @else
                    <p class="text-danger">When you click on the button the status of the task is changed to 0</p>
                    @endif
                </div>
                !-->
                
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title:</label>
                    <input type="text" id="title"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $task->title}}" autocomplete="title">
                    @if($errors->has('title'))
                        <strong class="text-danger">{{$errors->first('title')}}</strong>
                    @endif
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label">Description:</label>
                    <input type="text" name="description"  class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') ?? $task->description }}"  autocomplete="description"></textarea>
                    @if($errors->has('description'))
                        <strong class="text-danger">{{$errors->first('description')}}</strong>
                    @endif
            </div>
            
            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label">Status:</label>
                <input type="text" id="status"  class="form-control @error('status') is-invalid @enderror" name="status" value="{{old('status') ?? $task->status}}" autocomplete="status">
                @if($errors->has('status'))
                    <strong class="text-danger">{{$errors->first('status')}}</strong>
                @endif
            </div>

            <div class="row pt-2">
                <button class="btn btn-primary">Save</button>
            </div>


            </div>
        </div>
    </form>
</div>
@endsection

