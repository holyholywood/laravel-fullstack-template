<aside id="navbar" class="w-full max-w-xs min-h-screen border-r h-fit sticky top-0 left-0">
    <div class="px-4 py-4 flex items-center justify-between">
        <a href="/" class="font-semibold text-2xl">{{ env('APP_NAME') }}</a>
    </div>
    <ul class="mt-8">
        <li>
            <a href="/dashboard" class="navbar-single-item">
                <i class="ri-bar-chart-box-line text-base"></i>Dashboard</a>
        </li>

        <li class="pl-4">
            <button class="navbar-parent-group">
                <i class="ri-file-shield-2-line text-base"></i></i>Policies</button>
            <ul class="pl-4">
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-shield-check-line text-base"></i>Policies
                        Management</a>
                </li>
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-coins-line text-base"></i>Premiums</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="navbar-parent-group">
                <i class="ri-inbox-line text-base"></i></i>Policy Types and Packages</button>
            <ul class="pl-4">
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-stack-line text-base"></i>Policy Types</a>
                </li>
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-red-packet-line text-base"></i>
                        Packages</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="navbar-parent-group">
                <i class="ri-shield-check-line text-base"></i></i>Claims and Refunds</button>
            <ul class="pl-4">
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-shield-line text-base"></i>Claims</a>
                </li>
                <li>
                    <a href="#" class="navbar-child-item"><i class="ri-refund-line text-base"></i>Refunds</a>
                </li>
            </ul>
        </li>
        @canany(['VIEW_MEDIA'])
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-database-line text-base"></i>Metadata</button>
            <ul class="pl-4">
                @can('VIEW_MEDIA', 'web')
                <li>
                    <a href="{{ route('media_index') }}"
                        class="navbar-child-item {{ Route::is('media_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-image-line text-base"></i>Media</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
        @canany(['VIEW_CUSTOMER', 'VIEW_CUSTOMER_INCOME'])
        <li class="pl-4">
            <button class="navbar-parent-group"><i class="ri-folder-user-line text-base"></i>CRM</button>
            <ul class="pl-4">
                @can('VIEW_CUSTOMER', 'web')
                <li>
                    <a href="{{ route('customer_index') }}"
                        class="navbar-child-item {{ Route::is('customer_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-user-community-line text-base"></i>Customer</a>
                </li>
                @endcan
                @can('VIEW_CUSTOMER_INCOME', 'web')
                <li>
                    <a href="{{ route('customer_income_index') }}"
                        class="navbar-child-item {{ Route::is('customer_income_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-money-dollar-circle-line text-base"></i>Customer
                        Income</a>
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
                    <a href="{{ route('user_index') }}"
                        class="navbar-child-item {{ Route::is('user_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-user-settings-line text-base"></i>User Management</a>
                </li>
                @endcan
                @can('VIEW_ROLE_PERMISSION', 'web')
                <li>
                    <a href="{{ route('role_index') }}"
                        class="navbar-child-item {{ Route::is('role_index') ? 'navbar-child-item-active' : '' }}"><i
                            class="ri-shield-user-line text-base"></i>Role & Permission</a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
    </ul>
</aside>