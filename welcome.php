<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
        <img src="logo.png" alt="Donor Image" style="width: 115px;">
</div>
        
        <ul class="menu-links">
          <span id="close-menu-btn" class="material-symbols-outlined">close</span>
          <li><a href="#">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
        <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
      </nav>
    </header>

    <section class="hero-section">
  <div class="content">
    <h2>Welcome to FoodBank.My</h2>
    <p>
      In reducing food waste and ensuring zero hunger among the community
    </p>
    <button id="get-started-btn">Get Started</button>
  </div>
</section>

<script>
  const header = document.querySelector("header");
  const hamburgerBtn = document.querySelector("#hamburger-btn");
  const closeMenuBtn = document.querySelector("#close-menu-btn");
  const getStartedBtn = document.querySelector("#get-started-btn");

  // Toggle mobile menu on hamburger button click
  hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

  // Close mobile menu on close button click
  closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());

  // Redirect to 'role.php' when "Get Started" button is clicked
  getStartedBtn.addEventListener("click", () => {
    // Replace 'role.php' with the actual page you want to redirect to
    window.location.href = 'login.php';
  });
</script>
    
  </body>
</html>
