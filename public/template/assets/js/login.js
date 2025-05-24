document.addEventListener("DOMContentLoaded", function () {
  // Toggle password visibility
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password");

  togglePassword.addEventListener("click", function () {
    const icon = this.querySelector("i");
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    icon.classList.toggle("fa-eye");
    icon.classList.toggle("fa-eye-slash");
  });

  // Simple form validation example
  const form = document.querySelector("form");
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (!email || !password) {
      alert("Please fill in all fields");
      return;
    }

    // In a real app, you would submit the form to your backend
    console.log("Login attempted with:", email, password);
    // Simulate login (remove in production)
    alert("Login successful! Redirecting...");
    // window.location.href = 'dashboard.html';
  });

  // Animation for buttons on hover
  const buttons = document.querySelectorAll('button, a[href="#"]');
  buttons.forEach((button) => {
    button.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-1px)";
    });
    button.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)";
    });
  });
});
