
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Shop</title>
</head>
<body>
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="logo.png" />
                    </span>
                    <h1 class="logo-title">
                        <br>
                        <span>FoodBank.MY</span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                <a href="dashboard.php">
                        Dashboard
                    </a>
                    <a href="shop.php" class="active">
                        Shop
                    </a>
                    <a href="explore.php">
                        Volunteer
                    </a>
                    <a href="donation.php">
                        Donation
                    </a>
                    <a href="notification.php">
                        Notification
                    </a>
                    
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Hi Aisyah</span>
                    <span>
                        </span>
                </button>
                
    
        </header>
        
                
            
            <div class="app-body-main-content">
                <section class="service-section">
                    <br>
                    <h2>Shop</h2>
                    <div class="service-section-header">
                        <div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div>
                        
                    </div>
                    
                    
            
            
                <div class="tiles">
                <article class="tile">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <div class="app-body-main-content">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Econsave";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(foodQuantity) as totalQuantity FROM donordetails";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="econsave.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                        <article class="tile">
                            <div class="tile-header">
                                <i class="ph-fire-simple-light"></i>
                                <div class="app-body-main-content">
                                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Ayamas";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(ayamasQuantity) as totalQuantity FROM ayamas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile" style="background-color: #45ffbc;">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="ayamas.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                    
                        <article class="tile">
                            <div class="tile-header">
                                <i class="ph-file-light"></i>
                                <div class="app-body-main-content">
                                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Kuali Emas";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(keQuantity) as totalQuantity FROM ke";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile" style="background-color: #C0C0C0;">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="kualiemas.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                    
                        </article>
                    </div>
                    <div class="tiles">
                        <article class="tile">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <div class="app-body-main-content">
                                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Marry Brown";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(mbQuantity) as totalQuantity FROM mb";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="mb.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                    
                        <article class="tile">
                            <div class="tile-header">
                                <i class="ph-fire-simple-light"></i>
                                <div class="app-body-main-content">
                                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Universal Sambal";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(ayamgepukQuantity) as totalQuantity FROM ayamgepuk";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile" style="background-color: #45ffbc;">
                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="ayamgepuk.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                    
                        <article class="tile">
                            <div class="tile-header">
                                <i class="ph-file-light"></i>
                                <div class="app-body-main-content">
                                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $shop = "Family Mart";

                    // SQL query to get the total quantity for Econsave
                    $sql = "SELECT SUM(familyQuantity) as totalQuantity FROM familymart";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalQuantity = $row["totalQuantity"];
                    } else {
                        $totalQuantity = 0;
                    }

                    echo '<article class="tile" style="background-color: #C0C0C0;">

                            <div class="tile-header">
                                <i class="ph-lightning-light"></i>
                                <h3>
                                    <span>' . $shop . '</span>
                                    <span>Food Availibility: ' . $totalQuantity . '</span>
                                </h3>
                            </div>
                            <a href="familymart.php">
                                <span>Get Now</span>
                                <span class="icon-button">
                                    <i class="ph-caret-right-bold"></i>
                                </span>
                            </a>
                        </article>';

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
                        </article>
                    
                    </div>
                    <div class="tiles">
                        
                    
                    </div>
                    <br>
                    <br>
                    <div>
                        </div>
                        </section>
                        </div>
                <footer class="footer">
                    <h1>FoodBank.MY<small>©</small></h1>
                    <div>
                        FoodBank.MY ©<br />
                        All Rights Reserved 2023
                    </div>
                </footer>
            </div>
                
                                </div>
                            </div>
                        </div>
                        </section>
                        </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>


