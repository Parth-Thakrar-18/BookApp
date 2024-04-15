@include('partials.header')
</head>

<body>
    @if (isset($products))
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Check if there are previous pages -->
                @if ($products->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>
                @endif

                <!-- Loop through available pages -->
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Check if there are next pages -->
                @if ($products->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" aria-disabled="true">Next</a>
                    </li>
                @endif
            @else
                <p>No pagination Available</p>
    @endif

    </ul>
    </nav>
</body>

</html>
