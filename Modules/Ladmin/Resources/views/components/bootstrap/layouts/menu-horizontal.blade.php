<div>
    <!-- Well begun is half done. - Aristotle -->
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
    <!--begin::Menu wrapper-->
    <div class="header-menu align-items-stretch"
        data-kt-drawer="true"
        data-kt-drawer-name="header-menu"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'200px', '300px': '250px'}"
        data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"

        data-kt-swapper="true"
        data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}"
    >
        <!--begin::Menu-->
        <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
            id="#kt_header_menu"
            data-kt-menu="true"
        >
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
</div>
