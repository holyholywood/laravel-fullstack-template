<header class="px-8 py-4 mx-auto flex items-center justify-between bg-white border-b sticky top-0 inset-x-0">
    <div class="flex items-center gap-4 ml-auto">
        <div>
            <div class="text-sm font-medium">{{ auth()->user()->name }}</div>
            <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
        </div>
        <a href="{{ route('auth_logout') }}" class="btn btn-primary-outline"><i
                class="ri-logout-box-line"></i>Logout</a>
    </div>
</header>