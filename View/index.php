<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureStay - Travel Meaningfully, Exchange Culturally</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css">
    
</head>
<body>
    <?php 
    
        include 'header.php';
    ?>

 
    <section class="hero-section d-flex align-items-center text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Travel Meaningfully, Exchange Culturally</h1>
                    <p class="lead mb-5">Connect with hosts worldwide for authentic cultural experiences. Exchange your skills for accommodation and immerse yourself in local traditions.</p>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="listing.php"><button class="btn btn-primary btn-lg rounded-button findHostButton">Find Hosts</button></a>
                        <a href="register.php"><button class="btn btn-outline-light btn-lg rounded-button becomeHostButton">Become a Host</button></a>
                    </div>
                    <div class="d-flex flex-wrap gap-5">
                        <div>
                            <p class="display-6 fw-bold mb-0">12,500+</p>
                            <p class="text-white-80">Active Hosts</p>
                        </div>
                        <div>
                            <p class="display-6 fw-bold mb-0">150+</p>
                            <p class="text-white-80">Countries</p>
                        </div>
                        <div>
                            <p class="display-6 fw-bold mb-0">85,000+</p>
                            <p class="text-white-80">Exchanges Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


<section class="py-5 bg-white">
    <form action="../Model/homeSearch.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center fw-bold mb-5">Find Your Perfect Cultural Exchange</h2>
                    <div class="bg-white shadow-lg rounded-3 p-4">
                        <div class="row g-3">
                           
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-geo-alt"></i></span>
                                    <select class="form-select border-0 bg-light" name="location" required>
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Spain">Spain</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Morocco">Morocco</option>
                                       
                                    </select>
                                </div>
                            </div>
                            
                           
                            <div class="col-md-3">
                                <div class="dropdown">
                                    <input type="hidden" name="work_type" id="selectedWorkType" value="">
                                    <button class="btn btn-light w-100 text-start d-flex justify-content-between align-items-center" type="button" id="workTypeDropdown" data-bs-toggle="dropdown">
                                        <span class="text-muted">Work Type</span>
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu w-100">
                                        <li><a class="dropdown-item" href="#" onclick="selectWorkType('Farming')">Farming</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="selectWorkType('Teaching')">Teaching</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="selectWorkType('Construction')">Construction</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="selectWorkType('Animal Care')">Animal Care</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                       
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-calendar"></i></span>
                                    <input type="date" class="form-control border-0 bg-light" name="date" required>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <button class="btn btn-success w-100 h-100 rounded-2" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>



    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="fw-bold">Featured Opportunities</h2>
                <div class="d-flex gap-2">
                    <button class="btn btn-light rounded-circle border" style="width: 40px; height: 40px;">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-light rounded-circle border" style="width: 40px; height: 40px;">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="row g-4">
                <?php
                    include '../Model/connect.php';

                    $query = "SELECT * FROM host ORDER BY country ASC LIMIT 3";
                    $result = $conn->query($query);
                  

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $detailsQuery = "SELECT * FROM user WHERE id = {$row['id']}";
                            $detailsResult = $conn->query($detailsQuery);
                            $details = $detailsResult->fetch_assoc();

                           
                            if (isset($_SESSION["currentID"]) && $_SESSION["currentID"] == $row["id"]) {
                                continue;
                            }

                          

                            echo '<div class="col-md-6 col-lg-4">';
                            echo '<div class="card h-100 shadow-sm border-0 overflow-hidden">';
                            echo '<div class="position-relative" style="height: 200px;">';
                            echo '<img src="' . $details["img"] . '" class="card-img-top h-100 w-100 object-fit-cover" alt="Host Image">';
                            echo '<span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>';
                            echo '</div>';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title fw-semibold">' . htmlspecialchars($details["name"]) . '</h5>';
                            echo '<p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($row['country']) . '</p>';
                            echo '<p class="card-text text-muted small">' . htmlspecialchars($row['description']) . '</p>';

                           
                            echo '<form action= "hostProfile.php" method="POST">';
                            echo '<input type="hidden" name="user_id" value="' . $row["id"] . '">';
                            echo '<button type="submit" class="btn btn-link text-primary fw-medium small p-0 m-0">View Details</button>';
                            echo '</form>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No hosts found.</p>';
                    }
                ?>

    </section>

    
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">How CultureStay Works</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="feature-icon bg-blue-100 rounded-circle">
                        <i class="bi bi-person-plus fs-3 text-primary"></i>
                    </div>
                    <h3 class="h4 fw-semibold mb-3">Create Your Profile</h3>
                    <p class="text-muted">Sign up and create your detailed profile showcasing your skills, interests, and availability. Add photos and references to stand out.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-icon bg-green-100 rounded-circle">
                        <i class="bi bi-chat-left-text fs-3 text-success"></i>
                    </div>
                    <h3 class="h4 fw-semibold mb-3">Connect with Hosts</h3>
                    <p class="text-muted">Browse through thousands of host opportunities worldwide. Message hosts directly to discuss potential stays and arrangements.</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-icon bg-yellow-100 rounded-circle">
                        <i class="bi bi-airplane fs-3 text-warning"></i>
                    </div>
                    <h3 class="h4 fw-semibold mb-3">Plan Your Stay</h3>
                    <p class="text-muted">Confirm details with your host, plan your journey, and embark on your cultural exchange adventure. Help with agreed tasks in exchange for accommodation.</p>
                </div>
            </div>
          
        </div>
    </section>

    
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">Membership Benefits</h2>
            <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">Join our global community and unlock all the features to make your cultural exchange experience unforgettable.</p>
            
            <div class="row justify-content-center g-4">
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm position-relative">
                        <div class="popular-badge">Most Popular</div>
                        <div class="card-body p-4">
                            <h3 class="h5 fw-semibold mb-2">Premium Membership</h3>
                            <p class="text-muted mb-4">Full access to all features</p>
                            <div class="display-4 fw-bold mb-4">$49<span class="fs-6 fw-normal text-muted">/year</span></div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-muted">Browse host listings</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-muted">Create enhanced profile with gallery</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-muted">Unlimited host contacts</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-muted">Real-time messaging system</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span class="text-muted">Verified profile badge</span>
                                    </div>
                                </li>
                            </ul>
                            <a href="payment.php"><button class="btn btn-primary w-100 rounded-button findHostButton">Join Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <p class="text-muted mb-3">We accept all major payment methods</p>
                <div class="d-flex justify-content-center gap-4">
                    <i class="bi bi-credit-card fs-3 text-muted"></i>
                    <i class="bi bi-paypal fs-3 text-muted"></i>
                    <i class="bi bi-apple fs-3 text-muted"></i>
                    <i class="bi bi-google-pay fs-3 text-muted"></i>
                </div>
            </div>
        </div>
    </section>



    <?php
    include 'footer.php'; 
    ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
    
    
<script>
function selectWorkType(type) {
    document.getElementById('selectedWorkType').value = type;
    document.getElementById('workTypeDropdown').querySelector('span').textContent = type;
    document.getElementById('workTypeDropdown').querySelector('span').classList.remove('text-muted');
}
</script>
<script>

function selectWorkType(type) {
    document.getElementById('selectedWorkType').value = type;
    document.getElementById('workTypeDropdown').querySelector('span').textContent = type;
    document.getElementById('workTypeDropdown').querySelector('span').classList.remove('text-muted');
}
</script>

</body>
</html>

