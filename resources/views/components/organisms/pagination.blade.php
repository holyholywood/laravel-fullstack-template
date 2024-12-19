<div class="flex items-center justify-between w-fit divide-x mx-auto text-sm border rounded-xl overflow-hidden">
    <!-- Previous Page Button -->
    @if ($lists->onFirstPage())
    <button class="flex items-center justify-center gap-2 px-4 py-2 text-gray-400 cursor-not-allowed" disabled>
        <i class="ri-arrow-left-double-line text-base"></i>
    </button>
    @else
    <a href="{{ $lists->url(1) }}" class="flex items-center justify-center gap-2 px-4 py-2">
        <i class="ri-arrow-left-double-line text-base"></i>
    </a>
    @endif
    @if ($lists->onFirstPage())
    <button class="flex items-center justify-center gap-2 px-4 py-2 text-gray-400 cursor-not-allowed" disabled>
        <i class="ri-arrow-left-s-line text-base"></i>
    </button>
    @else
    <a href="{{ $lists->previousPageUrl() }}" class="flex items-center justify-center gap-2 px-4 py-2">
        <i class="ri-arrow-left-s-line text-base"></i>
    </a>
    @endif

    <!-- Pagination Numbers -->
    @php
    $current = $lists->currentPage();
    $last = $lists->lastPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);

    if ($current <= 3) { $start=1; $end=min(5, $last); } elseif ($current>= $last - 2) {
        $start = max(1, $last - 4);
        $end = $last;
        }
        @endphp

        @foreach (range($start, $end) as $page)
        @if ($page == $current)
        <button class="h-full flex items-center justify-center py-2 px-4 bg-blue-500 text-white font-bold">
            {{ $page }}
        </button>
        @else
        <a href="{{ $lists->url($page) }}"
            class="h-full flex items-center justify-center py-2 px-4 text-gray-700 hover:bg-gray-200">
            {{ $page }}
        </a>
        @endif
        @endforeach

        <!-- Next Page Button -->
        @if ($lists->hasMorePages())
        <a href="{{ $lists->nextPageUrl() }}" class="flex items-center justify-center gap-2 px-4 py-2">
            <i class="ri-arrow-right-s-line text-base"></i>
        </a>
        @else
        <button class="flex items-center justify-center gap-2 px-4 py-2 text-gray-400 cursor-not-allowed" disabled>
            <i class="ri-arrow-right-s-line text-base"></i>
        </button>
        @endif
        @if ($lists->hasMorePages())
        <a href="{{ $lists->url($lists->lastPage()) }}" class="flex items-center justify-center gap-2 px-4 py-2">
            <i class="ri-arrow-right-double-line text-base"></i>
        </a>
        @else
        <button class="flex items-center justify-center gap-2 px-4 py-2 text-gray-400 cursor-not-allowed" disabled>
            <i class="ri-arrow-right-double-line text-base"></i>
        </button>
        @endif
</div>