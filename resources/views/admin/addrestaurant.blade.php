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
                                <form action="{{ route('admin.saverestaurant') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <p class="fw-bold mb-0">Cover Photo</p>
                                    <div class="change-profile1">
                                        <img src="/img/item1.png" alt="" class="w-100 rounded-4" id="user_photo_staff">
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
                                            <input type="text" name="name" placeholder="Resturant's Name"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" name="location" placeholder="Resturant's Location"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="url" name="link" placeholder="Resturant's Link"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="tel" name="phone" placeholder="Resturant's phone"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" name="type" placeholder="Food type" class="form-control"
                                                required>
                                        </div>
                                        <div class="col-12 col-sm-6  py-1">
                                            <input type="text" name="price" placeholder="Average Price"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-12 py-1">
                                            <select name="avaibility" class="form-control" required>
                                                <option value="Available">Available</option>
                                                <option value="Not Available">Not Available</option>
                                            </select>
                                        </div>
                                        <div class="col-12   py-1">
                                            <textarea name="details" id="" cols="30"
                                                placeholder="Resturant's Description" rows="3" class="form-control"
                                                required></textarea>
                                        </div>
                                        <div class="col-12   py-1">
                                            <textarea name="about" id="" cols="30" placeholder="About Resturant"
                                                rows="3" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-12 py-1">
                                            <p class="fw-bold mb-0">Add User Photos</p>
                                            <div
                                                class="d-flex justify-content-around flex-wrap align-items-center justify-content-lg-between">
                                                <div class="change-profile1 mt-2">
                                                    <img src="/img/item1.png" alt="" class="w-100 rounded-4"
                                                        id="user_photo_staff1">
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
                                                    <img src="/img/item1.png" alt="" class="w-100 rounded-4"
                                                        id="user_photo_staff2">
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
                                                    <img src="/img/item1.png" alt="" class="w-100 rounded-4"
                                                        id="user_photo_staff3">
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
                                                    <img src="/img/item1.png" alt="" class="w-100 rounded-4"
                                                        id="user_photo_staff4">
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
                                                    <img src="/img/item1.png" alt="" class="w-100 rounded-4"
                                                        id="user_photo_staff5">
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

                                        <div class="mt-3">
                                            <img id="image-preview" src="" alt="" class="w-300" style="display: none;">
                                        </div>
                                        <p class="fw-bold mb-0">Add images for slider</p>
                                        <div class="d-flex flex-wrap align-items-center ">
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