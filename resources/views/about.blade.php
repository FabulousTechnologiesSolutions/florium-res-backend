<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>About</title>
</head>

<body>
    @include('admin.template.navbar')
    <section class="my-4">
        <div class="mycontainer">
            <div class="row bg-hero position-relative align-items-center py-5 bg-prpl2 rounded-5 ">
                <div class="col-sm-6 col-lg-7 px-0 rounded-4 h-100 px-4 px-md-5 px-md-4 px-lg-5 position-relative">
                    <h1 class="display-4 fw-md text-center text-sm-start text-black">About Us
                    </h1>
                    <p class="mb-0 text-black">
                        {{ $data['details']->systemdetails }}
                    </p>
                </div>
                <div class="col-sm-6 col-lg-5 px-4 position-relative">
                    <img src="{{ asset('img/home-img.png') }}" class="w-100 px-3 px-sm-0 px-4 px-xl-5" alt="">
                </div>
                @include('admin.template.social')
            </div>
            <div class="row about-hero px-4 position-relative pt-4">
                @foreach($data['types'] as $type)
                <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                    <div
                        class="bg-prpl2 shadow px-4 px-md-5 py-4 h-100 rounded-4 d-flex flex-column align-items-center">
                        <div class="event-img2">
                            <img src="<?php echo asset('uploads/' . $type['image']); ?>" alt=""
                                class="w-100 h-100 object-cover rounded-circle">
                        </div>
                        <h3 class="fs-4 fw-normal text-center mt-3 text-black">{{ $type['dishes'] }}+</h3>
                        <p class="fs-6 text-center text-black mb-0">{{ $type['type'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @if(isset($data['details']))
    <section>
        <div class="mycontainer py-md-5">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row py-5  align-items-center">
                        <div class="col-md-6 col-lg-5 ">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('uploads/' . $data['details']->image) }}" alt="usjdh"
                                    class="imgabt object-cover">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 mt-4 mt-md-0">
                            <div class="mx-4">
                                <h2 class="fs-1 fw-normal text-black fw-bold d-none d-md-block">
                                    About Our System
                                </h2>
                                <p class="text-secondary fs-5 text-center text-md-start">
                                    {{ $data['details']->aboutdetails }}
                                </p>
                                <div class="mt-3 d-flex justify-content-center justify-content-md-start">
                                    <a href="#"
                                        class="text-white text-decoration-none px-4 d-inline-block mx-4 rounded-4 py-3 bg-prpl">Contact
                                        Us</a>
                                    <a href="#"
                                        class="text-white text-decoration-none px-4 d-inline-block mx-4 rounded-4 py-3 bg-dark"
                                        data-bs-target="#exampleModal" data-bs-toggle="modal">Rate Us</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    @if (count($reviews) > 0)
    <section class="bg-ltw">
        <div class="mycontainer py-5 py-sm-5">
            <div class="row justify-content-between ">
                <h2 class="fs-1 fw-normal text-center mb-4 text-prpl">
                    Client Reviews
                </h2>
            </div>
            <div class="center">
                @foreach ($reviews as $review)
                <div class="p-2">
                    <div class="card px-3 px-sm-4 py-4 rounded-4 border-0">
                        <div
                            class="d-flex flex-column flex-sm-row justify-content-center align-items-center mx-3 clientss">
                            <img src="{{ asset('img/2.jpg') }}" class="rounded-circle" alt="img/ist.jpeg">
                            <div class="mx-4">
                                <p class="mb-0 fw-bold">{{$review['name']}}</p>
                                <p class="mb-0 text-secondary">/ Customer</p>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <p class="">
                                {{$review['msg']}}
                            </p>
                            <i class="fa-solid mt-3 text-success fs-2 fa-quote-left"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @include('admin.template.footer')
    @include('admin.template.loinsignup')
    @include('admin.template.rateus')
    @include('admin.template.jslinks')
</body>

</html>