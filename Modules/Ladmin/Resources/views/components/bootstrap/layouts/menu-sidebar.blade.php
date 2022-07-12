@php
$viewMenu = function ($menus) use (&$viewMenu, $permissions) {
    $html = '';
    foreach ($menus as $menu) {
        if (in_array($menu['gate'], $permissions)) {
            $html .= ladmin()->component('layouts._parts._sidebar_menu_item', ['menu' => $menu, 'viewMenu' => $viewMenu]);
        }
    }
    return $html;
};
@endphp
<div
    class="hover-scroll-overlay-y my-5 my-lg-6"
    id="kt_aside_menu_wrapper"
    data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}"
    data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_header, #kt_aside_footer,  #kt_footer"
    data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu"
    data-kt-scroll-offset="0px"
>
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
        @if (Route::has('ladmin.index'))
            <div class="menu-item me-lg-1 {{ Route::is('ladmin.index') ? 'active' : null }}">
                <a class="menu-link py-3" href="{{ route('ladmin.index') }}">
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
        @endif

        {!! $viewMenu(
            ladmin()->menu()->all(),
            false,
        ) !!}
    </div>
    <!--end::Menu-->
</div>
