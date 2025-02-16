<?php
  include_once "Controller/Controller.class.php";
  include_once "Controller/Database.php";
  $dbh = new Database;
  $db = $dbh->connect();
  $ctrl = new Controller($db);
  $apartments = $ctrl->getApartments();
  $home = $ctrl->getHome();
  $villa = $ctrl->getVilla();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>American Residence</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <!-- <h1 class="m-0 text-primary">Makaan</h1> -->
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="property-list.php" class="nav-item nav-link">Property List</a>
                        <?php if (!isset($_SESSION['user'])): ?>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Log in
                                </a>
                                <div class="dropdown-menu rounded-0 m-0" aria-labelledby="loginDropdown">
                                    <a href="admin/pages/form/register.php" class="dropdown-item">Sign Up</a>
                                    <hr>
                                    <a href="admin/pages/form/login.php" id="login" class="dropdown-item">Log in</a>
                                </div>
                            </div>
                            <?php else: ?>
                                <!-- If the user is logged in, display user-specific options -->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i>
                                    </a>
                                    <div class="dropdown-menu rounded-0 m-0" aria-labelledby="userDropdown">
                                        <!-- <a href="renewal.php" class="dropdown-item">Renewal</a> -->
                                        <a href="claim.php?user=<?= $_SESSION['user']['id']?>" class="dropdown-item">Make payment</a>
                                        <!-- Optionally, you can include a logout link here -->
                                        <a href="logout.php" class="dropdown-item">Log out</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        
                    </div>
                    <!-- <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a> -->
                
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">Find Your Perfect Home with Ease. Browse our curated selection of properties, from cozy apartments to luxurious estates, and start your journey today. Whether you're buying, selling, or renting, we're here to guide you every step of the way.</p>
                    <a href="contact.php#contact-form" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Discuss your plan</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword" id="keyword">
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" id="propertyType">
                                    <option value="null">Select property type</option>
                                    <option value="vila">Villa</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="home">Home</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0 py-3" id="state">
                                    <option value="null">Search by location</option>
                                    <?php
                                        $states = $ctrl->select_all_states();
                                        foreach($states as $state):
                                    ?>
                                        <option value="<?= $state['state']?>"><?= $state['state']?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3" id="search">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Types</h1>
                    <p>America Reside specializes in residential, commercial, industrial, and agricultural properties, offering apartments, offices, warehouses, and land solutions.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <!-- <a class="cat-item d-block bg-light text-center rounded p-3" href=""> -->
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Apartment</h6>
                                <span><?= $apartments?> Properties</span>
                            </div>
                        <!-- </a> -->
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <!-- <a class="cat-item d-block bg-light text-center rounded p-3" href=""> -->
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Villa</h6>
                                <span><?= $villa?> Properties</span>
                            </div>
                        <!-- </a> -->
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <!-- <a class="cat-item d-block bg-light text-center rounded p-3" href=""> -->
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Home</h6>
                                <span><?= $home?> Properties</span>
                            </div>
                        <!-- </a> -->
                    </div>
                    <!-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Office</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-building.png" alt="Icon">
                                </div>
                                <h6>Building</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-neighborhood.png" alt="Icon">
                                </div>
                                <h6>Townhouse</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-condominium.png" alt="Icon">
                                </div>
                                <h6>Shop</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-luxury.png" alt="Icon">
                                </div>
                                <h6>Garage</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">#1 Place To Find The Perfect Property</h1>
                        <p class="mb-4">Discover Your Dream Home Today. Explore a wide range of properties that fit your lifestyle and budget. With expert guidance and seamless service, finding your ideal space has never been easier. Start your journey with us now.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Market Analysis and Investment Guidance</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Property Management</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Buying & selling of properties</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>A property list features diverse real estate options, including residential, commercial, and rental properties tailored to clients' needs.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4" id="property-listings">
                        <?php
                            $properties = $ctrl->select(6);
                            foreach($properties as $property):
                        ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            
                                    <div class="property-item rounded overflow-hidden">
                                        <!-- Carousel Section -->
                                        <div id="carousel-<?= $property['id']?>" class="carousel slide position-relative" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <!-- ${propImages.map((image, index) => `
                                                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                                        <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,${image}" alt="${property.name}">
                                                    </div>
                                                `).join('')} -->
                                                <?php
                                                    $imgs = explode(",",$property['image']);
                                                    foreach($imgs as $index => $img):
                                                        $activeClass = ($index === 0) ? 'active' : '';
                                                ?>
                                                <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><div class="carousel-item <?=$activeClass?>">
                                                    <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,<?= $img?>" alt="<?= htmlspecialchars($property['name'])?>">
                                                </div></a>
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                            <!-- Carousel Controls -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            <!-- Transaction Type and Property Type Tags -->
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=$property['transaction_type']?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['prop_type']?></a></div>
                                        </div>
                                        <!-- Property Details -->
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>">$<?=$property['asking_price']?></a></h5>
                                            <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['name']?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$property['state']?></p>
                                        </div>
                                        <!-- Additional Info -->
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?= $property['space']?> sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?= $property['bedroom']?> Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?= $property['bathroom']?> Bath</small>
                                        </div>
                                    </div>
                                    
                                </div>
            
                            
                        <?php
                            endforeach;
                        ?>
                            
                        </div>
                    
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4" id="property-listings">
                        <?php
                            $properties_to_sell = $ctrl->getSellProperties();
                            foreach($properties_to_sell as $property):
                        ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            
                                    <div class="property-item rounded overflow-hidden">
                                        <!-- Carousel Section -->
                                        <div id="carousel-<?= $property['id']?>" class="carousel slide position-relative" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <!-- ${propImages.map((image, index) => `
                                                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                                        <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,${image}" alt="${property.name}">
                                                    </div>
                                                `).join('')} -->
                                                <?php
                                                    $imgs = explode(",",$property['image']);
                                                    foreach($imgs as $index => $img):
                                                        $activeClass = ($index === 0) ? 'active' : '';
                                                ?>
                                                <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><div class="carousel-item <?=$activeClass?>">
                                                    <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,<?= $img?>" alt="<?= htmlspecialchars($property['name'])?>">
                                                </div></a>
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                            <!-- Carousel Controls -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            <!-- Transaction Type and Property Type Tags -->
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=$property['transaction_type']?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['prop_type']?></a></div>
                                        </div>
                                        <!-- Property Details -->
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>">$<?=$property['asking_price']?></a></h5>
                                            <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['name']?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$property['state']?></p>
                                        </div>
                                        <!-- Additional Info -->
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?= $property['space']?> sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?= $property['bedroom']?> Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?= $property['bathroom']?> Bath</small>
                                        </div>
                                    </div>
                                    
                                </div>
            
                            
                        <?php
                            endforeach;
                        ?>
                            
                        </div>
                    
                    </div>

                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4" id="property-listings">
                        <?php
                            $properties_to_sell = $ctrl->getRentProperties();
                            foreach($properties_to_sell as $property):
                        ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            
                                    <div class="property-item rounded overflow-hidden">
                                        <!-- Carousel Section -->
                                        <div id="carousel-<?= $property['id']?>" class="carousel slide position-relative" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <!-- ${propImages.map((image, index) => `
                                                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                                        <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,${image}" alt="${property.name}">
                                                    </div>
                                                `).join('')} -->
                                                <?php
                                                    $imgs = explode(",",$property['image']);
                                                    foreach($imgs as $index => $img):
                                                        $activeClass = ($index === 0) ? 'active' : '';
                                                ?>
                                                <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><div class="carousel-item <?=$activeClass?>">
                                                    <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,<?= $img?>" alt="<?= htmlspecialchars($property['name'])?>">
                                                </div></a>
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                            <!-- Carousel Controls -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $property['id']?>" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            <!-- Transaction Type and Property Type Tags -->
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=$property['transaction_type']?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['prop_type']?></a></div>
                                        </div>
                                        <!-- Property Details -->
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>">$<?=$property['asking_price']?></a></h5>
                                            <a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['name']?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$property['state']?></p>
                                        </div>
                                        <!-- Additional Info -->
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?= $property['space']?> sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?= $property['bedroom']?> Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?= $property['bathroom']?> Bath</small>
                                        </div>
                                    </div>
                                    
                                </div>
            
                            
                        <?php
                            endforeach;
                        ?>
                            
                        </div>
                    
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary py-3 px-5" href="./property-list.php">Browse More Property</a>
                </div>
            </div>
        </div>
        <!-- Property List End -->


        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Contact With Our Certified Agent</h1>
                                    <p>Ready to take the next step? Our certified agents are here to provide expert advice and guide you through every part of your real estate journey. Reach out today for personalized support!</p>
                                </div>
                                <a href="contact.php#contact-form" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-calendar-alt me-2"></i>Contact an agent</a>
                                <!-- <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Agents</h1>
                    <p>Our expert property agents are dedicated to helping you find the perfect home or investment. With local market knowledge and a client-first approach, they’ll ensure a smooth and successful experience from start to finish.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-1.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Olivia Grace Peterson</h5>
                                <small>CRS</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-2.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">William Charles Anderson</h5>
                                <small>CCIM</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-3.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Aaliyah Nicole Patel</h5>
                                <small>Accredited Buyer’s Representative</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Benjamin Jacob Montgomery</h5>
                                <small>Realtor</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Hear from our happy clients! Discover how we’ve helped people find their dream homes, make smart investments, and navigate the real estate market with confidence. Your satisfaction is our top priority.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>I had an amazing experience working with this team! They listened to my needs and found me the perfect home within my budget. The entire process was smooth, and they made sure I felt confident every step of the way. Highly recommend!</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Emily R</h6>
                                    <small>Corporate Executive</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>As a first-time homebuyer, I was nervous, but my agent was incredibly knowledgeable and patient. They explained everything in detail, and I never felt pressured. I’m so happy with my new place and grateful for their support!</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">James T</h6>
                                    <small>Medical Specialist</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Selling my home was stress-free thanks to this team. They provided expert advice on pricing and staging, and I got multiple offers within days. Their professionalism and market insight made all the difference.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">David L</h6>
                                    <small> Entrepreneur</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>307 Sand Ln, Staten Island, NY 10305, United States</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+1 (212) 518 6963</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>americar@americareside.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Subscribe to our newsletter</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">America reside</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const searchButton = document.querySelector('#search');
    const propertyListings = document.getElementById('property-listings');

    // Ensure elements exist before adding event listeners
    if (searchButton && propertyListings) {
        searchButton.addEventListener('click', function () {
            
            document.getElementById("property-listings").scrollIntoView({behavior: 'smooth'});
            // propertyListings.innerHTML = `<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            //     <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            //         <span class="sr-only">Loading...</span>
            //     </div>
            // </div>`;
            // Get the search input values
            const keyword = document.querySelector('#keyword').value;
            const propertyType = document.querySelector('#propertyType').value;
            const location = document.querySelector('#state').value;
            
            // Clear previous results
            
            
            // Fetch properties dynamically
            
                fetch('fetchproduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ keyword, propertyType, location }),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(properties => {
                    // setTimeout(() => {
                        propertyListings.innerHTML = ''; 
                    // }, 800);// Clear the loading text
                    if (Array.isArray(properties) && properties.length > 0) {
                        properties.forEach(property => {
                            // Create property HTML dynamically
                            const propertyHTML = `
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div id="carousel-${property.id}" class="carousel slide position-relative" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                ${property.images && Array.isArray(property.images)
                                                    ? property.images.map((img, index) => `
                                                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                                            <img class="d-block w-100 img-fluid" src="data:image/jpeg;base64,${img}" alt="${property.name}">
                                                        </div>`).join('')
                                                    : '<div class="carousel-item active"><img class="d-block w-100 img-fluid" src="default.jpg" alt="Default Image"></div>'}
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-${property.id}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-${property.id}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                            <!-- Transaction Type and Property Type Tags -->
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For ${property.transaction_type}</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><a class="d-block h5 mb-2" href="cart.php?id=<?= $property['id']?>"><?=$property['prop_type']?></a></div>
                                        </div>
                                        <!-- Property Details -->
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3"><a class="d-block h5 mb-2" href="cart.php?id=${property.id}">$${property.asking_price}</a></h5>
                                            <a class="d-block h5 mb-2" href="cart.php?id=${property.id}">${property.name}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>${property.state}</p>
                                        </div>
                                        <!-- Additional Info -->
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>${property.space} sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>${property.bedroom} Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>${property.bathroom} Bath</small>
                                        </div>
                                    </div>
                                    
                                </div>`;
                            propertyListings.insertAdjacentHTML('beforeend', propertyHTML);
                        });
                    } else {
                        
                            propertyListings.innerHTML = "<div class='container mx-auto d-flex justify-content-center align-items-center' style='height: 250px'><p>No properties found matching your criteria.</p></div>";
                        
                        // console.log(res);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    propertyListings.innerHTML = '<p>An error occurred while fetching properties. Please try again later.</p>';
                });
        });
    } else {
        console.error('Search button or property listings container not found.');
    }
});

    </script>
</body>

</html>
