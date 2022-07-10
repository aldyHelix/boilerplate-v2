<x-auth-layout>

    <!--begin::Signin Form-->
    <form method="POST" action="{{ route('ladmin.login.attempt') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Sign In as ') }} {{ config('ladmin.prefix') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('New Here?') }}

                <a href="{{ theme()->getPageUrl('register') }}" class="link-primary fw-bolder">
                    {{ __('Create an Account') }}
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" {{ old('email') }} required autofocus/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                <!--end::Label-->

                @if (Route::has('ladmin.password.form'))
                    <!--begin::Link-->
                    @if (Route::has('password.request'))
                        <a href="{{ route('ladmin.password.form') }}" class="link-primary fs-6 fw-bolder">
                            {{ __('Forgot Password ?') }}
                        </a>
                    @endif
                @endif
            <!--end::Link-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required/>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="remember"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Remember me') }}
            </span>
            </label>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                @include('partials.general._button-indicator', ['label' => __('Continue')])
            </button>
            <!--end::Submit button-->

            <!--begin::Separator-->
            {{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div> --}}
            <!--end::Separator-->

            <!--begin::Google link-->
            {{-- <a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/google-icon.svg') }}" class="h-20px me-3"/>
                {{ __('Continue with Google') }}
            </a> --}}
            <!--end::Google link-->

            <!--begin::Facebook link-->
            {{-- <a href="{{ url('/auth/redirect/facebook') }}?redirect_uri={{ url()->previous() }}" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'svg/brand-logos/facebook-4.svg') }}" class="h-20px me-3"/>
                {{ __('Continue with Facebook') }}
            </a> --}}
            <!--end::Facebook link-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signin Form-->

</x-auth-layout>


{{-- <x-ladmin-guest-layout meta-title="Sign In">

    <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10">
            <x-ladmin-card class="mx-3 mb-5 rounded-lg">
                <x-slot name="body">
                    <div class="px-4">
                        <div class="text-center p-3">
                            <img src="{{ config('ladmin.logo') }}" alt="Logo" class="mb-3" width="200">
                            <div>Sign in as {{ config('ladmin.prefix') }}</div>
                        </div>

                        <x-ladmin-alert class="mb-3" />

                        <form action="{{ route('ladmin.login.attempt') }}" method="POST">
                            @csrf

                            <x-ladmin-input type="email" class="mb-3" name="email" value="{{ old('email') }}" placeholder="E-mail Address" />

                            <x-ladmin-input type="password" class="mb-4" name="password" placeholder="Password" />

                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>

                                @if (Route::has('ladmin.password.form'))
                                    <div>
                                        <a href="{{ route('ladmin.password.form') }}">Forgot password?</a>
                                    </div>
                                @endif

                            </div>

                            <div class="text-end mb-4">
                                <x-ladmin-button>Sign In</x-ladmin-button>
                            </div>
                        </form>
                    </div>
                </x-slot>
            </x-ladmin-card>

            <div class="text-center">
                <a href="{{ url('/') }}">&larr; Back to home</a>
            </div>
        </div>
    </div>

</x-ladmin-guest-layout> --}}
