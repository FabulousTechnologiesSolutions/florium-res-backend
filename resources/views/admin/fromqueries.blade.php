<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Queries</title>
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
                                <h2 class="mb-0 mx-2">Contact Form Queries</h2>
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
                    <div class="right-bottom mx-1 mx-sm-3">
                        <div class="bottom-inner">
                            <div class="table-responsive tbl1">
                                <table class="table tbl table-row">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">website</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($queries as $query)
                                        <tr class="">
                                            <td class="text-nowrap">{{ $query['name'] }}</td>
                                            <td>{{ $query['email'] }}</td>
                                            <td>{{ $query['website'] }}</td>
                                            <td>{{ $query['message'] }}</td>
                                            <td>
                                                <a href="{{ 'deletequery/' . $query['id'] }}"
                                                    class="text-decoration-none  mx-2">
                                                    <i class="fa-solid text-danger fa-trash"></i>
                                                </a>
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