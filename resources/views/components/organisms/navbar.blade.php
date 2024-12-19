<aside id="navbar" class="w-full max-w-xs min-h-screen border-r h-fit sticky top-0 left-0">
    <div class="px-4 py-4 flex items-center justify-between">
        <a href="/" class="font-semibold text-2xl">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggle">
            <i class="ri-menu-line text-2xl"></i>
        </button>
    </div>
    <ul class="mt-8">
        <li>
            <a href="/dashboard"
                class="px-4 py-2 flex items-center justify-start gap-2 !no-underline hover:bg-blue-200 duration-200 hover:text-white text-sm">
                <i class="ri-bar-chart-box-line text-base"></i>Dashboard</a>
        </li>
        <li class="pl-4">
            <button class="text-gray-500 font-medium py-4 flex items-center gap-2 text-sm"><i
                    class="ri-folder-user-line text-base"></i>CRM</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('customer_index') }}"
                        class="px-4 py-2 flex items-center justify-start gap-2 !no-underline hover:bg-blue-200 duration-200 hover:text-white text-sm"><i
                            class="ri-user-community-line text-base"></i>Customer</a>
                </li>
                <li>
                    <a href="{{ route('customer_income_index') }}"
                        class="px-4 py-2 flex items-center justify-start gap-2 !no-underline hover:bg-blue-200 duration-200 hover:text-white text-sm"><i
                            class="ri-money-dollar-circle-line text-base"></i>Customer
                        Income</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="text-gray-500 font-medium py-4 flex items-center gap-2 text-sm"><i
                    class="ri-database-line text-base"></i>Metadata</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('media_index') }}"
                        class="px-4 py-2 flex items-center justify-start gap-2 !no-underline hover:bg-blue-200 duration-200 hover:text-white text-sm"><i
                            class="ri-image-line text-base"></i>Media</a>
                </li>
            </ul>
        </li>
        <li class="pl-4">
            <button class="text-gray-500 font-medium py-4 flex items-center gap-2 text-sm"><i
                    class="ri-settings-line text-base"></i>Setting</button>
            <ul class="pl-4">
                <li>
                    <a href="{{ route('user_index') }}"
                        class="px-4 py-2 flex items-center justify-start gap-2 !no-underline hover:bg-blue-200 duration-200 hover:text-white text-sm"><i
                            class="ri-user-line text-base"></i>User Management</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>