<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Add Restaurant</title>
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
                                <h2 class="mb-0 mx-2">Add Restaurant</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
                            <div class="bottom-inner">
                                <form action="{{ route('admin.updaterestaurant') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" class="d-none" value="{{ $restaurant['id'] }}">
                                    <p class="fw-bold mb-0">Cover Photo</p>
                                    <div class="change-profile1">
                                        <img src="<?php echo asset('uploads/' . $restaurant['image']); ?>" alt=""
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
                                            <input type="text" value="{{ $restaurant['name'] }}" name="name"
                                                placeholder="Resturant's Name" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" value="{{ $restaurant['location'] }}" name="location"
                                                placeholder="Resturant's Location" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="url" value="{{ $restaurant['link'] }}" name="link"
                                                placeholder="Resturant's Link" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="tel" value="{{ $restaurant['phone'] }}" name="phone"
                                                placeholder="Resturant's phone" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" value="{{ $restaurant['type'] }}" name="type"
                                                placeholder="Food type" class="form-control">
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" value="{{ $restaurant['price'] }}" name="price"
                                                placeholder="Average Price" class="form-control">
                                        </div>
                                        <div class="col-12 py-1">
                                            <select name="avaibility" class="form-control">
                                                <option value="Available" {{ $restaurant['avaibility']=='Available'
                                                    ? 'selected' : '' }}>
                                                    Available</option>
                                                <option value="Not Available" {{
                                                    $restaurant['avaibility']=='Not Available' ? 'selected' : '' }}>
                                                    Not Available</option>
                                            </select>
                                        </div>
                                        <div class="col-12   py-1">
                                            <textarea name="details" id="" cols="30"
                                                placeholder="Resturant's Description" rows="3"
                                                class="form-control">{{ $restaurant['details'] }}</textarea>
                                        </div>
                                        <div class="col-12   py-1">
                                            <textarea name="about" id="" cols="30" placeholder="About Resturant"
                                                rows="3" class="form-control">{{ $restaurant['about'] }}</textarea>
                                        </div>
                                        <div class="col-12 py-1">
                                            <p class="fw-bold mb-0">Add User Photos</p>
                                            <div
                                                class="d-flex justify-content-around flex-wrap align-items-center justify-content-lg-between">
                                                <div class="change-profile1 mt-2">
                                                    <img src="<?php echo asset('uploads/' . $restaurant['image1']); ?>"
                                                        alt="" class="sldimg rounded-4" id="user_photo_staff1">
                                                    <div>
                                                        <input type="file" name="image1" id="photo1"
                                                            class="d-none  @error('image1') is-invalid @enderror"
                                                            value="{{ old('name') }}" autocomplete="image1" autofocus>
                                                        <label for="photo1"
                                                            class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                            <i class="fa-solid fa-camera text-white "></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="change-profile1 mt-2">
                                                    <img src="<?php echo asset('uploads/' . $restaurant['image2']); ?>"
                                                        alt="" class="sldimg rounded-4" id="user_photo_staff2">
                                                    <div>
                                                        <input type="file" name="image2" id="photo2"
                                                            class="d-none  @error('image2') is-invalid @enderror"
                                                            value="{{ old('name') }}" autocomplete="image2" autofocus>
                                                        <label for="photo2"
                                                            class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                            <i class="fa-solid fa-camera text-white "></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="change-profile1 mt-2">
                                                    <img src="<?php echo asset('uploads/' . $restaurant['image3']); ?>"
                                                        alt="" class="sldimg rounded-4" id="user_photo_staff3">
                                                    <div>
                                                        <input type="file" name="image3" id="photo3"
                                                            class="d-none  @error('image3') is-invalid @enderror"
                                                            value="{{ old('name') }}" autocomplete="image3" autofocus>
                                                        <label for="photo3"
                                                            class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                            <i class="fa-solid fa-camera text-white "></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="change-profile1 mt-2">
                                                    <img src="<?php echo asset('uploads/' . $restaurant['image4']); ?>"
                                                        alt="" class="sldimg rounded-4" id="user_photo_staff4">
                                                    <div>
                                                        <input type="file" name="image4" id="photo4"
                                                            class="d-none  @error('image4') is-invalid @enderror"
                                                            value="{{ old('name') }}" autocomplete="image4" autofocus>
                                                        <label for="photo4"
                                                            class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                            <i class="fa-solid fa-camera text-white "></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="change-profile1 mt-2">
                                                    <img src="<?php echo asset('uploads/' . $restaurant['image5']); ?>"
                                                        alt="" class="sldimg rounded-4" id="user_photo_staff5">
                                                    <div>
                                                        <input type="file" name="image5" id="photo5"
                                                            class="d-none  @error('image5') is-invalid @enderror"
                                                            value="{{ old('name') }}" autocomplete="image5" autofocus>
                                                        <label for="photo5"
                                                            class="camera1 text-center d-flex align-items-center  justify-content-center">
                                                            <i class="fa-solid fa-camera text-white "></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (count($galleryImages) > 0)
                                        <h4 class="fs-6 mt-4 mb-2 fw-bold ms-2">Gallery images</h4>
                                        <div id="preview-container">
                                            <?php $num = 1; ?>
                                            @foreach ($galleryImages as $galleryImage)
                                            <label for="gallery-img-<?php echo $num; ?>"
                                                class="position-relative w-300  my-2 mx-2">
                                                <input type="text" class="w-100 d-none" name="gallery_id[]"
                                                    value="{{ $galleryImage->id }}">
                                                <img id="preview-img-<?php echo $num; ?>"
                                                    src="<?php echo asset('uploads/' . $galleryImage['image']); ?>"
                                                    alt="" class="sldimg">
                                                <input type="file" name="imagesold[]"
                                                    class="position-absolute top-0 start-0 w-100 h-100 d-none"
                                                    id="gallery-img-<?php echo $num; ?>"
                                                    onchange="updateImageSrc(this, 'preview-img-<?php echo $num; ?>')">
                                            </label>
                                            <?php $num++; ?>
                                            @endforeach
                                        </div>
                                        @endif

                                        <p class="fw-bold mt-4 ms-2">Add more Images</p>
                                        <div class="d-flex flex-wrap align-items-center ms-2">
                                            <div class=" my-2 img-m me-2 d-flex flex-wrap">
                                            </div>
                                            <i class="fas fa-plus my-2 text-white bg-prpl px-2 py-2" id="addInput"></i>
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