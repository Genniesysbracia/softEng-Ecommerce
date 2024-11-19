// Function to toggle the password visibility
function togglePassword() {
    var passwordField = document.getElementById("password");
    var passwordIcon = document.getElementById("password-icon");

    // Toggle between showing password or hiding it
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356362/eye_ie4zen.png"; // Show Eye Icon
        passwordIcon.classList.add('rotated');
    } else {
        passwordField.type = "password";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356363/hidden_kg0z7u.png"; // Hide Eye Icon
        passwordIcon.classList.remove('rotated');
    }
}

