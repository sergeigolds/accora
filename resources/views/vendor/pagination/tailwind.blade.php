@if ($paginator->hasPages())
    <div class="pagination-bar justify-content-center w-100 row">
        <nav>
            <ul class="pagination">
                @if($paginator->previousPageUrl())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a>
                    </li>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    {{--                    @if (is_string($element))--}}
                    {{--                        <span aria-disabled="true">--}}
                    {{--                                <span--}}
                    {{--                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>--}}
                    {{--                            </span>--}}
                    {{--                    @endif--}}

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item"><a class="page-link active" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>

@endif
