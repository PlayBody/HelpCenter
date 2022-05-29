@if ($paginator->hasPages())
    <nav class="pagination">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            @else
                <li class="pagination-first">
                    <a href="{{ $paginator->url(1) }}" rel="nofollow">«</a>
                </li>
                <li class="pagination-prev">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev nofollow">‹</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-current">
                                <span>{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" rel="prev nofollow">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next nofollow">&rsaquo;</a>
                </li>
                <li class="pagination-last">
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="nofollow">»</a>
                </li>
            @else
            @endif
        </ul>
    </nav>
@endif
