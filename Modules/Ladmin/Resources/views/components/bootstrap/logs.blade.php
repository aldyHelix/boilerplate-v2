<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <!--begin::Items-->
    <div class="scroll-y mh-325px my-5 px-8">
        @foreach ($logs as $log)
            <!--begin::Item-->
            <div class="d-flex flex-stack py-4">
                <!--begin::Section-->
                <div class="d-flex align-items-center me-2">
                    <!--begin::Code-->
                    <span class="w-70px me-4">{!! $log->getTypeBadgeAttribute() !!}</span>
                    <!--end::Code-->
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fw-bold">
                        {{ $log->user->first_name }}
                    </a>
                    <!--end::Title-->
                </div>
                <!--end::Section-->

                <!--begin::Label-->
                <span class="badge badge-light fs-8">{{ $log->updated_at }}</span>
                <!--end::Label-->
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Items-->
    <!--begin::View more-->
    <div class="py-3 text-center border-top">
        <a href="{{ route('ladmin.activities.index') }}" class="btn btn-color-gray-600 btn-active-color-primary">
            View All
            {!! theme()->getSvgIcon("icons/duotune/arrows/arr064.svg", "svg-icon-5") !!}
        </a>
    </div>
    <!--end::View more-->
</div>
