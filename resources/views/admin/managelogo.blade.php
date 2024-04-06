<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Logo</title>
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
                                <h2 class="mb-0 mx-2">About</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
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
                            <div class="bottom-inner">
                                <form action="{{ route('admin.updatelogo') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="change-profile1">
                                        @if ($details)
                                        <img src="{{ asset('uploads/' . $details['logo']) }}" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff">
                                        @else
                                        <img src="{{ asset('img/item1.png') }}" alt="" class="w-100 rounded-4"
                                            id="user_photo_staff">
                                        @endif
                                        <div>
                                            <input type="file" name="logo" id="photo"
                                                class="d-none  @error('logo') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="logo" autofocus>
                                            <label for="photo"
                                                class="camera1 text-center d-flex align-items-center justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3 mb-2 py-1">
                                        <button type="submit"
                                            class="gradient text-decoration-none px-5 border-0 py-2 text-white rounded-3">Save</button>
                                    </div>
                                </form>
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