@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        @lang('mess.tasklist')
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
                 @lang('mess.newtask')
             </div>
             <div class="card-body">
                 <form action="{{ route('listtask.store') }}" method="POST" class="form-horizontal">
                     @csrf
             
                     <!-- Task Name -->
                     <div class="form-group">
                         <label for="task-name" class="col-sm-3 control-label">@lang('mess.task')</label>
             
                         <div class="col-sm-6">
                             <input type="text" name="name" id="task-name" class="form-control">
                         </div>
                     </div>
             
                     <!-- Add Task Button -->
                     <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-6">
                             <button type="submit" class="btn btn-primary">
                                 @lang('mess.addtask')
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         {{-- list --}}
         @if(count($tasks) > 0)
         <div  class="card">
             <div class="card-header">
                 @lang('mess.currenttask')
             </div>
             
             <div class="card-body">
                 <table class="table">
                     <thead>
                         <tr>
                             <th><p>@lang('mess.task1')</p></th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($tasks as $task)
                         <tr>
                             <td>{{$task->name}}</td>
                             <td>
                                 <form action="{{ route('listtask.destroy', ['listtask' => $task->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="{{ trans('mess.delete') }}" >
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
