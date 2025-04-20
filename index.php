<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureStay - Travel Meaningfully, Exchange Culturally</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
  
    <header class="bg-white shadow-sm sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-3">
                <div class="container-fluid">
                    <a class="navbar-brand logo-font text-primary fs-3" href="#">CultureStay</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Find Hosts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                        </ul>
                        <div class="d-flex ms-lg-4">
                            <div class="dropdown me-3">
                                <button class="btn btn-link text-decoration-none dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                                    English
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Spanish</a></li>
                                    <li><a class="dropdown-item" href="#">French</a></li>
                                    <li><a class="dropdown-item" href="#">German</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-outline-primary rounded-button me-2">Sign In</button>
                            <button class="btn btn-primary rounded-button">Register</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Travel Meaningfully, Exchange Culturally</h1>
                    <p class="lead mb-5">Connect with hosts worldwide for authentic cultural experiences. Exchange your skills for accommodation and immerse yourself in local traditions.</p>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <button class="btn btn-primary btn-lg rounded-button">Find Hosts</button>
                        <button class="btn btn-outline-light btn-lg rounded-button">Become a Host</button>
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
    

<!-- Search & Filter Section -->
<section class="py-5 bg-white">
    <form action="Model/homeSearch.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center fw-bold mb-5">Find Your Perfect Cultural Exchange</h2>
                    <div class="bg-white shadow-lg rounded-3 p-4">
                        <div class="row g-3">
                            <!-- Country Dropdown -->
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
                                        <!-- Add more countries as needed -->
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Work Type Dropdown -->
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
                            
                            <!-- Date Input -->
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



    <!-- Featured Opportunities Grid -->
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
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <div class="position-relative" style="height: 200px;">
                            <img src="https://readdy.ai/api/search-image?query=A%20beautiful%20organic%20farm%20in%20Tuscany%2C%20Italy%20with%20rolling%20hills%2C%20olive%20groves%2C%20and%20vineyards.%20The%20scene%20shows%20a%20rustic%20farmhouse%20with%20terracotta%20roof%20tiles%20surrounded%20by%20lush%20gardens.%20The%20lighting%20is%20warm%20and%20golden%2C%20creating%20a%20peaceful%2C%20inviting%20atmosphere.%20The%20image%20has%20a%20natural%2C%20authentic%20feel%20with%20no%20people%20visible.&width=600&height=400&seq=farm1&orientation=landscape" class="card-img-top h-100 w-100 object-fit-cover" alt="Organic Farm in Tuscany">
                            <span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="card-title fw-semibold">Organic Farm in Tuscany</h5>
                                    <p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> Florence, Italy</p>
                                </div>
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20a%20middle-aged%20Italian%20woman%20with%20warm%20smile%2C%20olive%20skin%2C%20and%20dark%20hair%20with%20some%20gray%20streaks.%20She%20has%20kind%20eyes%20and%20laugh%20lines%2C%20wearing%20casual%20farm%20clothes.%20The%20image%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20warmth.&width=100&height=100&seq=host1&orientation=squarish" class="rounded-circle border border-2 border-white" alt="Host" style="width: 40px; height: 40px;">
                            </div>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-blue-100 text-blue-800 badge-tag">Gardening</span>
                                <span class="badge bg-green-100 text-green-800 badge-tag">Farming</span>
                                <span class="badge bg-yellow-100 text-yellow-800 badge-tag">Cooking</span>
                            </div>
                            <p class="card-text text-muted small mb-4">Help with our organic vineyard and olive grove. Learn traditional Italian cooking and wine making. Private room in our 200-year-old farmhouse.</p>
                            <div class="d-flex justify-content-between text-muted small mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-1"></i>
                                    <span>4-5 hours/day</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar me-1"></i>
                                    <span>2-4 weeks</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="text-warning me-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <span class="text-muted small ms-1">(42)</span>
                                </div>
                                <a href="#" class="text-primary fw-medium small">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <div class="position-relative" style="height: 200px;">
                            <img src="https://readdy.ai/api/search-image?query=A%20beautiful%20eco-retreat%20in%20Bali%2C%20Indonesia.%20The%20image%20shows%20a%20traditional%20Balinese%20wooden%20house%20surrounded%20by%20lush%20tropical%20gardens%20with%20palm%20trees%20and%20colorful%20flowers.%20Theres%20a%20small%20yoga%20platform%20visible%20near%20a%20natural%20pool.%20The%20scene%20has%20warm%2C%20natural%20lighting%20with%20rich%20greens%20and%20earth%20tones%2C%20creating%20a%20peaceful%20sanctuary%20atmosphere.&width=600&height=400&seq=retreat1&orientation=landscape" class="card-img-top h-100 w-100 object-fit-cover" alt="Eco Retreat in Bali">
                            <span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="card-title fw-semibold">Eco Retreat in Bali</h5>
                                    <p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> Ubud, Indonesia</p>
                                </div>
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20a%20young%20Indonesian%20man%20with%20a%20friendly%20smile%2C%20wearing%20a%20traditional%20Balinese%20headband.%20He%20has%20warm%20brown%20skin%20and%20dark%20eyes%20with%20a%20welcoming%20expression.%20The%20photo%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20cultural%20pride.&width=100&height=100&seq=host2&orientation=squarish" class="rounded-circle border border-2 border-white" alt="Host" style="width: 40px; height: 40px;">
                            </div>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-purple-100 text-purple-800 badge-tag">Yoga</span>
                                <span class="badge bg-green-100 text-green-800 badge-tag">Gardening</span>
                                <span class="badge bg-blue-100 text-blue-800 badge-tag">Construction</span>
                            </div>
                            <p class="card-text text-muted small mb-4">Help maintain our eco-retreat center. Assist with bamboo construction, permaculture garden, and guest services. Shared accommodation in beautiful bamboo houses.</p>
                            <div class="d-flex justify-content-between text-muted small mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-1"></i>
                                    <span>5 hours/day</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar me-1"></i>
                                    <span>1-3 months</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="text-warning me-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="text-muted small ms-1">(78)</span>
                                </div>
                                <a href="#" class="text-primary fw-medium small">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden">
                        <div class="position-relative" style="height: 200px;">
                            <img src="https://readdy.ai/api/search-image?query=A%20beautiful%20horse%20ranch%20in%20Montana%2C%20USA.%20The%20image%20shows%20a%20large%20wooden%20ranch%20house%20with%20a%20wraparound%20porch%2C%20surrounded%20by%20vast%20open%20fields%20and%20mountains%20in%20the%20background.%20There%20are%20several%20horses%20visible%20in%20a%20fenced%20pasture.%20The%20scene%20has%20golden%20hour%20lighting%20with%20rich%20blues%20and%20amber%20tones%2C%20creating%20a%20quintessential%20American%20West%20atmosphere.&width=600&height=400&seq=ranch1&orientation=landscape" class="card-img-top h-100 w-100 object-fit-cover" alt="Horse Ranch in Montana">
                            <span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="card-title fw-semibold">Horse Ranch in Montana</h5>
                                    <p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> Bozeman, USA</p>
                                </div>
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20an%20older%20American%20cowboy%20with%20weathered%20skin%2C%20kind%20blue%20eyes%2C%20and%20gray%20hair%20under%20a%20cowboy%20hat.%20He%20has%20smile%20lines%20and%20a%20trimmed%20gray%20beard%2C%20wearing%20a%20western%20shirt.%20The%20image%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20years%20of%20outdoor%20experience.&width=100&height=100&seq=host3&orientation=squarish" class="rounded-circle border border-2 border-white" alt="Host" style="width: 40px; height: 40px;">
                            </div>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-orange-100 text-orange-800 badge-tag">Animal Care</span>
                                <span class="badge bg-blue-100 text-blue-800 badge-tag">Maintenance</span>
                                <span class="badge bg-red-100 text-red-800 badge-tag">Hospitality</span>
                            </div>
                            <p class="card-text text-muted small mb-4">Help with horse care, ranch maintenance, and guest services at our working dude ranch. Private cabin accommodation with all meals included.</p>
                            <div class="d-flex justify-content-between text-muted small mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-1"></i>
                                    <span>6 hours/day</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar me-1"></i>
                                    <span>1-6 months</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="text-warning me-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="text-muted small ms-1">(35)</span>
                                </div>
                                <a href="#" class="text-primary fw-medium small">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <button class="btn btn-outline-secondary rounded-button px-4 py-2">Load More Opportunities</button>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
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
            <div class="text-center mt-5">
                <button class="btn btn-primary rounded-button px-4 py-3">Get Started Today</button>
            </div>
        </div>
    </section>

    <!-- Membership Benefits -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">Membership Benefits</h2>
            <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">Join our global community and unlock all the features to make your cultural exchange experience unforgettable.</p>
            
            <div class="row justify-content-center g-4">
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="h5 fw-semibold mb-2">Free Account</h3>
                            <p class="text-muted mb-4">Basic access to explore the platform</p>
                            <div class="display-4 fw-bold mb-4">$0</div>
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
                                        <span class="text-muted">Create basic profile</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                                        <span class="text-muted">Contact hosts</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                                        <span class="text-muted">Messaging system</span>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                                        <span class="text-muted">Verified profile badge</span>
                                    </div>
                                </li>
                            </ul>
                            <button class="btn btn-outline-secondary w-100 rounded-button">Sign Up Free</button>
                        </div>
                    </div>
                </div>
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
                            <button class="btn btn-primary w-100 rounded-button">Join Now</button>
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

    <!-- Trust & Safety Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">Trust & Safety</h2>
            <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">Your safety is our priority. We've built multiple layers of protection to ensure a secure cultural exchange experience.</p>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="feature-icon bg-blue-100 rounded-circle" style="width: 64px; height: 64px;">
                        <i class="bi bi-shield-check fs-4 text-primary"></i>
                    </div>
                    <h3 class="h5 fw-semibold mb-2">Verified Profiles</h3>
                    <p class="text-muted small">All members can verify their identity through our secure verification system.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="feature-icon bg-green-100 rounded-circle" style="width: 64px; height: 64px;">
                        <i class="bi bi-star fs-4 text-success"></i>
                    </div>
                    <h3 class="h5 fw-semibold mb-2">Review System</h3>
                    <p class="text-muted small">Read authentic reviews from past volunteers and hosts before making arrangements.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="feature-icon bg-purple-100 rounded-circle" style="width: 64px; height: 64px;">
                        <i class="bi bi-file-text fs-4 text-purple"></i>
                    </div>
                    <h3 class="h5 fw-semibold mb-2">Clear Expectations</h3>
                    <p class="text-muted small">Detailed listings with expectations, accommodation details, and work requirements.</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <div class="feature-icon bg-red-100 rounded-circle" style="width: 64px; height: 64px;">
                        <i class="bi bi-headset fs-4 text-danger"></i>
                    </div>
                    <h3 class="h5 fw-semibold mb-2">24/7 Support</h3>
                    <p class="text-muted small">Our support team is available around the clock to assist with any issues during your stay.</p>
                </div>
            </div>
            
            <div class="mt-5 bg-light rounded-3 p-4 border mx-auto" style="max-width: 900px;">
                <h3 class="h5 fw-semibold text-center mb-4">Safety Tips for Cultural Exchange</h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <div class="d-flex">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <span class="text-muted">Always communicate through our platform messaging system</span>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <span class="text-muted">Research your destination thoroughly before committing</span>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <span class="text-muted">Establish clear expectations with your host before arrival</span>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <span class="text-muted">Keep emergency contacts and important documents accessible</span>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex">
                            <i class="bi bi-check-circle text-primary me-2"></i>
                            <span class="text-muted">Trust your instincts—if something doesn't feel right, contact our support team</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">What Our Community Says</h2>
            <p class="text-center text-muted mx-auto mb-5" style="max-width: 700px;">Real experiences from travelers and hosts who have connected through our platform.</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20a%20young%20female%20traveler%20with%20blonde%20hair%20and%20blue%20eyes%2C%20smiling%20naturally.%20She%20has%20a%20casual%2C%20adventurous%20look%20with%20slightly%20tanned%20skin%20from%20outdoor%20activities.%20The%20image%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20friendliness.&width=100&height=100&seq=testi1&orientation=squarish" class="rounded-circle me-3 testimonial-img" alt="Traveler">
                                <div>
                                    <h5 class="mb-0 fw-semibold">Emma Richardson</h5>
                                    <p class="small text-muted mb-0">Volunteer from Australia</p>
                                </div>
                            </div>
                            <p class="card-text text-muted mb-4">"My three months at the organic farm in Portugal was life-changing. I learned sustainable farming techniques, improved my Portuguese, and made lifelong friends. The hosts treated me like family and showed me the authentic local culture you'd never experience as a tourist."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20a%20middle-aged%20Japanese%20woman%20with%20short%20black%20hair%20and%20glasses%2C%20smiling%20warmly.%20She%20has%20a%20gentle%2C%20welcoming%20expression%20and%20is%20wearing%20casual%20but%20neat%20clothing.%20The%20image%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20kindness.&width=100&height=100&seq=testi2&orientation=squarish" class="rounded-circle me-3 testimonial-img" alt="Host">
                                <div>
                                    <h5 class="mb-0 fw-semibold">Yuki Tanaka</h5>
                                    <p class="small text-muted mb-0">Host from Japan</p>
                                </div>
                            </div>
                            <p class="card-text text-muted mb-4">"As a small ryokan owner in rural Japan, finding help was difficult until I discovered this platform. The volunteers have been amazing—helping with guest services while learning about Japanese culture. It's brought new energy to our community and helped us preserve traditional hospitality."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="https://readdy.ai/api/search-image?query=Portrait%20of%20a%20young%20Latino%20man%20with%20dark%20curly%20hair%20and%20brown%20eyes%2C%20with%20a%20friendly%20smile.%20He%20has%20a%20casual%2C%20relaxed%20appearance%20and%20is%20wearing%20a%20simple%20t-shirt.%20The%20image%20is%20a%20close-up%20headshot%20with%20natural%20lighting%2C%20showing%20authenticity%20and%20enthusiasm.&width=100&height=100&seq=testi3&orientation=squarish" class="rounded-circle me-3 testimonial-img" alt="Traveler">
                                <div>
                                    <h5 class="mb-0 fw-semibold">Miguel Hernandez</h5>
                                    <p class="small text-muted mb-0">Volunteer from Mexico</p>
                                </div>
                            </div>
                            <p class="card-text text-muted mb-4">"I spent six weeks helping at an eco-lodge in Costa Rica while improving my English. The experience was incredible—working with wildlife conservation projects, learning sustainable practices, and meeting people from around the world. I saved so much money while gaining valuable skills."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Ready to Start Your Cultural Exchange Journey?</h2>
            <p class="mx-auto mb-5" style="max-width: 700px; opacity: 0.9;">Join thousands of travelers and hosts creating meaningful connections around the world.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button class="btn btn-light text-primary rounded-button px-4 py-2">Find Hosts</button>
                <button class="btn btn-outline-light rounded-button px-4 py-2">Become a Host</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3">
                    <h3 class="logo-font fs-4 mb-4">CultureStay</h3>
                    <p class="text-secondary mb-4">Connecting travelers and hosts for meaningful cultural exchanges since 2010.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-secondary rounded-circle bg-gray-700 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-secondary rounded-circle bg-gray-700 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-secondary rounded-circle bg-gray-700 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-secondary rounded-circle bg-gray-700 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="h5 fw-semibold mb-4">Explore</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">How It Works</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Find Hosts</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Become a Host</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Success Stories</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Community Guidelines</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="h5 fw-semibold mb-4">Resources</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Safety Tips</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Travel Insurance</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Visa Information</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Host Resources</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="h5 fw-semibold mb-4">Stay Connected</h4>
                    <p class="text-secondary mb-3">Subscribe to our newsletter for travel tips and new opportunities.</p>
                    <div class="d-flex">
                        <input type="email" class="form-control bg-gray-700 border-0 text-white rounded-0 rounded-start" placeholder="Your email address">
                        <button class="btn btn-primary rounded-0 rounded-end">Subscribe</button>
                    </div>
                </div>
            </div>
            
            <div class="pt-4 border-top border-secondary d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="text-secondary small mb-3 mb-md-0">© 2025 CultureStay. All rights reserved.</p>
                <div class="d-flex gap-4">
                    <a href="#" class="text-secondary small text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-secondary small text-decoration-none">Terms of Service</a>
                    <a href="#" class="text-secondary small text-decoration-none">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Mobile menu toggle
            const menuButton = document.querySelector('.navbar-toggler');
            if (menuButton) {
                menuButton.addEventListener('click', function() {
                    console.log('Menu clicked');
                });
            }
            
            // Filter toggle
            const filterButton = document.querySelector('button.text-primary.text-sm.font-medium.flex.items-center');
            if (filterButton) {
                filterButton.addEventListener('click', function() {
                    console.log('Filter clicked');
                });
            }
        });
    </script>
    
<script>
function selectWorkType(type) {
    document.getElementById('selectedWorkType').value = type;
    document.getElementById('workTypeDropdown').querySelector('span').textContent = type;
    document.getElementById('workTypeDropdown').querySelector('span').classList.remove('text-muted');
}
</script>
<script>
// Function for work type selection (kept from your original code)
function selectWorkType(type) {
    document.getElementById('selectedWorkType').value = type;
    document.getElementById('workTypeDropdown').querySelector('span').textContent = type;
    document.getElementById('workTypeDropdown').querySelector('span').classList.remove('text-muted');
}
</script>

</body>
</html>

