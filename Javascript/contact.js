document.getElementById("contact-form").addEventListener("submit", validateForm);

function validateForm(event) {
    removeError("name");
    removeError("email");
    removeError("phone");
    removeError("inquiry");
  event.preventDefault();

  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var inquiry = document.getElementById("inquiry").value;
  var valid = true;

  if (name === "") {
    displayError("name", "Name is required");
    valid = false;
  } else {
    removeError("name");
  }

  if (email === "") {
    displayError("email", "Email is required");
    valid = false;
  } else if (!email.match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/)) {
    displayError("email", "Email address is not valid");
    valid = false;
  } else {
    removeError("email");
  }

  if (phone === "") {
    displayError("phone", "Phone Number is required");
    valid = false;
  } else if (!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)) {
    displayError("phone", "Phone Number is not valid");
    valid = false;
  } else {
    removeError("phone");
  }

  if (inquiry === "" || inquiry.trim() === "") {
    displayError("inquiry", "Inquiry is required");
    return false;
  }else{
    removeError("inquiry");
  }

  if (valid) {
    document.getElementById("contact-form").submit();
  }
}

function displayError(fieldId, message) {
  var inputField = document.getElementById(fieldId);
  var errorDiv = document.createElement("div");
  errorDiv.classList.add("invalid-feedback");
  errorDiv.innerHTML = message;
  inputField.parentNode.appendChild(errorDiv);
  inputField.classList.add("is-invalid");
}

function removeError(fieldId) {
  var inputField = document.getElementById(fieldId);
  var errorDiv = inputField.parentNode.querySelector(".invalid-feedback");
  if (errorDiv) {
    errorDiv.remove();
  }
  inputField.classList.remove("is-invalid");
}
