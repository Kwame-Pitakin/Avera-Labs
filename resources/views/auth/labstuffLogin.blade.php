@extends('layouts.auth-Layout.authlayout')

@section('title', 'Login')

@section('content')

    <style>
        .error {
            color: red;
            font-size: 5px;
        }

        .support-button {

            position: fixed;
            bottom: 20px;
            right: 20px;
            font-weight: 700;

        }

        .btn-label-primary {
            color: #237381;
            border-color: transparent;
            background: #e5edfc;
            padding: 10px 25px;
        }
    </style>
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">

                            </span>
                            <span class="app-brand-text demo h3 mb-0 fw-bold">Avera Labs</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 ">Welcome to Laboratory Stuff 👋</h4>
                    <p class="mb-4">Please sign-in to your account</p>

                    <form id="loginAuthentication" class="mb-3"action="{{ route('labstuff.authenticate') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email" autofocus value="{{ old('email') }}" />
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        <small>Forgot Password?</small>
                                    </a>
                                @endif
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" {{ old('password') }} />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                
                            </div>

                            @error('password')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="mb-3">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          
                              <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                          </div>
                      </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>




                </div>
            </div>
            <!-- /Register -->
            <button type="button" class="support-button  btn rounded-pill btn-label-primary ">
                <i class="fa-solid fa-circle-question"></i>&nbsp; Support
            </button>


        </div>
    </div>

@endsection
