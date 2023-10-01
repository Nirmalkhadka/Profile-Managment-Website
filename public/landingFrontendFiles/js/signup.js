// Form validation
function validateForm() {
    var name = document.forms['form']['name'];
    var email = document.forms['form']['email'];
    var password = document.forms['form']['password'];
    var phone = document.forms['form']['phone'];
  
    var nameError = document.getElementById('name-error');
    var emailError = document.getElementById('email-error');
    var passwordError = document.getElementById('password-error');
    var phoneError = document.getElementById('phone-error');
  
    // Name validation: should not be empty
    if (name.value.trim() === '') {
      name.style.border = '1px solid red';
      nameError.textContent = 'Please enter your name';
      return false;
    }
  
    // Email validation: should be a valid email format
    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email.value.trim())) {
      email.style.border = '1px solid red';
      emailError.textContent = 'Please enter a valid email';
      return false;
    }
  
    // Password validation: should have at least 6 characters
    if (password.value.length < 6) {
      password.style.border = '1px solid red';
      passwordError.textContent = 'Password should have at least 6 characters';
      return false;
    }
  
    // Phone number validation: should be a valid phone number format
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone.value.trim())) {
      phone.style.border = '1px solid red';
      phoneError.textContent = 'Please enter a valid phone number (10 digits)';
      return false;
    }
  
    // If all validations pass, the form can be submitted
    return true;
  }
  