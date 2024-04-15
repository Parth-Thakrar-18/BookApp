@include('partials.header')
<script src="js/validate.js"></script>
<style>
  #hobbie{
   
  }
</style>
</head>

<body>
    @include('partials.navbar')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="cart shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="text-secondary fw-bold">User Profile</h2>
                    </div>
                    <div class="card-body p-5">
                        <div id="profile_alert"></div>
                        <div class="row">
                            <div class="col-lg-4 px-5 text-center" style="border-right: 1px solid grey;">
                                @if($userInfo->picture)
                                <img src="storage/images/{{ $userInfo->picture }}" id="image_preview"
                                    class="avatar" width="200px" style="border-radius: 51%;" alt="Plz Upload">
                                    @else
                                <img src="img/profile.jpg" id="image_preview"
                                class="avatar" width="200px" style="border-radius: 51%;" alt="Plz Upload">
                                    @endif
                                <div>
                                    <label for="upicture">Change Profile</label>
                                    <input type="file" name="picture" id="upicture" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" value="{{ $userInfo->id }}" id="id" name="id">
                            <div class="col-lg-8 px-5">
                                <form action="#" method="POST" id="profile_form">
                                    @csrf

                                    <div class="my-2">
                                        <label for="fname">Full Name</label>
                                        <input type="text" name="name" id="fname"
                                            class="form-control rounded-0" value="{{ $userInfo->name }}">

                                    </div>
                                    <div class="my-2">
                                        <label for="uemail">E-mail</label>
                                        <input type="email" name="email" id="uemail"
                                            class="form-control rounded-0" value="{{ $userInfo->email }}" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="gender">Gender</label>
                                            <input type="radio" name="gender" value="male"
                                                {{ $userInfo->gender == 'male' ? 'checked' : '' }} id="male">
                                            Male
                                            <input type="radio" name="gender" value="female"
                                                {{ $userInfo->gender == 'female' ? 'checked' : '' }} id="female">
                                            Female
                                            <input type="radio" name="gender" value="other"
                                                {{ $userInfo->gender == 'other' ? 'checked' : '' }} id="other">
                                            Other
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" name="bdate" id="dob"
                                            class="form-control rounded-0" value="{{ $userInfo->bdate }}">
                                    </div>
                                    <div class="my-2">
                                      <label for="hobbie">Hobbie</label>
                                      <textarea name="hobbie" id="hobbie" cols="30" rows="10" class="form-control rounded-0" 
                                      value="{{ $userInfo->hobbie }}">{{ $userInfo->hobbie }}</textarea>
      
                                  </div>
                                    
                                    <div class="my-2">
                                        {{-- <div class="d-flex justify-content-center"> --}}
                                        <input type="submit" value="Update profile"
                                            class="btn btn-primary rounded-0 float-start" id="profile_btn">
                                        {{-- </div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(function() {
        $("#upicture").change(function(e) {
            const file = e.target.files[0];
            let url = window.URL.createObjectURL(file);
            $("#image_preview").attr('src', url);
            let fd = new FormData();
            fd.append('picture', file);
            fd.append('id', $("#id").val());
            fd.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('profile.image') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if(response.status ==200){
                        $("#profile_alert").html(showMessage('success', response.messages));
                        $("#picture").val('');
                    }
                }
            })
        });
        $("#profile_form").submit(function(e) {
            e.preventDefault();
            let id = $("#id").val();
            $("#profile_btn").val('updating...');
            $.ajax({
                url: '{{ route('profile.update') }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status ==200){
                        $("#profile_alert").html(showMessage('success', response.messages));
                        $("#profile_btn").val('update profile');
                    }
                }
            });
        });
    });
</script>

</html>
