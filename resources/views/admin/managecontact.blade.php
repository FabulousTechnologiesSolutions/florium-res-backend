<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Contact</title>
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
                                <h2 class="mb-0 mx-2">Contact</h2>
                            </div>
                        </div>
                    </div>
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
                    @if (session('update'))
                    <script>
                        swal("Good job!", "{{ session('update') }}", "success");
                    </script>
                    @endif
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
                            <form action="{{ route('admin.updatecontact') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6 py-1">
                                        <input type="url" name="facebook" class="form-control"
                                            value="{{ $details['facebook'] ?? '' }}" placeholder="Facebook Link"
                                            required>
                                    </div>
                                    <div class="col-12 col-sm-6 py-1">
                                        <input type="url" name="instagram" class="form-control"
                                            value="{{ $details['instagram'] ?? '' }}" placeholder="Instagram Link"
                                            required>
                                    </div>
                                    <div class="col-12 col-sm-6 py-1">
                                        <input type="url" name="twitter" class="form-control"
                                            value="{{ $details['twitter'] ?? '' }}" placeholder="Twitter Link" required>
                                    </div>
                                    <div class="col-12 col-sm-6 py-1">
                                        <input type="url" name="youtube" class="form-control"
                                            value="{{ $details['youtube'] ?? '' }}" placeholder="YouTube Link" required>
                                    </div>
                                    <div class="col-12 py-1">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $details['address'] ?? '' }}" placeholder="Address" required>
                                    </div>
                                    <div class="col-12 py-1">
                                        <textarea name="details" id="" cols="30" placeholder="Description" rows="5"
                                            class="form-control">{{ $details['details'] ?? '' }}</textarea>
                                    </div>
                                    <div class="col-12 py-1">
                                        <textarea name="footerdet" id="" cols="30" placeholder="Description" rows="5"
                                            class="form-control">{{ $details['footerdet'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-around flex-wrap justify-content-md-between align-items-center">
                                    <div class="change-profile1 mt-3">
                                        @if ($details)
                                        <img src="{{ asset('uploads/' . $details['image1']) }}" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff">
                                        @else
                                        <img src="{{ asset('img/item1.png') }}" alt="" class="w-100 rounded-4"
                                            id="user_photo_staff">
                                        @endif
                                        <div>
                                            <input type="file" name="image1" id="photo"
                                                class="d-none @error('image') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="image" autofocus>
                                            <label for="photo"
                                                class="camera1 text-center d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="change-profile1 mt-3">
                                        @if ($details)
                                        <img src="{{ asset('uploads/' . $details['image2']) }}" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff1">
                                        @else
                                        <img src="{{ asset('img/item1.png') }}" alt="" class="w-100 rounded-4"
                                            id="user_photo_staff1">
                                        @endif
                                        <div>
                                            <input type="file" name="image2" id="photo1"
                                                class="d-none @error('image') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="image" autofocus>
                                            <label for="photo1"
                                                class="camera1 text-center d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="change-profile1 mt-3">
                                        @if ($details)
                                        <img src="{{ asset('uploads/' . $details['image3']) }}" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff2">
                                        @else
                                        <img src="{{ asset('img/item1.png') }}" alt="" class="w-100 rounded-4"
                                            id="user_photo_staff2">
                                        @endif
                                        <div>
                                            <input type="file" name="image3" id="photo2"
                                                class="d-none @error('image') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="image" autofocus>
                                            <label for="photo2"
                                                class="camera1 text-center d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="change-profile1 mt-3">
                                        @if ($details)
                                        <img src="{{ asset('uploads/' . $details['image4']) }}" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff3">
                                        @else
                                        <img src="{{ asset('img/item1.png') }}" alt="" class="w-100 rounded-4"
                                            id="user_photo_staff3">
                                        @endif
                                        <div>
                                            <input type="file" name="image4" id="photo3"
                                                class="d-none @error('image') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="image" autofocus>
                                            <label for="photo3"
                                                class="camera1 text-center d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mt-2 mb-2 py-1">
                                    <button
                                        class="gradient text-decoration-none px-5 border-0 py-2 text-white rounded-3">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.template.jslinks')
</body>

</html>