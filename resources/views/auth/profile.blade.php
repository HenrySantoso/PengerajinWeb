@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Information</h5>
                    <p class="card-text"><strong>Name:</strong> {{ Auth::user()->username }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <!-- Add more user information as needed -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Card for logout button -->
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Actions</h5>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Custom CSS for profile page -->
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <!-- Custom JS for profile page -->
    <script> console.log("Profile page loaded"); </script>
@stop
