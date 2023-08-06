@extends('layout.admin')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category </h5>

                        <!-- General Form Elements -->
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
                        <form action="{{ route('createCategory') }}" method="POST">
                            @csrf()
                            <div class="row mb-3 align-items-center">
                                <label for="inputText" class="col-sm-2 col-form-label">Category-Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="catname">
                                </div>
                            </div>


                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Create Category</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>


</main>
