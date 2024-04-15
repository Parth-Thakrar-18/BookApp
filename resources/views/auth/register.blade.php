@include('partials.header')
<script src="jquery.js"></script>
<script src="js/validate.js"></script>

<link rel="stylesheet" href="css/register.css">
</head>

<body>
    {{-- <div class="card-body"> --}}
    <div id="show_success_alert" class="mt-3"></div>
    <span id="tt">SignUp</span>
    <section class="area-sign-in">
        <div class="sign-in" style="height: 500px;">
            <form action="#" method="post" id="signupForm">
                @csrf
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name"
                        id="name">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="col">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="col">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="col">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword"
                        id="cpassword">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col">
                    <input type="radio" name="gender" value="male" id="male">
                    Male
                    <input type="radio" name="gender" value="female" id="female">
                    Female
                    <input type="radio" name="gender" value="other" id="other">
                    Other
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="bdate" id="bdate">
                    <div class="invalid-feedback"></div>
                </div>
                <br>
                <div class="col">
                    <textarea id="hobbie" class="form-control" name="hobbie" rows="4" cols="50" maxlength="200"
                        placeholder="Tell About Your Hobbies:" style="background-color:#252a34; border-radius: 9px;"></textarea>
                    <div class="invalid-feedback"></div>
                </div>

                <button value="signup" type="submit" class="btn btn-primary" id="signup_submit">Sign
                    Up</button>
                <p>Already Have an Account?<a href="{{ route('login') }}">Login</a></p>
                <hr class="new4">
            </form>
        </div>
        </div>
        </div>
        </div>
        </div>


        {{-- <div id="criteria">
At least 1 uppercase character.<br>
At least 1 lowercase character.<br>
At least 1 digit.<br>
At least 1 special character.<br>
Minimum 8 characters.
</div> --}}

        <script>
            $(function() {
                $("#signupForm").submit(function(e) {
                    e.preventDefault();
                    $("#signup_submit").val("Please Wait...");
                    $.ajax({
                        url: '{{ route('auth.register') }}',
                        method: 'post',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(res) {
                            if (res.status == 400) {
                                showError('name', res.messages.name);
                                showError('email', res.messages.email);
                                showError('password', res.messages.password);
                                showError('cpassword', res.messages.cpassword);
                                showError('gender', res.messages.gender);
                                showError('bdate', res.messages.bdate);
                                showError('hobbie', res.messages.hobbie);
                                $("#signup_submit").val("Submited");
                            } else if (res.status == 200) {
                                $("#show_success_alert").html(showMessage('success', res.messages));
                                $("#signupForm")[0].reset();
                                removeValidationClasses("#signupForm");
                                $("#signup_submit").val("Submited");
                            }
                        }
                    });
                });
            });
        </script>
        {{-- jquery for password toast --}}
        {{-- <script>
  // for toast msg for password criteria
  $(document).ready(function(){
    $("#signup-password").mouseenter(function(){
      $("#criteria").fadeIn();
    });
    $("#signup-password").mouseleave(function(){
      $("#criteria").hide();
  });
  });
  </script>  --}}
</body>

</html>
