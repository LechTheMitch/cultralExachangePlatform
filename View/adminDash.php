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
                    <a href="../Model/logout.php" class="logout">Logout</a>
                </nav>
            </div>
        </header>
        <section class="hero">
            <div class="maxWidth hero-content">
                <?php
                session_start();
                //Preloading Required Files
                use Controller\AdminController as AdminController;
                use UserTypes\Admin;
                include "../Controller/AdminController.php";
                include "../Model/Admin.php";
                Admin::handleDeletionRequest();
                //AdminController::handleRequest();


                if (!isset($_SESSION['userName']) || $_SESSION['role'] != 'admin') {
                    echo '<script>window.alert("You are not authorized to view this page.");</script>';
                    sleep(3);
                    header("Location: login.php");
                    exit();
                }
                echo '<h1 class="black100">Welcome Back, <br> <span class="primary10">' . $_SESSION['userName'] . '</span> </h1>';
                ?>
                <aside>
                    <h3 class="primary11">Quick View</h3>
                    <ul>
                        <?php
                        echo '<li>Revenue<span class="primary11">' . Admin::getRevenue() . '$</span></li>';
                        echo '<li>Hosts<span class="primary11">' . Admin::getTotalUsersByRole('host') . '</span></li>';
                        echo '<li>Subscribers<span class="primary11">' . Admin::getSubscriberCount() . '</span></li>';
                        echo '<li>Travelers<span class="primary11">' . Admin::getTotalUsersByRole('traveler') . '</span></li>';
                        ?>
                    </ul>
                </aside>
            </div>
        </section>
        <main class="maxWidth">
            <div class="usersList">
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
            </div>
        </main>





    </body>

</html>