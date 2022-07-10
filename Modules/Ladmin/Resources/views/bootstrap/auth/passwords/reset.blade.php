<x-auth-layout>

    <!--begin::Reset Password Form-->
    <form method="POST" action="{{ route('ladmin.password.update') }}" class="form w-100" novalidate="novalidate" id="kt_new_password_form">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Update Your Password') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email', $request->email) }}" required/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">
                    {{ __('Password') }}
                </label>
                <!--end::Label-->

                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="new-password"/>

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                {{ __('Use 8 or more characters with a mix of letters, numbers & symbols.') }}
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Confirm Password') }}</label>
            <input class="form-control form-control-solid" type="password" name="password_confirmation" autocomplete="off" required/>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                @include('partials.general._button-indicator')
            </button>

            <a href="{{ theme()->getPageUrl('login') }}" class="btn btn-lg btn-light-primary fw-bolder">{{ __('Cancel') }}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Reset Password Form-->

    @section('scripts')
        <script src="{{ asset($request->input('demo', 'demo1') . '/js/custom/authentication/password-reset/new-password.js') }}" type="application/javascript"></script>
    @endsection

</x-auth-layout>

{{-- <x-ladmin-guest-layout meta-title="Reset Password">

    <div class="row justify-content-center align-items-center d-flex vh-100">
        <div class="col-lg-4 col-md-6 col-sm-10 col-xs-10">

            <form action="{{ route('ladmin.password.update') }}" method="POST">
                @csrf
                <x-ladmin-card class="mx-3 mb-5 rounded-lg">
                    <x-slot name="body">
                        <h5 class="mb-3">New Password</h5>

                        <x-ladmin-alert class="mb-3" />

                        <x-ladmin-input class="mb-3" :value="$email" type="email" readonly />
                        <x-ladmin-input class="mb-3" placeholder="Password" name="password" type="password" />
                        <x-ladmin-input class="mb-3" placeholder="Password Confirmation" name="password_confirmation" type="password" />

                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="text-end mb-3">
                            <x-ladmin-button>
                                Reset Password
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
