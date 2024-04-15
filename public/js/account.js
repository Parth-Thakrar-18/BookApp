//for account validation
document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('login-form');
  const signupForm = document.getElementById('signup-form');

  loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
    // Validate login form
    const email = loginForm.querySelector('#login-email').value;
    const password = loginForm.querySelector('#login-password').value;

    if (!validateEmail(email)) {
      alert('Invalid email format');
      return;
    }

    if (password.length < 6) {
      alert('Password must be at least 8 characters');
      return;
    }

    // If all validations pass, you can submit the form or perform other actions
    alert('Login successful!');
    loginForm.submit(); // Uncomment this line to submit the form
  });

  signupForm.addEventListener('submit', function (event) {
    event.preventDefault();
    // Validate signup form
    const name = signupForm.querySelector('#signup-name').value;
    const email = signupForm.querySelector('#signup-email').value;
    const password = signupForm.querySelector('#signup-password').value;

    if (name.trim() === '') {
      alert('Name cannot be empty');
      return;
    }

    if (!validateEmail(email)) {
      alert('Invalid email format');
      return;
    }

    if (password.length < 6) {
      alert('Password must be at least 8 characters');
      return;
    }

    // If all validations pass, you can submit the form or perform other actions
    alert('Signup successful!');
    signupForm.submit(); // Uncomment this line to submit the form
  });

  function validateEmail(email) {
    // Basic email format validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
});


//now authentication ...