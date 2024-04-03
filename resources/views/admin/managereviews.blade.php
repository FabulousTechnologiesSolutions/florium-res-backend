<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Client Reviews</title>
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
                                <h2 class="mb-0 mx-2">Client Reviews</h2>
                            </div>
                        </div>
                    </div>
                    @if (session('Delete'))
                    <script>
                        swal("Good job!", "{{ session('Delete') }}", "success");
                    </script>
                    @endif
                    <div class="right-bottom mx-1 mx-sm-3">
                        <div class="bottom-inner">
                            <div class="table-responsive tbl1">
                                <table class="table tbl table-row">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">User</th>
                                            <th scope="col">Stars</th>
                                            <th scope="col">Review</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($reviews as $review)
                                        <tr class="">
                                            <td>{{$review['name']}}</td>
                                            <td>{{$review['ratingInput']}}</td>
                                            <td>{{$review['msg']}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ 'deletereview/' . $review['rid'] }}"
                                                        class="text-decoration-none  mx-3">
                                                        <i class="fa-solid text-danger fa-trash"></i>
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