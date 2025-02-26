
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevents form from reloading

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");
    let generalError = document.getElementById("generalError");

    // Reset error states
    emailError.style.display = "none";
    passwordError.style.display = "none";
    generalError.style.display = "none";
    document.getElementById("email").classList.remove("error");
    document.getElementById("password").classList.remove("error");

    let formData = new FormData(this);

    fetch("loggingIn.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            window.location.href = "loggedIn.php"; // Redirect on success
        } else {
            // Handle error messages
            if (data.errorField === "email") {
                emailError.innerText = data.message;
                emailError.style.display = "block";
                document.getElementById("email").classList.add("error");
            } else if (data.errorField === "password") {
                passwordError.innerText = data.message;
                passwordError.style.display = "block";
                document.getElementById("password").classList.add("error");
            } else {
                generalError.innerText = data.message;
                generalError.style.display = "block";
            }
        }
    })
    .catch(error => {
        generalError.innerText = "Something went wrong! Try again.";
        generalError.style.display = "block";
    });
});
