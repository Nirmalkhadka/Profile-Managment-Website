// login validation 
var email = document.forms['form']['email'];
var pass = document.forms['form']['password'];

var emailError = document.getElementById('email-error');
var passError = document.getElementById('pass-error');
var loginDoneMessage = document.getElementById('login-done');

function validated() {
  // Trim the input values to remove leading and trailing spaces
  var trimmedEmail = email.value.trim();
  var trimmedPass = pass.value.trim();

  // Check for empty fields
  if (trimmedEmail === '') {
    email.style.border = "1px solid red";
    emailError.style.display = "block";
    email.focus();
    return false;
  }

  if (trimmedPass === '') {
    pass.style.border = "1px solid red";
    passError.style.display = "block";
    pass.focus();
    return false;
  }

  // Add email verification logic here (e.g., regular expression or API call)
  // Example: Verify if email follows a valid email format
  var emailRegex = /^\S+@\S+\.\S+$/;
  if (!emailRegex.test(trimmedEmail)) {
    email.style.border = "1px solid red";
    emailError.textContent = "Please enter a valid email";
    emailError.style.display = "block";
    email.focus();
    return false;
  }
  else{
      // Example: Simulate successful login
  loginDoneMessage.style.display = "block"; // Show the "Login done" message
  return false; // Return false to prevent form submission for this example

  }
}




