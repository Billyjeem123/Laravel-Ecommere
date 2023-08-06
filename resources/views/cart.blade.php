@extends('layout.main')

@section('main')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            <div class="row gy-3">
                                @foreach ($cartitems as $product)
                                    @php
                                        $products = $product->products;
                                    @endphp

                                    @foreach ($products as $item)
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                  @if (count($product->productImages) > 0)
                                                    @php
                                                        $firstImage = $product->productImages[0];
                                                        $imageUrl = asset('uploads/' . $firstImage->imageName);
                                                        $total = 0;
                                                        $productPrice = (int)$item->price ;
                                                        $subtotal = $item->productQuantity * $productPrice;
                                                        $total += $subtotal
                                                                                                    @endphp
                                                        <div class="image-container mb-3">
                                                        <a href="#" class="d-block" style="position: relative; overflow: hidden;">
                                                            <img src="{{ $imageUrl }}" class="card-img-top rounded-2 fit-image" alt="Product Image" />
                                                        </a>
                                                    </div>
                                                @endif


                                                    <div class="">
                                                        <a href="javascript:void(0)"
                                                            class="nav-link">{{ $item->pname }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            <div class="d-none">
                                                <select style="width: 100px;" class="form-select me-4">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <small class="text-muted text-nowrap"> {{ $item->price }} / per item
                                                </small>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end">
                                                <a href="javascript:void(0)!"
                                                    class="btn btn-light border px-2 icon-hover-primary"><i
                                                        class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>


                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name=""
                                            placeholder="Coupon code" />
                                        <button class="btn btn-light border">Apply</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">WALLET BALANCE</label>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Wallet Balance:</p>
                                        <p class="mb-2">N 0.00</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2">N {{$total}}</p>
                            </div>
                            

                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">N {{$total}}</p>
                            </div>

                            <div class="mt-3">
                                <a href="javascript:void(0)" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                <a href="javascript:void(0)" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
    <!-- cart + summary -->
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>Recommended items</h3>
            </header>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                        <div class="mask px-2" style="height: 50px;">
                            <div class="d-flex justify-content-between">
                                <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                                <a href="javascript:void(0)"><i
                                        class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp"
                                class="card-img-top rounded-2" />
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="javascript:void(0)" class="nav-link">Gaming Headset with Mic</a>
                            <div class="price-wrap mb-2">
                                <strong class="">$18.95</strong>
                                <del class="">$24.99</del>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="javascript:void(0)" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="javascript:void(0)"><i
                                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="javascript:void(0)" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp"
                                class="card-img-top rounded-2" />
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="javascript:void(0)" class="nav-link">Apple Watch Series 1 Sport </a>
                            <div class="price-wrap mb-2">
                                <strong class="">$120.00</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="javascript:void(0)" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="javascript:void(0)"><i
                                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="javascript:void(0)" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp"
                                class="card-img-top rounded-2" />
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="javascript:void(0)" class="nav-link">Men's Denim Jeans Shorts</a>
                            <div class="price-wrap mb-2">
                                <strong class="">$80.50</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="javascript:void(0)" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card px-4 border shadow-0">
                        <div class="mask px-2" style="height: 50px;">
                            <a href="javascript:void(0)"><i
                                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                        </div>
                        <a href="javascript:void(0)" class="">
                            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                class="card-img-top rounded-2" />
                        </a>
                        <div class="card-body d-flex flex-column pt-3 border-top">
                            <a href="javascript:void(0)" class="nav-link">Mens T-shirt Cotton Base Layer Slim fit </a>
                            <div class="price-wrap mb-2">
                                <strong class="">$13.90</strong>
                            </div>
                            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="javascript:void(0)" class="btn btn-outline-primary w-100">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- Recommended -->