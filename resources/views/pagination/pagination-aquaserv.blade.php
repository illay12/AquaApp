@if ($paginator->hasPages())
<nav>
    <ul class="pagination justify-content-center flex-wrap mb-0" style="gap:0.35rem;">

        {{-- Buton Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">
                    <i class="bi bi-chevron-left"></i>
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Numere pagini --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Buton Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">
                    <i class="bi bi-chevron-right"></i>
                </span>
            </li>
        @endif

    </ul>
    <div class="text-center mt-2" style="font-size:0.78rem;color:#94a3b8;">
        Pagina {{ $paginator->currentPage() }} din {{ $paginator->lastPage() }}
        &nbsp;·&nbsp; {{ $paginator->total() }} rezultate
    </div>
</nav>
@endif
