@php
    $logo = App\Models\Logo::first();
@endphp
<nav class="navbar navbar-expand-md shadow-sm">
    <div class="mycontainer py-2 d-flex flex-wrap justify-content-between">
        <a class="navbar-brand me-xl-5 pe-xl-3 text-prpl" href="{{ route('/') }}">
            <img src="<?php echo asset('uploads/' . $logo->logo); ?>" class="w-100" alt="">
        </a>
        <button class="navbar-toggler text-white px-0 py-0 border-0 focus-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#mynavbar">
            <i class="fa-solid fa-bars fs-3 text-prpl"></i>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item px-lg-2">
                    <a
                        class="nav-link {{ request()->routeIs('/','searchfilter','detailssearch') ? 'active-color' : '' }}" href="{{ route('/') }}">Home</a>
                </li>
                <li class="nav-item px-lg-2">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active-color' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item px-lg-2">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active-color' : '' }}"
                        href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex align-items-center mt-3 mt-md-0">
               @if(auth()->user())
                    {{-- {{ Auth::user()->name }} --}}
                    <a class="rounded-pill text-decoration-none border-prpl px-4 py-2 text-white bg-prpl" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="#"
                        class="rounded-pill text-decoration-none border-prpl px-4 py-2 text-white bg-prpl me-3 reg-open">Sign
                        up</a>
                    <a href="#"
                        class="rounded-pill text-decoration-none border-prpl px-4 py-2 text-prpl me-3 login-btn">Sign
                        in</a>
                    <a href="#">
                        <img src="img/profile.png" alt="" class="profile">
                    </a>
                @endif
                </div>
            </div>
    </nav>
