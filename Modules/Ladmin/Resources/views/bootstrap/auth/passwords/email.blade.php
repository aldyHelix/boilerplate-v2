<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form method="POST" action="{{ route('ladmin.password.send-link-email') }} class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
    @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Forgot Password ?') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Enter your email to reset your password.') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}"
            placeholder="E-mail Address" required autofocus/>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                @include('partials.general._button-indicator', ['label' => 'Send Password Reset Link'])
            </button>

            <a href="{{ route('ladmin.login') }}" class="btn btn-lg btn-light-primary fw-bolder">{{ __('Cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Forgot Password Form-->

</x-auth-layout>


{{-- <x-ladmin-guest-layout meta-title="Reset Password">

    <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10">

            <form action="{{ route('ladmin.password.send-link-email') }}" method="POST">
                @csrf
                <x-ladmin-card class="mx-3 mb-5 rounded-lg">
                    <x-slot name="body">
                        <h5 class="mb-3">Reset Password</h5>

                        <x-ladmin-alert class="mb-3" />

                        <x-ladmin-input class="mb-3" placeholder="E-mail Address" name="email" type="email" />

                        <div class="text-end mb-3">
                            <x-ladmin-button>
                                Send Password Reset Link
                            </x-ladmin-button>
                        </div>
                    </x-slot>
                </x-ladmin-card>
            </form>


            <div class="text-center">
                <a href="{{ route('ladmin.login') }}">&larr; Back to login</a>
            </div>
        </div>
    </div>

</x-ladmin-guest-layout> --}}
