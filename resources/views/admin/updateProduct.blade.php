@extends('layout.admin')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>

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
                        <form action="{{ route('updateProduct', $product->token) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf()
                            @method('PUT')
                            <div class="row mb-3 align-items-center">
                                <label for="inputText" class="col-sm-2 col-form-label">Product name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pname" class="form-control"
                                        value="{{ $product->productName }}">
                                    <p style="color: red">{{ $errors->first('pname') }}</p>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label for="inputText" class="col-sm-2 col-form-label">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pquantity" class="form-control"
                                        value="{{ $product->productQuantity }}">
                                    <p style="color: red">{{ $errors->first('pquantity') }}</p>
                                </div>
                            </div>


                            <div class="row mb-3 align-items-center">
                                <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control"
                                        value="{{ $product->price }}">
                                    <p style="color: red">{{ $errors->first('price') }}</p>
                                </div>
                            </div>
                            <input type="hidden" name="usertoken" value="09">

                            <div class="row mb-3 align-items-center">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="file[]" type="file" id="formFile" multiple>
                                    <p style="color: red">{{ $errors->first('file') }}</p>
                                </div>
                            </div>

                            



                            <div class="row mb-3 align-items-center">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Post-Desc</label>
                                <div class="col-sm-10">
                                    <textarea name="desc" class="form-control" style="height: 100px"> {{ $product->productDesc }}</textarea>
                                    <p style="color: red">{{ $errors->first('desc') }}</p>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="catid" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach ($category as $categories)
                                            @if ($product->catid == $categories->id)
                                                <option selected value="{{ $categories->id }}">
                                                    {{ $categories->catname }}</option>
                                            @else
                                                <option value="{{ $categories->id }}">{{ $categories->catname }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>


</main>
