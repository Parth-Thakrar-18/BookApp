<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== TAILWIND CSS ===============-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="/storage/validate.js"></script>
    <link rel="stylesheet" href="/css/resetpass.css">
    <title> BookHub</title>
</head>

<body>
    <form action="#" method="POST" id="reset_form">
        @csrf
        <div class="background" id="background"></div>
        <div class="bg-white rounded-2xl p-10 text-center shadow-lg text-gray-500">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div id="reset_alert"></div>
            <h1 class="text-3xl">Change Your Password</h1>
            <div class="my-4 text-left">
                <label for="npassw" class="text-sm">New Password:</label>
                <input type="password" class="border block w-full p-2 mt-2 rounded-full" id="npassw"
                    placeholder="Enter new password" name="npassw">
                <div class="invalid-feedback"></div>
            </div>

            <div class="my-4 text-left">
                <label for="cpassw" class="text-sm">Confirm Password:</label>
                <input type="password" class="border block w-full p-2 mt-2 rounded-full" id="cpassw"
                    placeholder="Confirm your password" name="cpassw">
                <div class="invalid-feedback"></div>
            </div>

            <input
                class="bg-gray-500 font-semibold text-white py-2 mt-4 inline-block w-full border border-gray-500 hover:border-transparent rounded-full"
                type="submit" value="Submit" id="reset_submit_btn">
        </div>
    </form>
    <script>
        $(function() {
            $("#reset_form").submit(function(e) {
                e.preventDefault();
                $("#reset_submit_btn").val("Please Wait..");
                $.ajax({
                    url: '{{ route('auth.reset') }}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == 400) {
                            showError('npassw', res.messages.npassw);
                            showError('cpassw', res.messages.cpassw);
                            $("#reset_submit_btn").val("Submit Password");
                        } else if (res.status == 401) {
                            $("#reset_alert").html(showMessage('danger', res.messages));
                            removeValidationClasses("#reset_form");
                            $("#reset_submit_btn").val("Submit Password");
                        } else {
                            $("#reset_form")[0].reset();
                            $("#reset_alert").html(showMessage('success', res.messages));
                            $("#reset_submit_btn").val("Submit Password");
                        }
                    }
                });
            });
        });
    </script>
</body>
