@include('partials.header')
    <link rel="stylesheet" href="css/dash.css">
    <style>
        /* Add CSS for book images */
        .card-product-grid .img-wrap {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-product-grid .img-wrap img {
            max-width: 100%;
            /* Ensure image doesn't exceed container width */
            max-height: 100%;
            /* Ensure image doesn't exceed container height */
        }

        /* Add margin between columns */
        .col-md-2 {
            margin-bottom: 15px;
            /* Adjust spacing as needed */
        }

        .row {
            margin-right: -10px;
        }

        /* Ensure cards fill the window size */
        .card {
            height: 100%;
        }

        .info-wrap {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-10">
                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">32 Items found </span>
                        <select class="mr-2 form-control">
                            <option>Filters</option>
                            <option>Low to High</option>
                            <option>Most Popular</option>
                            <option>Cheapest</option>
                        </select>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title=""
                                data-original-title="List view">
                                <i class="fa fa-bars"></i>
                            </a>
                            <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip"
                                title="" data-original-title="Grid view">
                                <i class="fa fa-th"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <div class="row">
                    <!-- Loop through each product -->
                    @if(isset($products))
                    @foreach ($products as $product)
                        <div class="col-md-2">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="{{ $product->coverImg }}" class="img-fluid" id="cover">
                                    <a class="btn-overlay" href="{{ route('show', ['id' => $product->id]) }}">
                                        <i class="fa fa-search-plus"></i> Quick view
                                    </a>
                                </div>
                                <div class="divider"></div>
                                <figcaption class="info-wrap">
                                    <div class="fix-height">
                                        <a href="{{ route('show', ['id' => $product->id]) }}" class="title"
                                            id="taga">
                                            {{ $product->title }}
                                        </a>
                                        <div class="price-wrap mt-2">
                                            <span class="price">$.{{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('cart') }}" class="btn btn-block btn-primary">Add to cart</a>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                    @endif
                    
                </div>
                {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <!-- Check if there are previous pages -->
                            @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
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
                        </ul>
                    </nav> --}}
                    @if(isset($products))
                {{ $product->links() }}
                @endif

        </div>
    </div>
</body>
</html>
@include('partials.footer')
