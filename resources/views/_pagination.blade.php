@if ($paginator->hasPages())
<nav class="py-3 px-4 flex justify-end border-t border-gray-600" role="navigation" aria-label="Pagination Navigation">
    {{-- Previous Page Link --}}
    @if (!$paginator->onFirstPage())
    <a class="btn flex items-center rounded-r-none" href="{{ $paginator->previousPageUrl() }}" rel="prev">
        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
            <path d="M3.828 9l6.071-6.071-1.414-1.414L0 10l.707.707 7.778 7.778 1.414-1.414L3.828 11H20V9H3.828z" />
        </svg>

        <span class="ml-1">
            {{ __('pagination.previous') }}
        </span>
    </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="ml-1 btn flex items-center rounded-l-none" href="{{ $paginator->nextPageUrl() }}" rel="next">
        <span>
            {{ __('pagination.next') }}
        </span>

        <svg class="ml-1 w-4 h-4 fill-current" viewBox="0 0 20 20">
            <path d="M16.172 9l-6.071-6.071 1.414-1.414L20 10l-.707.707-7.778 7.778-1.414-1.414L16.172 11H0V9z" />
        </svg>
    </a>
    @endif
</nav>
@endif
