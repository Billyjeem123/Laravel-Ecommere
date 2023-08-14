@extends('layout.admin')
@section('pagename', 'Admin Dashboard')



@section('sectionDashboard')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">



            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Register</h3>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('danger'))
                                <div class="alert alert-danger" id="danger-alert">
                                    {{ session('danger') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <form method="POST" action="{{ route('adregister') }}">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <!-- Add the "mb-4" class to increase the margin-bottom -->
                                        <label for="username">Username:</label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Enter your username">
                                            @error('username')
                                            <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <!-- Add the "mb-4" class to increase the margin-bottom -->
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter your password">
                                          
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Register User</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

        </section>

    </main><!-- End main -->
@endsection
