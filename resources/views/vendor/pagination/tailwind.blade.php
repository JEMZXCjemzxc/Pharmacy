@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between py-4 bg-gray-50 rounded-md shadow-sm">
        <div class="flex items-center justify-between w-full sm:w-auto sm:flex-1 sm:space-x-4">
            
            <!-- Previous Page Button -->
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg cursor-not-allowed">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-white bg-gray-400 rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:bg-gray-300 transition">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            <!-- Pagination Items (First, Last, and Current Pages) -->
            <div class="flex items-center space-x-2">
                @foreach ($elements as $element)
                    @if (is_string($element)) <!-- "Three Dots" Separator -->
                        <span class="px-3 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-md cursor-default">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element)) <!-- Page Number Links -->
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="px-4 py-2 text-sm font-medium text-white bg-gray-400 rounded-md cursor-default">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:bg-gray-300 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            <!-- Next Page Button -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 text-sm font-medium text-white bg-gray-400 rounded-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:bg-gray-300 transition">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg cursor-not-allowed">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
