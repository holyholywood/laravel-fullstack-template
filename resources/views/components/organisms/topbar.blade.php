<header class="px-8 py-4 mx-auto flex items-center justify-between bg-white border-b sticky top-0 inset-x-0">
    <div class="flex items-center gap-4 ml-auto">
        <a href="{{ route('profile.index') }}" class="!no-underline !text-slate-600 flex items-center gap-2">
            <img src="{{ auth()->user()->profile_picture }}" alt="{{ auth()->user()->name }} picture" width="50"
                height="50" class="w-10 h-10 bg-black rounded-full overflow-hidden object-cover">
            <div>
                <div class="text-sm font-medium">{{ auth()->user()->name }}</div>
                <div class="text-sm text-gray-500">{{
                    str(auth()->user()->getRoleNames()[0])->lower()->title()->replace('_',
                    " ") }}</div>
            </div>
        </a>
        <a href="{{ route('auth_logout') }}" class="btn btn-primary-outline"><i
                class="ri-logout-box-line"></i>Logout</a>
    </div>
</header>