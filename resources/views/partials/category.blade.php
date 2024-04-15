@include('partials.header')
    <link rel="stylesheet" href="css/category.css">
    <title>BookHub</title>
  </head>
<body>

<div class="topnav" id="myTopnav">
  <a href="{{ route('home') }}" class="active">Category</a>
  <a href="{{ route('fiction') }}">Fiction</a>
  <a href="{{ route('non_fiction') }}">non-fiction</a>
  <a href="{{ route('humor') }}">Humor</a>
  <a href="#about">Thriller</a>
  <a href="#contact">Psychology</a>
  <a href="#news">Horror</a>
  <a href="#news">Spirituality</a>
  <a href="#contact">Historical</a>
  <a href="#contact">Bundle</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
</body>
<script>
    function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</html>