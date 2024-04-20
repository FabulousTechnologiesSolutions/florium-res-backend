@php
    $contact = App\Models\Contact::first();
@endphp
@if(isset($contact) && !empty($contact))
<footer class="bg-prpl1 text-white">
    <div class="mycontainer">
        <div class="py-5">
            @if ($contact)
                <div class="row ">
                    <div class="col-sm-6 my-2 my-md-0 col-md-3 col-lg-3">
                        <p class="mb-0 text-light small">
                            {{ $contact->footerdet }}
                        </p>
                        <div class="d-flex align-items-center mt-4">
                            <a href="{{ $contact->twitter }}"
                                class="text-dark bg-white rounded-circle px-2 py-2 socialftr d-flex align-items-center justify-content-center text-decoration-none my-2 me-2">
                                <i class="fa-brands fa-twitter fs-5"></i>
                            </a>
                            <a href="{{ $contact->facebook }}"
                                class="text-dark bg-white rounded-circle px-2 py-2 socialftr d-flex align-items-center justify-content-center text-decoration-none my-2 me-2">
                                <i class="fa-brands fa-facebook-f fs-5"></i>
                            </a>
                            <a href="{{ $contact->instagram }}"
                                class="text-dark bg-white rounded-circle px-2 py-2 socialftr d-flex align-items-center justify-content-center text-decoration-none my-2 me-2">
                                <i class="fa-brands fa-instagram fs-5"></i>
                            </a>
                            <a href="{{ $contact->youtube }}"
                                class="text-dark bg-white rounded-circle px-2 py-2 socialftr d-flex align-items-center justify-content-center text-decoration-none my-2 me-2">
                                <i class="fa-brands fa-youtube fs-5"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 my-2 my-md-0 col-md-3 col-lg-3 d-flex flex-column align-items-md-center">
                        <div>
                            <h2 class="fs-5 pb-2">
                                Useful Links
                            </h2>
                            <a href="{{ route('/') }}" class="d-block my-2 text-light text-decoration-none">Home</a>
                            <a href="{{ route('about') }}"
                                class="d-block my-2 text-light text-decoration-none">About</a>
                            <a href="{{ route('contact') }}"
                                class="d-block my-2 text-light text-decoration-none">Contact</a>
                        </div>
                    </div>
                    <div class="col-sm-6 my-2 my-md-0 col-md-2 col-lg-3 d-flex flex-column align-items-md-center">
                        <div>
                            <h2 class="fs-5 pb-2">
                                Help?
                            </h2>
                            <a href="#" class="d-block my-2 text-light text-decoration-none">FAQ</a>
                            <a href="{{ route('terms') }}" class="d-block my-2 text-light text-decoration-none">Terms of Use</a>
                            <a href="#" class="d-block my-2 text-light text-decoration-none">Privacy
                                Policy</a>
                        </div>
                    </div>
                    <div class="col-sm-6 my-2 my-md-0 col-md-4 col-lg-3 ">
                        <div>
                            <h2 class="fs-5 pb-2">
                                Address
                            </h2>
                            <p class="mb-0 text-light small">
                                {{ $contact->address }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</footer>
<div class="copyright py-3 bg-black">
    <div class="mycontainer">
        <div class="row justify-content-center justify-content-between">
            <div class="col-md-7">
                <p class="mb-0 text-center text-md-start text-white pe-3">
                    © Copyright 2024, Maintained & developed by fabtechsol
                </p>
            </div>
            <div class="col-md-5">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end align-items-center">
                    <a href="{{ route('terms') }}" class="text-white text-decoration-none">Terms of Use</a>
                    <span class="px-2 px-lg-3">|</span>
                    <a href="#" class="text-white text-decoration-none">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
