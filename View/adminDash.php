<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">-->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <div class="header">
                <nav>
                    <ul>
                        <li><a href="adminDash.php">Home</a></li>
                        <li><a href="userManagement.php">User Management</a></li>
                        <li><a href="listingManagement.php">Listing Management</a></li>
                        <li><a href="revenueReport.php">Revenue Report</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section class="hero">
            <?php
            session_start();
            //Preloading Required Files
            use Controller\AdminController as AdminController;
            use UserTypes\Admin;
            include "../Controller/AdminController.php";
            include "../Model/Admin.php";
            Admin::handleDeletionRequest();
            AdminController::handleRequest();


            $_SESSION['role'] = "admin"; // Temporary for testing
            if (!isset($_SESSION['userName']) || $_SESSION['role'] != 'admin') {
                echo '<script>window.alert("You are not authorized to view this page.");</script>';
                sleep(3);
                header("Location: login.php");
                exit();
            }
            echo '<h1>Welcome Back, ' . $_SESSION['userName'] . '</h1>';
            ?>
        </section>
        <main>
            <div class="hero-text">
                <h2>Admin Dashboard</h2>
                <p>Here you can manage users, listings, and view reports.</p>
            </div>
            <div class="travelersList">
                <h2>Travelers</h2>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Subscription Status</th>
                    </tr>
                    <?php
                    Admin::displayUsers('traveler');
                    ?>
                </table>
            </div>
            <div class="hostsList">
                <h2>Hosts</h2>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>State ID</th>
                    </tr>
                    <?php
                    Admin::displayUsers('host');
                    ?>
                </table>
            </div>
            <div class="filters">
                <h2>Filters</h2>
                <form method="post">
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="">All</option>
                        <option value="host">Host</option>
                        <option value="traveler">Traveler</option>
                    </select>
                    <input type="submit" name="filter" value="Filter">
                </form>
            </div>
            <aside>
                <h2>Quick View</h2>
                <ul>
                    <?php
                    echo '<li>Total Revenue is ' . Admin::getRevenue() . '$</li>';
                    echo '<li>There are ' . Admin::getTotalUsersByRole('host') . ' active Hosts</li>';
                    echo '<li>There is currently ' . Admin::getSubscriberCount() . ' active subscribers</li>';
                    echo '<li>There are ' . Admin::getTotalUsersByRole('traveler') . ' total Travelers</li>';
                    ?>
                </ul>
            </aside>
        </main>





    </body>

</html>