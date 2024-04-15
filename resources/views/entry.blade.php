@include('partials.header')
</head>

<body>
    @include('partials.navbar')
    <h1>Welcome to the bookHub</h1>

    <div>
        logStatus: {{ Session::get('logstatus') }}
        <br>
        LoggedInUser: {{ Session::get('loggedInUser') }}
        <br>
        Role: {{ Session::get('role') }}
        <br>
        Id: {{ Session::get('userId') }}
    </div>
</body>

</html>
