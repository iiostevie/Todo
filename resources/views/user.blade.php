@extends('layouts.app')

@section('Content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('Common.Errors')

        <!-- New Task Form -->
        <form action="/register" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- User Name -->
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Name : </label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="id" class="form-control">
                </div>
            </div>

        <!-- User Email -->
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Email : </label>

                <div class="col-sm-6">
                    <input type="text" name="email" id="id" class="form-control">
                </div>
            </div>

        <!-- User password -->
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Password : </label>

                <div class="col-sm-6">
                    <input type="text" name="password" id="id" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
