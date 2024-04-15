@include('partials.header')

{{-- custom files --}}
<script src="jquery.js"></script>
<link rel="stylesheet" href="css/author.css">
</head>
<body>
    @include('partials.navbar')
    <div class="main">
        <ul class="cards">
            @foreach ($authors as $author)
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="{{ $author->Image_url }}"
                            alt="mixed vegetable salad in a mason jar. "></div>
                    <div class="card_content">
                        <h2 class="card_title">{{ $author->aname }}</h2>
                        <div class="card_text">
                            <p>{{ $author->description }}</p>
                        </div>
                    </div>
                </div>
            </li>
@endforeach
        </ul>
    </div>
</body>

</html>
