<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Contact</title>
</head>

<body>
    @include('admin.template.navbar')
    <section class="my-4">
        <div class="mycontainer">
            <div class="row bg-hero position-relative align-items-center py-5 bg-prpl2 rounded-5 ">
                <div class="col-sm-6 col-lg-7 px-0 rounded-4 h-100 px-4 px-md-5 px-md-4 px-lg-5 position-relative">
                    <h1 class="display-4 fw-md text-center text-sm-start text-uppercase text-dark">Contact Us
                    </h1>
                    <p class="mb-0 text-dark">
                        {{ $details['details'] ?? '' }}
                    </p>
                </div>
                <div class="col-sm-6 col-lg-5 px-4 position-relative">
                    <img src="{{ asset('img/home-img.png') }}" class="w-100 px-3 px-sm-0 px-4 px-xl-5" alt="">
                </div>

                @include('admin.template.social')
            </div>
        </div>
    </section>
    @if(isset($details) && !empty($details))
    <section>
        <div class="mycontainer py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="row gx-3 align-items-end">
                        <div class="col-5 pt-5">
                            <img src="{{ asset('uploads/' . $details['image1']) }}" alt="" class="w-100 rounded-4">
                        </div>
                        <div class="col-7">
                            <img src="{{ asset('uploads/' . $details['image2']) }}" alt="" class="w-100 rounded-4">
                        </div>
                    </div>
                    <div class="row gx-3 mt-3">
                        <div class="col-6">
                            <img src="{{ asset('uploads/' . $details['image3']) }}" alt=""
                                class="w-100 rounded-4 h-100">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('uploads/' . $details['image4']) }}" alt=""
                                class="w-100 rounded-4 h-100">
                        </div>
                    </div>
                </div>
                @if (session('success'))
                <script>
                    swal("Good job!", "{{ session('success') }}", "success");
                </script>
                @endif
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="shadow rounded-4 px-4 py-4">
                        <h2 class="fs-2 text-uppercase">Write to us</h2>
                        <form action="{{ route('send') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="text" name="name" id="" placeholder="Your Name"
                                class="py-2 rounded-2 border border-1 w-100 my-2 focus-none px-3" required>
                            <input type="email" name="email" id="" placeholder="Email"
                                class="py-2 rounded-2 border border-1 w-100 my-2 focus-none px-3" required>
                            <input type="url" name="website" id="" placeholder="Website"
                                class="py-2 rounded-2 border border-1 w-100 my-2 focus-none px-3" required>
                            <textarea name="message" id="" rows="5" placeholder="Write Something"
                                class="py-2 rounded-2 border border-1 w-100 my-2 focus-none px-3" required></textarea>
                            <button type="submit" class="py-3 w-100 px-3 text-white bg-prpl border-0 rounded-3">Send
                                a Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @include('admin.template.footer')
    @include('admin.template.loinsignup')
    @include('admin.template.jslinks')
</body>

</html>