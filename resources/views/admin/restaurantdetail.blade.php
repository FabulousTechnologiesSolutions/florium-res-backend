<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Resturant Detail</title>
</head>

<body>

    <section>
        <div class="panel d-flex">
            @include('admin.template.sidebar')
            <div class="panel-right">
                <div class="right-top">
                    <span class="d-md-none"><i class="fa-solid fa-bars toggler"></i></span>
                </div>

                <div class="mycontainer">
                    <div class="right-mid mx-1 mx-sm-3  p-2">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-12 col-sm-7 p-0">
                                <h2 class="mb-0 mx-2">Resturant Detail</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
                            <input type="text" name="id" class="d-none" value="{{ $restaurant['id'] }}">
                            <div class="bottom-inner">
                                <section class="py-3 admn">
                                    <div class="mycontainer ">
                                        <div class="position-relative bg-ltw sld">
                                            <i class="fa-solid back fa-circle-arrow-left"></i>
                                            <div class="center2 ">
                                                @foreach ($restaurantdets as $restaurantdet)
                                                <img src="<?php echo asset('uploads/' . $restaurantdet['image']); ?>"
                                                    alt="" class="sldimg">
                                                @endforeach
                                            </div>
                                            <i class="fa-solid next fa-circle-arrow-right"></i>
                                        </div>
                                    </div>
                                </section>
                                <section class="my-3 admn">
                                    <div class="mycontainer">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <p
                                                    class="bg-success d-inline-block text-white rounded-3 px-3 py-2 mb-0">
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
                                                        <img src="/img/abt1.png" alt="" class="det-img me-2">
                                                        <p class="text-prpl mb-0">{{ $restaurant['location'] }}</p>
                                                    </div>
                                                    <div class="d-flex my-2 align-items-center">
                                                        <img src="/img/abt2.png" alt="" class="det-img me-2">
                                                        <p class="text-prpl mb-0">{{ $restaurant['type'] }}</p>
                                                    </div>
                                                    <div class="d-flex my-2 align-items-center">
                                                        <img src="/img/abt3.png" alt="" class="det-img me-2">
                                                        <p class="text-prpl mb-0">Average Price
                                                            €{{ $restaurant['price'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="tab-container mt-5">
                                                    <div class="tab tab1" data-tab="tab1">About</div>
                                                </div>
                                                <div id="tab1" class="tab-content px-0" style="display: block;">
                                                    <div class="mt-4">
                                                        <p>{{ $restaurant['about'] }}</p>
                                                        <h2 class="fs-2">
                                                            User Photos
                                                        </h2>
                                                        <div class="mt-3 d-flex">
                                                            <div class="col-4 d-flex flex-column">
                                                                <div class="py-1 glry1">
                                                                    <img src="<?php echo asset('uploads/' . $restaurant['image1']); ?>"
                                                                        alt=""
                                                                        class="w-100 h-100 object-cover rounded-3">
                                                                </div>
                                                                <div class="py-1 glry2">
                                                                    <img src="<?php echo asset('uploads/' . $restaurant['image2']); ?>"
                                                                        alt=""
                                                                        class="w-100 h-100 object-cover rounded-3">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="py-1 px-2 h-100 glry3">
                                                                    <img src="<?php echo asset('uploads/' . $restaurant['image3']); ?>"
                                                                        alt=""
                                                                        class="w-100 h-100 object-cover rounded-3">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="py-1 glry4">
                                                                    <img src="<?php echo asset('uploads/' . $restaurant['image4']); ?>"
                                                                        alt=""
                                                                        class="w-100 h-100 object-cover rounded-3">
                                                                </div>
                                                                <div class="py-1 glry5">
                                                                    <img src="<?php echo asset('uploads/' . $restaurant['image5']); ?>"
                                                                        alt=""
                                                                        class="w-100 h-100 object-cover rounded-3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="h-100 col-lg-4 py-3">
                                                <div class=" shadow rounded-4 ">
                                                    <div class="px-3 py-3 bg-white text-prpl head-radius  myshadow ">
                                                        <p class="mb-0 fw-md fs-6">
                                                            Restaurant Link and Phone Number
                                                        </p>
                                                    </div>
                                                    <div class="py-4 px-3">
                                                        <a href="#" class="d-block wrap text-black" target="_blank">
                                                            <p class="mb-0 wrap text-black">
                                                                {{ $restaurant['link'] }}</p>
                                                        </a>
                                                        <a href="tel:{{ $restaurant['phone'] }}"
                                                            class="d-block text-decoration-none text-black mt-3"
                                                            target="_blank">{{ $restaurant['phone'] }}</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.template.jslinks')
</body>

</html>