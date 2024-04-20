<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.template.csslinks')
    <title>Terms of Use</title>
</head>

<body>
    @include('admin.template.navbar')
    <section class="my-5">
        <div class="mycontainer">
            <h2 class="fs-1 fw-normal text-center text-black fw-bold">
                Terms of Use
            </h2>
            <div class="my-4">
                <dl class="row">
                    <dt class="col-sm-3">Acceptance of Terms:</dt>
                    <dd class="col-sm-9">By using this service, you agree to be bound by these terms of use. If you do not agree to these terms, please do not use the service.</dd>
              
                    <dt class="col-sm-3">Permitted Use:</dt>
                    <dd class="col-sm-9">This service is intended for personal, non-commercial use only. You agree not to use this service for any illegal or unauthorized purpose.</dd>
              
                    <dt class="col-sm-3">User-Generated Content:</dt>
                    <dd class="col-sm-9">By submitting content such as reviews, ratings, or photos, you grant the service a worldwide, non-exclusive, royalty-free, transferable, and sublicensable license to use, reproduce, modify, distribute, and display that content.</dd>
              
                    <dt class="col-sm-3">User Responsibility:</dt>
                    <dd class="col-sm-9">You are solely responsible for the accuracy and legality of any content you submit to the service. You agree not to submit any content</dd>
                    
                    <dt class="col-sm-3">Contact Email:</dt>
                    <dd class="col-sm-9"><a href="mailto:nearyourestaurant@gmail.com" class="text-decoration-none">nearyourestaurant@gmail.com</a></dd>
                </dl>
            </div>
        </div>
    </section>
  
    @include('admin.template.footer')
    @include('admin.template.loinsignup')
    @include('admin.template.rateus')
    @include('admin.template.jslinks')
</body>

</html>