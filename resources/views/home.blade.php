@include('partials.header')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">

</head>

<body class="antialiased">
    @include('partials.navbar')
    <div id="panel">Welcome to BookHub, Go Beyond Imagination &#128640;</div>
    @include('partials.category')
    <div class="vl"></div>
    @include('partials.offer')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-10">
                <header class="border-bottom mb-4 pb-3">
                        <select class="mr-2 form-control">
                            <option>Apply Filters 🔽</option>
                            <option>Price High to Low</option>
                            <option>Trending</option>
                            <option>Most Popular</option>
                            <option>Cheapest</option>
                        </select>
                    </div>
                </header>
                <div class="row">
                    <!-- Loop through each product -->
                    @if (isset($products))
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
                                                <span class="price">Rs.{{ $product->price }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('cart') }}" class="btn btn-block btn-primary">Add to cart</a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    @endif

                </div>
                @include('partials.pagging')                
        </div>
        @include('partials.footer')
    </div>
</body>

</html>
