<aside id="navbar" class="w-full max-w-xs min-h-screen border-r h-fit sticky top-0 left-0">
    <div class="px-4 py-4 flex items-center justify-between">
        <a href="/" class="font-semibold text-2xl">{{ env('APP_NAME') }}</a>
    </div>
    <ul class="mt-8">
        <li>
            <a href="{{ route('dashboard.index') }}" class="navbar-single-item">
                <i class="ri-bar-chart-box-line text-base"></i>Dashboard</a>
        </li>
        @canany(['VIEW_MEDIA'])
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-database-line text-base"></i>Metadata</button>
            <ul class="pl-4">
                @can('VIEW_MEDIA', 'web')
                <li>
                    <a href="{{ route('media.index') }}"
                        class="navbar-child-item {{ Route::is('media.index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-image-line text-base"></i>Media</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany

        @canany(['VIEW_CURRENCY', 'VIEW_USER', 'VIEW_ROLE_PERMISSION'])
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-settings-line text-base"></i>Setting</button>
            <ul class="pl-4">
                @can('VIEW_CURRENCY', 'web')
                <li>
                    <a href="{{ route('currency_index') }}"
                        class="navbar-child-item {{ Route::is('currency_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-money-dollar-box-line text-base"></i>Currency</a>
                </li>
                @endcan
                @can('VIEW_USER', 'web')
                <li>
                    <a href="{{ route('user.index') }}"
                        class="navbar-child-item {{ Route::is('user.index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-user-settings-line text-base"></i>User Management</a>
                </li>
                @endcan
                @can('VIEW_ROLE_PERMISSION', 'web')
                <li>
                    <a href="{{ route('role.index') }}"
                        class="navbar-child-item {{ Route::is('role.index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-shield-user-line text-base"></i>Role & Permission</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
    </ul>
</aside>