<section class="login-model custom-model">
    <div class="mycontainer d-flex align-items-center justify-content-center vh-100">
        <div class="col-lg-10 d-flex bg-pink custom-model-inner position-relative">
            <div class="row box justify-content-center ">
                <div class="d-none d-md-block col-md-6 me-0 pe-0 ps-0 login-img">
                    <div class="bg-prpl h-100">
                        <img src="{{ asset('img/signup.jpeg') }}" alt="login"
                            class="object-cover  px-4 py-4 h-100 w-100">
                    </div>
                </div>

                <div class="col-11 col-sm-9 col-md-6 login-right d-flex align-items-center">
                    <div class="row justify-content-center">
                        <div class="col-md-10 px-4 col-lg-10 pe-md-4 px-md-0 py-4">
                            <div class="">
                                <i class="fas fa-close close-icon close-login fs-4"></i>
                            </div>
                            <p class="fs-5 mb-0 mt-4 fw-md text-center">
                                Welcome to the Florium Restaurant
                            </p>
                            <p class="mb-0 text-center">
                                Please enter your login details below or if you are first time here you can Register
                                It's Free!
                            </p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="far fa-envelope me-2"></i>
                                    <input class="border-0 w-100 focus-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="fas fa-lock me-2"></i>
                                    <input class="border-0 w-100 focus-none  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" placeholder="Password">
                                </div>
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <a style="cursor: pointer" class="d-flex email-open justify-content-end mt-3 text-black">Forgot
                                    password</a>
                                <div class="mt-4 d-flex justify-content-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="me-1 me-sm-2 ">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                    <button type="submit" class="text-white border-0 rounded-pill bg-black px-4 px-md-4 px-lg-5 py-2">
                                        Sign in
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-0 text-center fw-bold mb-2">
                                        Or Login using:
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="mx-2">
                                            <img src="{{ asset('img/social.png') }}" alt="">
                                        </a>
                                        <a href="#" class="mx-2">
                                            <img src="{{ asset('img/social2.png') }}" alt="">
                                        </a>
                                        <a href="#" class="mx-2">
                                            <img src="{{ asset('img/social3.png') }}" alt="">
                                        </a>
                                    </div>
                                    <p class="mb-0 text-center mt-3">If you don't have an account. <span
                                            class="reg-open bg-transparent px-0 border-0 pointer text-black">"Register"</span>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reg-model custom-model">
    <div class="mycontainer d-flex align-items-center justify-content-center vh-100">
        <div class="col-lg-10 d-flex  bg-pink custom-model-inner position-relative">
            <div class="row box justify-content-center ">
                <div class="d-none d-md-block col-md-6 me-0 pe-0 ps-0 login-img">
                    <div class="bg-prpl h-100">
                        <img src="{{ asset('img/signup.jpeg') }}" alt="login"
                            class="object-cover  px-4 py-4 h-100 w-100">
                    </div>
                </div>
                <div class="col-11 col-sm-9 col-md-6 login-right d-flex align-items-center">
                    <div class="row justify-content-center">
                        <div class="col-md-10 px-4 col-lg-10 pe-md-4 px-md-0 py-4">
                            <div class="">
                                <i class="fas fa-close close-icon close-reg fs-4"></i>
                            </div>
                            <p class="fs-5 mb-0 mt-3 text-center">
                                Welcome to the Florium restaurant
                            </p>
                            <p class="mb-0 text-center">
                                Please enter your details below. If you are already registered 'Log In'
                            </p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input class="border-0 w-100 focus-none  d-none" name="role" value="1" type="number"
                                    readonly>
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="fa-regular fa-user me-2"></i>
                                    <input class="border-0 w-100 focus-none @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        autofocus type="text" placeholder="Nickname">
                                </div>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="far fa-envelope me-2"></i>
                                    <input class="border-0 w-100 focus-none  @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        type="email" placeholder="Email">
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="fas fa-lock me-2"></i>
                                    <input class="border-0 w-100 focus-none  @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" type="password"
                                        placeholder="Create Your Password">
                                </div>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="fas fa-lock me-2"></i>
                                    <input class="border-0 w-100 focus-none" type="password"
                                        placeholder="Confirm Password" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                                <div class="mt-4 d-flex justify-content-center justify-content-between">
                                    <div class="d-flex align-items-center ">
                                        <input type="checkbox" name="terms" id="terms" class="me-1 me-sm-2 " required>
                                        <label for="terms">Agree our <a href="{{ route('terms') }}">Terms of use</a></label>
                                    </div>
                                </div>
                                <div class="mt-2 d-flex justify-content-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="remember" class="me-1 me-sm-2 " name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember Me</label>
                                    </div>
                                    <button type="submit"
                                        class="text-white border-0 rounded-pill bg-black px-4 px-md-4 px-lg-5 py-2">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <p class="mb-0 text-center mt-3">You have account already? <span
                                            class="login-btn bg-transparent px-0 border-0 pointer text-black">"Login"</span>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="email-model custom-model">
    <div class="mycontainer d-flex align-items-center justify-content-center vh-100">
        <div class="col-lg-10 d-flex bg-pink custom-model-inner position-relative">
            <div class="row box justify-content-center ">
                <div class="d-none d-md-block col-md-6 me-0 pe-0 ps-0 login-img">
                    <div class="bg-prpl h-100">
                        <img src="{{ asset('img/signup.jpeg') }}" alt="login"
                            class="object-cover  px-4 py-4 h-100 w-100">
                    </div>
                </div>

                <div class="col-11 col-sm-9 col-md-6 login-right d-flex align-items-center">
                    <div class="row justify-content-center">
                        <div class="col-md-10 px-4 col-lg-10 pe-md-4 px-md-0 py-4">
                            <div class="">
                                <i class="fas fa-close close-icon close-email fs-4"></i>
                            </div>
                            <p class="fs-5 mb-0 mt-4 fw-md text-center">
                                Welcome to the Florium restaurant
                            </p>
                            <p class="mb-0 text-center">
                                Please enter your email below in order to reset your password
                            </p>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="px-2 py-3 rounded-4 d-flex align-items-center mt-3 px-4 bg-white shadow">
                                    <i class="far fa-envelope me-2"></i>
                                    <input class="border-0 w-100 focus-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                                <div class="mt-4 d-flex justify-content-center justify-content-between">
                                 
                                    <button type="submit" class="text-white border-0 rounded-pill bg-black px-4 px-md-4 px-lg-5 py-2">
                                        Send Password Reset Link
                                    </button>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>