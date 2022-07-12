<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
	<!--begin::Heading-->
    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset(theme()->getMediaUrlPath() . 'misc/pattern-1.jpg') }}')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold px-9 mt-10 mb-6">
            Notifications
        </h3>
        <!--end::Title-->

        <!--begin::Tabs-->
        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
            <li class="nav-item">
                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 " data-bs-toggle="tab" href="#kt_topbar_notifications_1">Alerts</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2">Updates</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3">User Activity</a>
            </li>
        </ul>
        <!--end::Tabs-->
    </div>
	<!--end::Heading-->

    <!--begin::Tab content-->
    <div class="tab-content">
        <!--begin::Tab panel-->
        <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
            <!--begin::Items-->
            <x-ladmin-notification :user="auth()->user()"/>
            <!--end::Items-->
        </div>
        <!--end::Tab panel-->

         <!--begin::Tab panel-->
         <div class="tab-pane fade" id="kt_topbar_notifications_2" role="tabpanel">
            <!--begin::Items-->
                {{-- <x-ladmin-notification :user={{ auth()->user() }} /> --}}
            <!--end::Items-->
        </div>
        <!--end::Tab panel-->

        <!--begin::Tab panel-->
        <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">
            <x-ladmin-logs />
        </div>
        <!--end::Tab panel-->
    </div>
    <!--end::Tab content-->
</div>
<!--end::Menu-->
