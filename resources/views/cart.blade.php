@include('partials.header')

</head>

<body> 
  @include('partials.navbar')
    @if (session()->has('logstatus') == false)
   @include('partials.logmsgcart')
    @else
    <h1>Welcome to cart</h1>
    @endif
</body>

</html>
