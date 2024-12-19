<div class="flex items-center gap-2 text-sm text-gray-500">
    <span>Show</span>
    <select id="table-pagination" class="input-select Ttext-base w-fit" autocomplete="off">
        <option value="5" {{ $lists->perPage() ==5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ $lists->perPage() ==10 ? 'selected' : '' }}>10</option>
        <option value="25" {{ $lists->perPage() ==25 ? 'selected' : '' }}>25</option>
        <option value="50" {{ $lists->perPage() ==50 ? 'selected' : '' }}>50</option>
        <option value="100" {{ $lists->perPage() ==100 ? 'selected' : '' }}>100</option>
    </select>
    <script>
        $(document).ready(function () {
            $('#table-pagination').on('change', function () {
                let selectedLimit = $(this).val(); 
                let currentUrl = new URL(window.location.href); 
                currentUrl.searchParams.set('limit', selectedLimit);
                window.location.href = currentUrl.toString();
            });
        });
    </script>
</div>