<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .cart-count {
            background-color: black;
            /* Background color for the cart count */
            color: #fff;
            /* Text color for the cart count */
            font-size: 12px;
            border-radius: 50%;
            padding: 3px 6px;
            margin-left: 5px;
            /* Adjust the spacing as needed */
        }
    </style>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Jumbotron -->
        <div class="p-3 text-center bg-white border-bottom">
            <div class="container">
                <div class="row gy-3">
                    <!-- Left elements -->
                    <div class="col-lg-2 col-sm-4 col-4">
                        <a href="https://mdbootstrap.com/" target="_blank" class="float-start">
                            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                        </a>
                    </div>
                    <!-- Left elements -->

                   @yield('cart')
                    <!-- Center elements -->

                    <!-- Right elements -->
                    <div class="col-lg-5 col-md-12 col-12 d-flex justify-content-center">
                      <div class="input-group">
                        <div class="form-outline">
                          <input type="search" placeholder="Search" id="form1" class="form-control" />
                        </div>
                        <button type="button" class="btn btn-primary shadow-0">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    
                    <!-- Right elements -->
                </div>
            </div>
        </div>
        <!-- Jumbotron -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#f5f5f5;">
            <!-- Container wrapper -->
            <div class="container justify-content-center justify-content-md-between">
                <!-- Toggle button -->
                <button class="navbar-toggler border text-dark py-2" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="javascript:void(0)navbarLeftAlignExample" aria-controls="navbarLeftAlignExample"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="javascript:void(0)">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="javascript:void(0)">Categories</a>
                        </li>

                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark mb-0" href="javascript:void(0)"
                                id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                Others
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>

    @yield('main')


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="container">
                <div class="row d-flex">
                </div>
            </div>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5 mb-4">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-12 col-lg-3 col-sm-12">
                        <!-- Content -->
                        <a href="https://mdbootstrap.com/" target="_blank" class="ms-md-2">
                            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                        </a>
                        <p class="mt-3">
                            © 2023 Copyright: MDBootstrap.com.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-dark fw-bold mb-2">
                            Store
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-muted" href="javascript:void(0)">About us</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Find store</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Categories</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Blogs</a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-dark fw-bold mb-2">
                            Information
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-muted" href="javascript:void(0)">Help center</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Money refund</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Shipping info</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Refunds</a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-dark fw-bold mb-2">
                            Support
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-muted" href="javascript:void(0)">Help center</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Documents</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">Account restore</a></li>
                            <li><a class="text-muted" href="javascript:void(0)">My orders</a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-12 col-lg-3">
                        <!-- Links -->
                        <h6 class="text-uppercase text-dark fw-bold mb-2">Our apps</h6>
                        <a href="javascript:void(0)" class="mb-2 d-inline-block"> <img
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/misc/btn-appstore.webp"
                                height="38" /></a>
                        <a href="javascript:void(0)" class="mb-2 d-inline-block"> <img
                                src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/misc/btn-market.webp"
                                height="38" /></a>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
        <div class="container">
            <div class="py-4 border-top">
                <div class="d-flex justify-content-between">
                    <!--- payment --->
                    <div class="text-dark">
                        <i class="fab fa-lg fa-cc-visa"></i>
                        <i class="fab fa-lg fa-cc-amex"></i>
                        <i class="fab fa-lg fa-cc-mastercard"></i>
                        <i class="fab fa-lg fa-cc-paypal"></i>
                    </div>
                    <!--- payment --->

                    <!--- language selector --->
                    <div class="dropdown dropup">
                        <a class="dropdown-toggle text-dark" href="javascript:void(0)" id="Dropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false"> <i
                                class="flag-united-kingdom flag m-0"></i> English </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-united-kingdom flag"></i>English <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-poland flag"></i>Polski</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-china flag"></i>中文</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-japan flag"></i>日本語</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-germany flag"></i>Deutsch</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-france flag"></i>Français</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-spain flag"></i>Español</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-russia flag"></i>Русский</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="flag-portugal flag"></i>Português</a>
                            </li>
                        </ul>
                    </div>
                    <!--- language selector --->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="/assets/vendor/fontawesome-free/js/fontawesome.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
