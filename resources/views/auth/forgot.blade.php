@include('partials.header')
<link rel="stylesheet" href="css/forgot.css">
<script src="js/validate.js"></script>
</head>

<body>
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Reset password</h3>

            <div class="card-text">
                <div id="forgot_alert"></div>
                <form action="#" method="POST" id="forgot_pass">
                    @csrf
                    <div class="form-group">
                        <label for="forgot-password">Enter your email address and we will send you a link to reset your
                            password.</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm mt-2"
                            placeholder="Enter your email address">
                    </div>

                    <input type="submit" id="forgot_btn" class="btn btn-primary btn-block" value="Submit Email">
                    <br><br>
                    <div class="text login-text">Back to Login Page <a href="{{ route('login') }}">Login</a></div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        $(function() {
            $("#forgot_pass").submit(function(e) {
                e.preventDefault();
                $("#forgot_btn").val('Please Wait..');
                $.ajax({
                    url: '{{ route('auth.forgot') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('email', res.messages.email);
                            $("#forgot_btn").val('Submit Email');
                        } else if (res.status == 200) {
                            $("#forgot_alert").html(showMessage('success', res.messages));
                                $("#forgot_pass")[0].reset();
                                removeValidationClasses("#forgot_pass");
                                $("#forgot_btn").val("Submit Email");
                        } else {
                            $("#forgot_alert").html(showMessage('danger', res.messages));
                        }
                    }
                });
            });
        });
    </script>
</body>
