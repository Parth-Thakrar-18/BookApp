{{-- Import links --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
<script>
  function openPopup() {
      document.getElementById("popup-container").style.display = "flex";
  }

  function closePopup() {
      document.getElementById("popup-container").style.display = "none";
  }
</script>
</head>
<body>
<div class="popup-container" id="popup-container">
  <div class="popup">
      <form class="contact-form" action="#" method="post">
          @csrf
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
          <input type="submit" value="Submit">
      </form><br>
      <button onclick="closePopup()">Close</button>
  </div>
</div>
<li>
  <a onclick="openPopup()" class="text-body" id="ct" href="#" style="text-decoration: none">Contact Us</a>
</li>
</body>

