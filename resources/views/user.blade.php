@extends('layouts.app')

@section('Content')

    <body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/register') }}">
                    Account Information
                </a>
            </div>

        </div>
    </nav>
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
                    <input type="password" name="password" id="id" class="form-control" >
                </div>
            </div>

            <!-- Register Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="register" class="btn btn-default">
                        Register
                    </button>
                </div>
            </div>


            <!-- Login Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="login" class="btn btn-default">
                        Log in
                    </button>
                </div>
            </div>

            <!-- Reset Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="reset" class="btn btn-default">
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
