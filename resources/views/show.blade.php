@include('partials.header')
<link rel="stylesheet" href="css/quickView.css">

<script>
    $("#lightSlider").lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 6
    });
</script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    {{-- <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'> --}}
    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <div class="col-md-5 pr-2">
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            <li><img src="{{ $product->coverImg }}" /> </li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-2">
                    <h6>Book Title:</h6>
                    <div class="d-flex flex-row">
                        <span>{{ $product->title }}</span>
                    </div>
                    <div class="card mt-5">
                        <h6>Average Rating</h6>
                        <div class="d-flex flex-row">
                            <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <span class="ml-3 font-weight-bold text-danger">{{ $product->rating }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ml-3">
                <div class="card">
                    <div class="about"> <span class="font-weight-bold">{{ $product->title }}</span>
                        <h4 class="font-weight-bold text-success">Rs. {{ $product->price }}</h4>
                    </div>
                    <div class="buttons"> <button class="btn btn-outline-warning btn-long cart">Add to Cart</button>
                        <button class="btn btn-warning btn-long buy">Buy it Now</button> <button
                            class="btn btn-light wishlist">
                            <i class="fa fa-heart"></i> </button>
                    </div>
                    <hr>
                    <div class="product-description">
                        <p><strong>Description:</strong><br> {{ $product->description }}</p>
                        <p><strong>Author: </strong>{{ $product->author }}</p>
                        <p><strong>categories: </strong>{{ $product->genres }}</p>
                        <p><strong>Published: </strong>{{ $product->publishDate }}</p>
                        <p><strong>Edition: </strong>{{ $product->edition }}</p>
                        <p><strong>No. of Pages: </strong>{{ $product->pages }} pages</p>
                        <p><strong>ISBN: </strong>{{ $product->isbn }}</p>
                        <p><strong>Binding: </strong>{{ $product->bookFormat }}</p>
                        <p><strong>Language: </strong>{{ $product->language }}</p>
                        <div class="bullets">
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Best in Quality</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Anti-creak joinery</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Sturdy laminate surfaces</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Relocation friendly design</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">High gloss, high style</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Easy-access hydraulic storage</span> </div>
                        </div>
                    </div>
                    <div class="mt-2"> <span class="font-weight-bold">Store</span> </div>
                    <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/N2fYgvD.png"
                            class="rounded-circle store-image">
                        <div class="d-flex flex-column ml-1 comment-profile">
                            <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span
                                class="username">Rare
                                Boutique</span> <small class="followers">25K Followers</small>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card mt-2"> <span>Similar items:</span>
            <div class="similar-products mt-2 d-flex flex-row">
                <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img
                        src="{{ $product->coverImg }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Rs. {{ $product->price }}</h6>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</body>


</html>
