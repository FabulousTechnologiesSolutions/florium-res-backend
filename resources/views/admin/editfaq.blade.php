<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Edit FAQ</title>
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
                                <h2 class="mb-0 mx-2">Edit FAQ</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right-bottom mx-1 mx-sm-3 ">
                        <div class="bottom-inner">
                            <div class="bottom-inner">
                                <form action="{{ route('admin.updatefaq') }}" method="POST">
                                    @csrf
                                    <input type="text" name="id" class="d-none" value="{{ $faq['id'] }}">
                                    <div class="row">
                                        <div class="col-12 py-1">
                                            <input type="text" name="title" value="{{ $faq['title'] }}"
                                                placeholder="title" class="form-control">
                                        </div>
                                        <div class="col-12   py-1">
                                            <textarea name="details" id="" cols="30" placeholder="Description" rows="8"
                                                class="form-control">{{ $faq['details'] }}</textarea>
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