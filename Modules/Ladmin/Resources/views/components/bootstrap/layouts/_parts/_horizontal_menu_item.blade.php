@php
$route = null;
if (isset($menu['routeName'])) {
    $route = Route::has($menu['routeName']) ? route($menu['routeName'], $menu['routeParams'] ?? []) : $menu['routeName'];
}

$type = $menu['type'] ?? 'menu';

@endphp
@if ($type === 'menu')
    <div class="menu-item me-lg-1 {{ isset($menu['submenus']) && count($menu['submenus']) > 0 ? 'menu-lg-down-accordion' : null }} {{ request()->is($menu['isActive']) ? 'active' : '' }}"
        id="{{ $menu['id'] ?? null }}"
        {{ isset($menu['submenus']) && count($menu['submenus']) > 0 ? ' data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"' : ''}}>
        @if (isset($menu['submenus']) && count($menu['submenus']) > 0)
            <span class="menu-link py-3">
                {{-- <i class="{{ $menu['icon'] }}"></i> --}}
                <span class="menu-title">{{ $menu['name'] }}</span>
                @if (isset($menu['submenus']) && count($menu['submenus']) > 0)
                    <span class="menu-arrow d-lg-none"></span>
                @endif
            </span>
        @else
            <a class="menu-link py-3" href="{{ $route }}" target="{{ $menu['target'] }}">
                {{-- <i class="{{ $menu['icon'] }}"></i> --}}
                <span class="menu-icon">
                    <i class="{{ $menu['icon'] }}"></i>
                </span>
                <span class="menu-title">{{ $menu['name'] }}</span>
                @if (isset($menu['submenus']) && count($menu['submenus']) > 0)
                    <span class="menu-arrow d-lg-none"></span>
                @endif
            </a>
        @endif

        @if (isset($menu['submenus']) && count($menu['submenus']) > 0)
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                {!! $viewMenu($menu['submenus']) !!}
            </div>
        @endif
    </div>
@else
    <li class="menu-divider">
        @if (is_null($menu['name']) || empty($menu['name']))
            <hr />
        @else
            <div class="px-4 my-3">
                <strong>{{ $menu['name'] }}</strong>
            </div>
        @endif
    </li>
@endif
