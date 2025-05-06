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
            //Preloading Required Files
            use Controller\AdminController as AdminController;
            include "../Controller/AdminController.php";
            AdminController::handleDeleteRequest();


            $_SESSION['userName'] = "Man"; // Temporary for testing
            $_SESSION['userRole'] = "admin"; // Temporary for testing
            if (!isset($_SESSION['userName']) || $_SESSION['userRole'] != 'admin') {
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
            <div class="usersList">
                <h2>Users List</h2>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    //AdminController::showUsers(AdminController::listUsers());
                    AdminController::displayUsers();
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
                    echo '<li>Total Revenue is ' . AdminController::getRevenue() . '$</li>';
                    echo '<li>There are ' . AdminController::getTotalUsersByRole('host') . ' active Hosts</li>';
                    echo '<li>There is currently ' . AdminController::getSubscriberCount() . ' active subscribers</li>';
                    echo '<li>There are ' . AdminController::getTotalUsersByRole('traveler') . ' total Travelers</li>';
                    ?>
                </ul>
            </aside>
        </main>





    </body>

</html>