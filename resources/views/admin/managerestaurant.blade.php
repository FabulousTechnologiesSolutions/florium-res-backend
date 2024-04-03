<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Restaurant</title>
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
                                <h2 class="mb-0 mx-2">Restaurant</h2>
                            </div>
                            <div class="col-12 col-sm-5 d-flex justify-content-start justify-content-sm-end p-0">
                                <a href="{{ route('admin.addrestaurant') }}"
                                    class="gradient text-decoration-none px-4 mt-3 mt-sm-0 py-2 text-white rounded-3">Add
                                    Restaurant</a>
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
                    <div class="right-bottom1 mx-1 mx-sm-3">
                        <div class="bottom-inner">
                            <div class="table-responsive tbl1">
                                <table class="table tbl table-row">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Food type</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($restaurants as $restaurant)
                                        <tr class="">
                                            <td><img src="<?php echo asset('uploads/' . $restaurant['image']); ?>"
                                                    class="gameimg" alt="gameimg"></td>
                                            <td>{{$restaurant['name']}}</td>
                                            <td>{{$restaurant['location']}}</td>
                                            <td>{{$restaurant['type']}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ 'editrestaurant/' . $restaurant['id'] }}"
                                                        class="text-decoration-none">
                                                        <i class="fa-solid text-success fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ 'deleterestaurant/' . $restaurant['id'] }}"
                                                        class="text-decoration-none  mx-3">
                                                        <i class="fa-solid text-danger fa-trash"></i>
                                                    </a>
                                                    <a href="{{ 'restaurantdetail/' . $restaurant['id'] }}"
                                                        class="text-decoration-none ">
                                                        <i class="fa-solid text-primary fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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