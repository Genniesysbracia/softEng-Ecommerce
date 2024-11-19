function togglePassword() {
    var passwordField = document.getElementById("password");
    var passwordIcon = document.getElementById("password-icon");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356362/eye_ie4zen.png";
        passwordIcon.classList.add('rotated');
    } else {
        passwordField.type = "password";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356363/hidden_kg0z7u.png";
        passwordIcon.classList.remove('rotated');
    }
}

// Initially set the navigation according to login state (false means user is logged out)
let isLoggedIn = false; // Set to true if user is logged in

// Simulate login function
function login() {
    // Simulate login action (this can be replaced with actual login logic)
    isLoggedIn = true;

    // Update the navigation based on login status
    updateNav();
}

// Function to update navigation links
function updateNav() {
    const loginSignupLink = document.getElementById("login-signup-link");

    if (isLoggedIn) {
        // Change 'Log In / Sign Up' to 'Account'
        loginSignupLink.textContent = "Account";
        loginSignupLink.href = "account.php"; // Link to the account page or user profile page
    } else {
        // Change back to 'Log In / Sign Up'
        loginSignupLink.textContent = "Log In / Sign Up";
        loginSignupLink.href = "login.php"; // Or link to the actual login/signup page
    }
}

// Initially update the navigation on page load
updateNav();