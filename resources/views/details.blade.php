<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Details</title>
</head>

<body>
    @include('admin.template.navbar')
    <input type="text" name="id" class="d-none" value="{{ $restaurant['id'] }}">
    @if (count($restaurantdets) > 0)
    <section class="py-5 py-sm-5 ">
        <div class="mycontainer ">
            <div class="position-relative bg-ltw p-4 sld">
                <i class="fa-solid back fa-circle-arrow-left"></i>
                <div class="center2 ">
                    @foreach ($restaurantdets as $restaurantdet)
                    <img src="<?php echo asset('uploads/' . $restaurantdet['image']); ?>" alt="" class="sldimg">
                    @endforeach
                </div>
                <i class="fa-solid next fa-circle-arrow-right"></i>
            </div>
        </div>
    </section>
    @endif
    @if (session('success'))
    <script>
        swal("Good job!", "{{ session('success') }}", "success");
    </script>
    @endif
    @if (session('Delete'))
    <script>
        swal("Good job!", "{{ session('Delete') }}", "success");
    </script>
    @endif
    @if (session('error'))
    <script>
        swal("Error!", "{{ session('error') }}", "error");
    </script>
    @endif
    <section class="my-3">
        <div class="mycontainer">
            <div class="row">
                <div class="col-lg-8">
                    <p class="bg-success d-inline-block text-white rounded-3 px-3 py-2 mb-0">
                        {{ $restaurant['avaibility'] }}
                    </p>
                    <h2 class="fs-3 mt-3">
                        {{ $restaurant['name'] }}
                    </h2>
                    <p>{{ $restaurant['details'] }}</p>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 yellow fa-star"></i>
                            <i class="fa-solid fs-5 gray fa-star"></i>
                        </div>
                        <p class="mb-0">4.00/5.00</p>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex my-2 align-items-center">
                            <img src="{{ asset('img/abt1.png') }}" alt="" class="det-img me-2">
                            <p class="text-prpl mb-0">{{ $restaurant['location'] }}</p>
                        </div>
                        <div class="d-flex my-2 align-items-center">
                            <img src="{{ asset('img/abt2.png') }}" alt="" class="det-img me-2">
                            <p class="text-prpl mb-0">{{ $restaurant['type'] }}</p>
                        </div>
                        <div class="d-flex my-2 align-items-center">
                            <img src="{{ asset('img/abt3.png') }}" alt="" class="det-img me-2">
                            <p class="text-prpl mb-0">Average Price €{{ $restaurant['price'] }}</p>
                        </div>
                        <a href="#" class="text-white text-decoration-none px-4 d-inline-block rounded-4 py-3 bg-prpl"
                            data-bs-target="#exampleModal" data-bs-toggle="modal">Rate Us</a>
                    </div>
                    <div class="tab-container mt-5">
                        <div class="tab tab1" data-tab="tab1">About</div>
                        <div class="tab tab2" data-tab="tab2">Ratings</div>
                    </div>
                    <div id="tab1" class="tab-content px-0" style="display: block;">
                        <div class="col-sm-10 col-md-8">
                            <div class="mt-4">
                                <p>{{ $restaurant['about'] }}</p>
                                <h2 class="fs-2">
                                    User Photos
                                </h2>
                                <div class="mt-3 d-flex">
                                    <div class="col-4 d-flex flex-column">
                                        <div class="py-1 glry1">
                                            <img src="<?php echo asset('uploads/' . $restaurant['image1']); ?>" alt=""
                                                class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                        <div class="py-1 glry2">
                                            <img src="<?php echo asset('uploads/' . $restaurant['image2']); ?>" alt=""
                                                class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-1 px-2 h-100 glry3">
                                            <img src="<?php echo asset('uploads/' . $restaurant['image3']); ?>" alt=""
                                                class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-1 glry4">
                                            <img src="<?php echo asset('uploads/' . $restaurant['image4']); ?>" alt=""
                                                class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                        <div class="py-1 glry5">
                                            <img src="<?php echo asset('uploads/' . $restaurant['image5']); ?>" alt=""
                                                class="w-100 h-100 object-cover rounded-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-content px-0" style="display: block;">
                        <div class="mt-4">
                            <h2 class="fs-2">
                                Reviews
                            </h2>
                            <div class="mt-3 row">
                                <div class="col-md-6">
                                    <div class="bg-notice ">
                                        <div class="px-3 py-3 d-flex align-items-center">
                                            <div
                                                class="d-flex align-items-center py-4 px-3 border-prpl rounded-circle me-3">
                                                <p class="mb-0 ">4.5/</p>
                                                <p class="mt-3 mb-0 small">5.0</p>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-prpl fs-5">
                                                    Excellent table
                                                </p>
                                                <p class="mb-0 small">5974 reviews</p>
                                                <div class="mt-2">
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 yellow fa-star"></i>
                                                    <i class="fa-solid fs-5 gray fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top border-1">
                                            <div class="row">
                                                <div class="col-4 px-0">
                                                    <div
                                                        class="d-flex flex-column  py-2 border-end border-1 align-items-center">
                                                        <div>
                                                            <div class="d-flex align-items-center  rounded-circle">
                                                                <p class="mb-0 small">4.5/</p>
                                                                <p class="mt-3 mb-0 small">5.0</p>
                                                            </div>
                                                            <p class="mt-2 text-prpl small">
                                                                Dishes
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 px-0">
                                                    <div
                                                        class="d-flex flex-column  py-2 border-end border-1 align-items-center">
                                                        <div>
                                                            <div class="d-flex align-items-center  rounded-circle">
                                                                <p class="mb-0 small">4.5/</p>
                                                                <p class="mt-3 mb-0 small">5.0</p>
                                                            </div>
                                                            <p class="mt-2 text-prpl small">
                                                                Service
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 px-0">
                                                    <div class="d-flex flex-column  py-2 align-items-center">
                                                        <div>
                                                            <div class="d-flex align-items-center  rounded-circle">
                                                                <p class="mb-0 small">4.5/</p>
                                                                <p class="mt-3 mb-0 small">5.0</p>
                                                            </div>
                                                            <p class="mt-2 text-prpl small">
                                                                Atmosphere
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0 det-progress">
                                    <div class="bg-notice h-100 px-3 py-3">
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    5
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:70%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    4
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    3
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:30%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    2
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:20%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center my-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-xl-2">
                                                <p class="mb-0">
                                                    1
                                                </p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-xl-10">
                                                <div class="progress shadow rounded-pill w-100">
                                                    <div class="progress-bar bg-prpl rounded-pill" style="width:10%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 col-lg-4 ">
                    <div class=" shadow rounded-4 ">
                        <div class="px-3 py-3 bg-white text-prpl head-radius  myshadow ">
                            <p class="mb-0 fw-md fs-6">
                                Restaurant Link and Phone Number
                            </p>
                        </div>
                        <div class="py-4 px-3">
                            <a href="{{ $restaurant['link'] }}" class="d-block text-black" target="_blank">{{
                                $restaurant['link'] }}</a>
                            <a href="tel:{{ $restaurant['phone'] }}"
                                class="d-block text-decoration-none text-black mt-3" target="_blank">{{
                                $restaurant['phone'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @include('admin.template.footer')
    @include('admin.template.jslinks')
    @include('admin.template.loinsignup')
    @include('admin.template.restaurantrate')
</body>

</html>