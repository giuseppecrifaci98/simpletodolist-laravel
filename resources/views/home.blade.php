@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/createTask" class="btn btn-primary float-right mb-4">Add new Task</a>
            <p class="mt-2 nb-2">
              Number of task: {{$tasklist->count()}} <br>
              Number of incomplete task: {{$taskincomplete}} <br>
              Number of complete task: {{$taskcomplete}}
            </p>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tasklist as $tasks)
                      <tr>
                      <td>{{$tasks->id}}</td>
                       <td>{{$tasks->title}}</td>
                       <td>{{$tasks->description}}</td>
                       <td>{{$tasks->status==false ? 'Not complete' : 'Completed'}}</td>
                       <td>
                           <a class="btn btn-info"  href="{{ url('/task/' . $tasks->id) .'/details' }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                           <a class="btn btn-warning" href="{{ url('/task/' . $tasks->id . '/update') }}"><i class="fas fa-edit" aria-hidden="true"></i></a>
                           <a class="btn btn-danger" href="{{ url('/task/' . $tasks->id . '/delete') }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                       </td>
                    </tr>
                      @endforeach
                  </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
