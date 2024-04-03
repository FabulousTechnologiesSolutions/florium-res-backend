<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Dashboard</title>
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
                    <div class="right-mid mx-1 mx-sm-3 p-2">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-12 col-sm-7 p-0">
                                <h2 class="mb-0 mx-2">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3">
                        <div class="bottom-inner">
                            <div class="row mx-2 mx-md-0 d-flex justify-content-between ">
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Total Restaurant</p>
                                        </div>
                                        <h2 class="display-3 text-center p-3 mb-0">{{$totalrestaurants}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Total Locations</p>
                                        </div>
                                        <h2 class="display-3 text-center text-center p-3 mb-0">{{$locations}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Restaurant Available</p>
                                        </div>
                                        <h2 class="display-3 text-center p-3 mb-0">{{$totalavailable}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Food Types</p>
                                        </div>
                                        <h2 class="display-3 text-center p-3 mb-0">{{$foodtypes}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Users</p>
                                        </div>
                                        <h2 class="display-3 text-center p-3 mb-0">{{$totalusers}}</h2>
                                    </div>
                                </div>
                                <div class="col-12 my-4 col-sm-6 col-lg-4">
                                    <div class="sdw rounded-4">
                                        <div class="gradient rounded-top-4">
                                            <p class="p-3 text-white fw-bold">Queries</p>
                                        </div>
                                        <h2 class="display-3 text-center p-3 mb-0">{{$Queries}}</h2>
                                    </div>
                                </div>
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