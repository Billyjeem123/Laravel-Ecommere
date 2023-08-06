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
                                        <th scope="col">Name</th>
                                        <th scope="col">Category-Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $categoryItems)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $categoryItems->id }}</td>
                                            <td>{{ $categoryItems->catname }}</td>
                                            <td>
                                                <a href="{{ route('editCategory', $categoryItems->id) }}" >Edit</a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('deleteCategory', $categoryItems->id)}}" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <p>No categories found</p>
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
