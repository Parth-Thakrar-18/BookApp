@include('partials.header')
<link rel="stylesheet" href="css/dash.css">
</head>

<body>
    @include('partials.navbar')
    @include('partials.category')

    <header class="border-bottom mb-4 pb-3">
        <div class="form-inline">
            {{-- <span class="mr-md-auto">32 Items found </span> --}}
            <select class="mr-2 form-control" id="filterSelect">
                <option>Apply Filters 🔽</option>
                <option value="highest">Price: High to Low</option>
                <option value="lowest">Price: Low to High</option>
                <option value="famous">Most Popular</option>
            </select>
        </div>
    </header>
    <div class="row">
        <h3 id="h3">Resulting Books:</h3>
        <!-- Loop through each product -->
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
                            <a href="{{ route('show', ['id' => $product->id]) }}" class="title" id="taga">
                                {{ $product->title }}
                            </a>
                            <div class="price-wrap mt-2">
                                <span class="price">Rs. {{ $product->price }}</span>
                            </div>
                        </div>
                        <a href="{{ route('cart') }}" class="btn btn-block btn-primary">Add to cart</a>
                    </figcaption>
                </figure>
            </div>
        @endforeach
        @include('partials.pagging')
        @include('partials.footer')
    </div>