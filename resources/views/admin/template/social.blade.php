@php
    $contact = App\Models\Contact::first();
@endphp
@if ($contact)
    <div class="position-absolute social-hero bgwht px-3 py-4 d-flex align-items-center flex-column">
        <a href="{{ $contact->twitter }}" class="text-black text-decoration-none my-2">
            <i class="fa-brands fa-twitter fs-4"></i>
        </a>
        <a href="{{ $contact->facebook }}" class="text-black text-decoration-none my-2">
            <i class="fa-brands fa-facebook-f fs-4"></i>
        </a>
        <a href="{{ $contact->instagram }}" class="text-black text-decoration-none my-2">
            <i class="fa-brands fa-instagram fs-4"></i>
        </a>
        <a href="{{ $contact->youtube }}" class="text-black text-decoration-none my-2">
            <i class="fa-brands fa-youtube fs-4"></i>
        </a>
    </div>
@endif
