<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Edit Food Type</title>
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
                            <div class="col-12 col-sm-7 p-0 ">
                                <h2 class="mb-0 mx-2">Edit Food Type</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
                            <div class="bottom-inner">
                                <form method="POST" action="{{ route('admin.updatefood') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" class="d-none" value="{{ $type['id'] }}">
                                    <div class="change-profile1">
                                        <img src="<?php echo asset('uploads/' . $type['image']); ?>" alt=""
                                            class="w-100 rounded-4" id="user_photo_staff">
                                        <div>
                                            <input type="file" name="image" id="photo"
                                                class="d-none  @error('image') is-invalid @enderror"
                                                value="{{ old('name') }}" autocomplete="image" autofocus>
                                            <label for="photo"
                                                class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                <i class="fa-solid fa-camera text-white "></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="number" name="dishes" value="{{ $type['dishes'] }}"
                                                placeholder="Number of dishes" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" name="type" value="{{ $type['type'] }}"
                                                placeholder="Food Type" class="form-control">
                                        </div>
                                        <div class="col-12  mb-2 py-1">
                                            <button type="submit"
                                                class="gradient text-decoration-none px-5 border-0 py-2 text-white rounded-3">Save</button>
                                        </div>
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