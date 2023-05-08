@extends('layouts.app')
@section('title', 'Verify Email')

@section('content')
    <!-- Content -->

    <div class="authentication-wrapper authentication-basic px-4">
        <div class="authentication-inner py-4">
            <!-- Verify Email -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Verify your email ✉️</h4>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    
                    <p class="text-start">
                        Account activation link sent to your email address: <span
                            style="color:#237381;font-weight:bold">{{ Auth::user()->email }} </span> please check your email
                        for a verification link.
                        <br> <br>
                    <p>If you did not receive the email</p>

                    </p>
                    <a class="btn btn-primary w-100 " href="index.html">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </a>
                    {{-- <p class="text-center">
              Didn't get the mail?
              <a href="javascript:void(0);"> Resend </a>
            </p> --}}
                </div>
            </div>
            <!-- /Verify Email -->
        </div>
    </div>

    <!-- / Content -->
@endsection
