@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        Task List
    </div>
 
    <div class="card-body">
        {{-- add --}}
        @include('common.errors')
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
         <div class="card">
             <div class="card-header">
                 New Task
             </div>
             <div class="card-body">
                 <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                     @csrf
             
                     <!-- Task Name -->
                     <div class="form-group">
                         <label for="task-name" class="col-sm-3 control-label">Task</label>
             
                         <div class="col-sm-6">
                             <input type="text" name="name" id="task-name" class="form-control">
                         </div>
                     </div>
             
                     <!-- Add Task Button -->
                     <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-6">
                             <button type="submit" class="btn btn-primary">
                                 + Add Task
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         {{-- list --}}
         @if(count($tasks) > 0)
         <div style="margin-top: 5%;" class="card">
             <div class="card-header">
                 Current Tasks
             </div>
             
             <div class="card-body">
                 <table class="table">
                     <thead>
                         <tr>
                             <th><p style="font-weight: bold">Task</p></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($tasks as $task)
                         <tr>
                             <td>{{$task->name}}</td>
                             <td>
                                 <form action="" method="POST">
                                    @csrf
                                   
                                    <input type="submit" class="btn btn-danger" value="DELETE" >
                                 </form>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
         @endif
    </div>
 </div> 
@endsection