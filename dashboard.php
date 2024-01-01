<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Home</title>
    <link rel="stylesheet" href="dashboard.css" />
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="logo.png" alt=""></i>FoodBank.My
      </div>

      <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
      </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
          <!-- start -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </div>

            <ul class="menu_items submenu">
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
            </ul>
          </li>
          <!-- end -->

          <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
          <!-- start -->
          

            <ul class="menu_items submenu">
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
            </ul>
          </li>
          <!-- end -->
        </ul>

        

        <ul class="menu_items">
          <div class="menu_title menu_editor"></div>
          <!-- duplicate these li tag if you want to add or remove navlink only -->
          <!-- Start -->
          <li class="item">
            <a href="form.php" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-donate-heart'></i>
              </span>
              <span class="navlink">Donation</span>
              
            </a>
          </li>
          <!-- End -->

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-run'></i>
              </span>
              <span class="navlink">Volunteer</span>
            </a>
          </li>

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-conversation' ></i>
              </span>
              <span class="navlink">Message</span>
            </a>
</li>

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-history' ></i>
              </span>
              <span class="navlink">History</span>
            </a>
</li>
          
        </ul>
        <ul class="menu_items">
          <div class="menu_title menu_setting"></div>
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-user-circle'></i>
              </span>
              <span class="navlink">Profile</span>
            </a>
          </li>
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-medal"></i>
              </span>
              <span class="navlink">Reward</span>
            </a>
          </li>

          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bxs-help-circle' ></i>
              </span>
              <span class="navlink">Help</span>
            </a>
          </li>

        <!-- Sidebar Open / Close -->
        
          <div class="bottom collapse_sidebar">
          <a href="login.php" class="nav_link">
              <span class="navlink_icon">
            <span> Log Out</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    
    <div class="grid-container">
      <!-- Grid 1 -->
      <div class="grid-item">
        <h3>Grid 1</h3>
        <p>Your content here</p>
      </div>

      <!-- Grid 2 -->
      <div class="grid-item">
        <h3>Grid 2</h3>
        <p>Your content here</p>
      </div>

      <!-- Grid 3 -->
      <div class="grid-item">
        <h3>Grid 3</h3>
        <p>Your content here</p>
      </div>

      <!-- Grid 4 -->
      <div class="grid-item">
        <h3>Grid 4</h3>
        <p>Your content here</p>
      </div>

      <!-- Grid 5 -->
      <div class="grid-item">
        <h3>Grid 5</h3>
        <p>Your content here</p>
      </div>

      <!-- Grid 6 -->
      <div class="grid-item">
        <h3>Grid 6</h3>
        <p>Your content here</p>
      </div>
    </div>
    
  </body>
</html>