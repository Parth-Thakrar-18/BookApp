<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    {{-- <link rel="stylesheet" href="css/mdb.min.css" /> --}}
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <footer class="bg-body-tertiary text-center" id="fbg">
      <!-- Grid container -->
      <div class="container p-4">
        <h1 align="center" class="text-danger">BookHUb</h1><br>
        {{-- <h4 align="left">Quotes:</h4><br> --}}
        <h6 align="left"><i>"Book is the best Friend Ever"</i><br>-KC</h6><br>
        <h6 align="center"><i>"A Reader Can live Thousands Live from Book"</i><br>-KC</h6><br>
        <h6 align="right"><i>"Book can help us to find 'Meaning' in life"</i><br>-KC</h6><br>
        <section class="">
          <form action="">
          </form>
        </section>
        <!-- Section: Form -->
    
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-primary">Social Media</h5>
              <ul class="list-unstyled mb-0">
                <li>
                  <a target="_blank" id="smedia" data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://www.facebook.com/" role="button"><i class="fab fa-facebook-f" id="fb"></i></a>
                </li>
                <li>
                 <!-- Instagram -->
                    <a target="_blank" id="smedia" data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://www.instagram.com/" role="button"><i class="fab fa-instagram" id="insta"></i></a>
                </li>
                <li>
                  <!-- Linkedin -->
                    <a target="_blank" id="smedia" data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://www.linkedin.com/" role="button"><i class="fab fa-linkedin-in" id="link"></i></a>
                </li>
                <li>
                 <!-- Github -->
                    <a target="_blank" id="smedia" data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://github.com/" role="button"><i class="fab fa-github" id="git"></i></a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-primary">About</h5>
    
              <ul class="list-unstyled">
                <li>
                  <a class="text-body" href="{{ route('aboutus') }}" style="text-decoration: none">About Us</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-primary">Shopping</h5>
              <ul class="list-unstyled mb-0">
                <li>
                  <a class="text-body" href="{{ route('finalorder') }}" style="text-decoration: none">Orders</a>
                </li>
                <li>
                  <a class="text-body" href="{{ route('cart') }}" style="text-decoration: none">Cart</a>
                </li>
                <li>
                  <a class="text-body" href="{{ route('writer') }}" style="text-decoration: none">Authors</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0" >
              <h5 class="text-uppercase text-primary">Need Help?</h5>
              <ul class="list-unstyled mb-0">
                @include('partials.contactus')
                <li>
                  <a class="text-body" href="#!" style="text-decoration: none">FAQ</a>
                </li>
                <li>
                  <a class="text-body" href="#!" style="text-decoration: none">Link 3</a>
                </li>
                <li>
                  <a class="text-body" href="#!" style="text-decoration: none">Link 4</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="{{ route('home') }}">BookHub.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- MDB -->
    {{-- <script type="text/javascript" src="js/mdb.umd.min.js"></script> --}}
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
