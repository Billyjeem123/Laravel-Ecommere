@extends('layout.main')


@section('cart')
 <!-- Center elements -->
 <div class="order-lg-last col-lg-5 col-sm-8 col-8">
    <div class="d-flex float-end">
        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
            class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"
            target="_blank"> <i class="fas fa-user-alt m-1 me-md-2"></i>
            <p class="d-none d-md-block mb-0">Sign in</p>
        </a>
        <a href="https://github.com/mdbootstrap/bootstrap-material-design"
            class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"
            target="_blank"> <i class="fas fa-heart m-1 me-md-2"></i>
            <p class="d-none d-md-block mb-0">Wishlist</p>
        </a>
        <a href="{{route('fetchcart')}}"
            class="border rounded py-1 px-3 nav-link d-flex align-items-center">
            <i class="fas fa-shopping-cart m-1 me-md-2"></i>
            <p class="d-none d-md-block mb-0">My cart</p>
            <span id="cart-count" class="cart-count">{{$countCart}}</span>
        </a>
    </div>
</div>
    
@endsection

@section('main')
    <!-- intro -->
    <section class="pt-3">
        <div class="container">
            <div class="row gx-3">
                <main class="col-lg-9">
                    <div class="card-banner p-5 bg-primary rounded-5" style="height: 350px;">
                        <div style="max-width: 500px;">
                            <h2 class="text-white">
                                Great products with <br />
                                best deals
                            </h2>
                            <p class="text-white">No matter how far along you are in your sophistication as an amateur
                                astronomer, there is always one.</p>
                            <a href="javascript:void(0)" class="btn btn-light shadow-0 text-primary"> View more </a>
                        </div>
                    </div>
                </main>
                <aside class="col-lg-3">
                    <div class="card-banner h-100 rounded-5" style="background-color:#f87217;">
                        <div class="card-body text-center pb-5">
                            <h5 class="pt-5 text-white">Amazing Gifts</h5>
                            <p class="text-white">No matter how far along you are in your sophistication</p>
                            <a href="javascript:void(0)" class="btn btn-outline-light"> View more </a>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- row //end -->
        </div>
        <!-- container end.// -->
    </section>
    <!-- intro -->

    <!-- category -->
    <section>
        <div class="container pt-5">
            <nav class="row gy-4">
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-3">
                                <a href="" class="text-center d-flex flex-column justify-content-center">
                                    <button type="button" class="btn btn-outline-secondary mx-auto p-3 mb-2"
                                        data-mdb-ripple-color="dark">
                                        <i class="fas fa-fa-xl fa-fw"></i>
                                    </button>
                                    <div class="text-dark">{{ $category->catname }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


            </nav>
        </div>
    </section>
    <!-- category -->

    <!-- Products -->
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>New products</h3>
            </header>

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

            {{-- <div class="row">
                @foreach ($allProoduct as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2 shadow-0">
                            @if (count($product->images) > 0)
                                @php
                                    $firstImage = $product->images[0];
                                @endphp
                                <a href="" class="">
                                    <img src="{{ asset('uploads/' . $firstImage->imageName) }}"
                                        class="card-img-top rounded-2" style="aspect-ratio: 1 / 1" />
                                </a>
                            @endif
            
                            <div class="card-body p-0 pt-2">
                                <a href="" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i
                                        class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                <h5 class="card-title">N{{ $product->price }}</h5>
                                <p class="card-text mb-0">{{ $product->productName }}</p>
                                <p class="text-muted">
                                    Sizes: S, M, XL
                                </p>
                                <form action="{{ route('addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $product->token }}">
                                    <input type="hidden" name="usertoken" value="123">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}

            <div class="row">
                @foreach ($allProoduct as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                        <div class="mask px-2" style="height: 50px;">
                            <div class="d-flex justify-content-between">
                                <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                                <a href="javascript:void(0)"><i
                                        class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                            </div>
                        </div>
                        @if (count($product->images) > 0)
                          @php
                        $firstImage = $product->images[0];
                        @endphp
                        <a href="javascript:void(0)" class="">
                            <img src="{{ asset('uploads/' . $firstImage->imageName) }}"
                                class="card-img-top rounded-2" />
                        </a>
                        @endif
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="javascript:void(0)" class="nav-link">{{ $product->productName }}</a>
                            <div class="price-wrap mb-2">
                                <strong class="">N{{ $product->price }}</strong>
                            </div>
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $product->token }}">
                                <input type="hidden" name="usertoken" value="123">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-primary w-100">Add to Cart</button>
                           
                        </form>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>



            
          
    </section>
    <!-- Products -->
@endsection
