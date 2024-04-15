@include('partials.header')
<script src="jquery.js"></script>
<script src="js/validate.js"></script>
<link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div id="login_alert"></div>
    <form action="{{ route('login') }}" method="POST" id="loginForm">
        @csrf
        <h3>Login Here</h3>
        <br>
        <div class="col">
            <span>Don't Have Account?<a href="{{ route('register') }}"> Signup</a></span>
        </div>
       
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="email" class="form-control" name="email" placeholder="Email" id="email" />
            <div class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" id="password" />
            <div class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <a href="/forgot">Forgot Password?</a>
        </div>
        <div class="d-grid gap-2">
            <button value="Login" type="submit" class="btn btn-primary" id="login_submit">Login</button>
        </div>
    </form>

    <script>
        $(function() {
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                $("#login_submit").val("processing");
                $.ajax({
                    url: '{{ route('auth.login') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            $("#login_submit").val("Login");
                        } else if (res.status == 401) {
                            $("#login_alert").html(showMessage('danger', res.message))
                            $("#login_submit").val("Login");
                        } else if (res.status == 200 && res.message == 'success' && res.role ==
                            'admin') {
                            window.location.href = '{{ route('admin') }}';
                        } else if (res.status == 200 && res.message == 'success' && res.role ==
                            'seller') {
                            window.location.href = '{{ route('seller') }}';
                        } else {
                            if (res.status == 200 && res.message == 'success') {
                                window.location.href = '{{ route('entry') }}';
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
