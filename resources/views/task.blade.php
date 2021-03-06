@extends('layouts.app')

@section('content')
    <body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('login', ['userId' => Auth::id()]) }}">
                    Task List
                </a>
            </div>

        </div>
    </nav>
    <!-- Create Task Form... -->
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('Common.Errors')

    <!-- New Task Form -->
        <form action="/auth/{{$user->id}}/tasks" method="POST" class="form-horizontal">
        {{ csrf_field() }}

            <!-- Task Description -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="description" id="id" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>All Tasks</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>

                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->id }}</div>
                                <div>{{ $task->description }}</div>
                                <div>{{ $task->iscompleted }}</div>
                            </td>

                                <!-- Delete Button -->
                            <td>
                                <form action="/auth/{{$user->id}}/tasks/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button>Delete Task</button>
                                </form>
                            </td>


                            <!-- Complete Button -->
                            <td>
                                <form action="/task/{task->$id}/completed" method="POST">
                                    {{ csrf_field() }}
                                    <button>Completed</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
