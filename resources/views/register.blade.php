{{-- @extends('main.main_register')
@section('main_register') --}}
    {{-- content --}}
    {{-- <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                            <p class="text-lead text-white">Create your new account here</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4 pb-0">
                                <h5>Register</h5>
                            </div>

                            <div class="card-body">
                                <form role="form text-left" method="POST" action="{{ route('register_user') }}">
                                    @csrf
                                    <div class="mb-3"> --}}
                                        {{-- <input type="text" name="name" class="form-control" placeholder="Name"
                                            aria-label="Name" aria-describedby="email-addon"> --}}
                                        {{-- <input autocomplete="off" required type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" value="{{ old('name') }}" placeholder="Name">
                                    </div>
                                    <div class="mb-3"> --}}
                                        {{-- <input type="email" name="email" class="form-control" placeholder="Email"
                                            aria-label="Email" aria-describedby="email-addon"> --}}
                                        {{-- <input autocomplete="off" required type="text"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>

                                    <div class="mb-3"> --}}
                                        {{-- <input type="password" name="password" class="form-control" placeholder="Password"
                                            aria-label="Password" aria-describedby="password-addon"> --}}
                                        {{-- <input autocomplete="off" required minlength="8" placeholder="min 8 characters"
                                            type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" value="{{ old('password') }}"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                            class="text-dark font-weight-bolder">Login</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> --}}
{{-- @endsection --}}
