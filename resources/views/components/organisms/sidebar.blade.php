<aside id="navbar" class="w-full max-w-xs min-h-screen border-r h-fit sticky top-0 left-0">
    <div class="px-4 py-4 flex items-center justify-between">
        <a href="/" class="font-semibold text-2xl">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggle">
            <i class="ri-menu-line text-2xl"></i>
        </button>
    </div>
    <ul class="mt-8">
        <li>
            <a href="/dashboard" class="navbar-single-item">
                <i class="ri-bar-chart-box-line text-base"></i>Dashboard</a>
        </li>

        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-database-line text-base"></i>Metadata</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('media_index') }}"
                        class="navbar-child-item {{ Route::is('media_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-image-line text-base"></i>Media</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-folder-user-line text-base"></i>CRM</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('customer_index') }}"
                        class="navbar-child-item {{ Route::is('customer_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-user-community-line text-base"></i>Customer</a>
                </li>
                <li>
                    <a href="{{ route('customer_income_index') }}"
                        class="navbar-child-item {{ Route::is('customer_income_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-money-dollar-circle-line text-base"></i>Customer
                        Income</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-settings-line text-base"></i>Setting</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('currency_index') }}"
                        class="navbar-child-item {{ Route::is('currency_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-money-dollar-box-line text-base"></i>Currency</a>
                </li>
                <li>
                    <a href="{{ route('user_index') }}"
                        class="navbar-child-item {{ Route::is('user_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-user-settings-line text-base"></i>User Management</a>
                </li>
                <li>
                    <a href="{{ route('role_index') }}"
                        class="navbar-child-item {{ Route::is('role_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-shield-user-line text-base"></i>Role & Permission</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>