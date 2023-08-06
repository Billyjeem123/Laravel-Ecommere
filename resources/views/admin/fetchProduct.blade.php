@extends('layout.tables')



@section('dataTables')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Category Table</h5>

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

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product-Name</th>
                                        <th scope="col">Product-Quantity</th>
                                        <th scope="col">Product-Price</th>
                                        <th scope="col">Product-Category</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $productsItems)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $productsItems->productName }}</td>
                                            <td>{{ $productsItems->productQuantity }}</td>
                                            <td> N {{ $productsItems->price}}</td>
                                            <td>{{ $productsItems->category->catname }}</td>
                                            <td>
                                                <a href="{{ route('editProduct', $productsItems->token) }}" >Edit</a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('deleteProduct', $productsItems->token)}}" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <p>No Product found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
