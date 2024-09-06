<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Header</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="chat.css">
  <style>
    body {
      font-family: 'League Spartan', sans-serif;
    }

    /* Custom carousel styles */
    .carousel-inner {
      height: 500px;
      /* Adjust the height as needed */
    }

    .carousel-item {
      height: 100%;
    }

    .carousel-item img {
      height: 100%;
      object-fit: cover;
      opacity: 0.8;
      /* Add transparency effect */
    }
 
    /* Styling for the New Arrival Section */
 .new-arrival-header {
            background-color: #c40404;
            color: white;
            padding: 15px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 5px 5px 0 0;
        }

        .new-arrival-header a {
            color: white;
            text-decoration: none;
            font-weight: normal;
        }

        .new-arrival-section {
            border: 1px solid #c40404;
            border-top: none;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 0 0 5px 5px;
        }

        .product-section {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
            scrollbar-width: thin;
            gap: 15px;
        }

        .product-section::-webkit-scrollbar {
            height: 8px;
        }

        .product-section::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        .product-card {
            flex: 0 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .product-card .product-title {
            font-size: 14px;
            font-weight: bold;
            padding: 10px 5px;
        }

        .product-card .price {
            font-size: 16px;
            color: #000;
            padding-bottom: 10px;
        }

        .product-card .rating {
            color: #FFD700;
            padding-bottom: 10px;
        }


        /* Oxford Collection Section */
.oxford-collection {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            background-color: #222;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .oxford-collection img {
            width: 120px;
            margin-bottom: 15px;
        }

        .oxford-collection h5 {
            margin-bottom: 10px;
            text-align: center;
        }

        .oxford-collection p {
            font-size: 14px;
            text-align: center;
        }

        .view-collection-btn {
            background-color: #c40404;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-collection-btn:hover {
            background-color: #a20303;
        }

        /* Responsive Adjustments */
        @media (min-width: 768px) {
            .new-arrival-section .d-flex {
                flex-direction: row;
            }

            .oxford-collection {
                width: 300px;
                margin-right: 20px;
                margin-bottom: 0;
            }

            .horizontal-scroll {
                flex: 1;
            }
        }

        /* GIVI Box & Brackets */
        .givi-header {
            border-bottom: 3px solid #c40404;
            padding-bottom: 10px;
        }
        
        .card {
            border: 1px solid #ddd;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border-radius: 8px; /* Add rounded corners */
            overflow: hidden; /* Ensure images don't overflow */
        }
        
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow effect */
        }
        
        .card-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0.5rem; /* Space between title and text */
        }
        
        .card-text {
            font-size: 16px;
            margin-bottom: 0.5rem; /* Space between price and rating */
        }
        
        .rating {
            font-size: 14px;
            color: #FFD700;
        }
        
        .card-img-top {
            object-fit: cover; /* Ensure image covers the container */
            height: 200px; /* Fixed height for images */
        }
        
        .card-body {
            padding: 1rem; /* Padding inside card */
        }
        
        .row-gap {
            margin-bottom: 2rem; /* Adjust spacing between rows */
        }
        
        
          /* General Container */
.freshen-up-container {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 30px;
    position: relative;
    overflow: hidden;
  }
  
  /* Image Placeholders */
  .placeholder-image, .placeholder-small-image, .placeholder-video {
    width: 100%;
    background-color: #ddd;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #888;
    font-size: 24px;
    text-align: center;
  }
  
  .placeholder-image {
    height: 300px;
  }
  
  .placeholder-small-image {
    height: 150px;
  }
  
  .placeholder-video {
    height: 250px;
  }
  
  /* Visors Styling */
  .visors {
    margin-top: 20px;
  }
  
  .visor-item h6 {
    font-size: 14px;
    font-weight: normal;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #555;
  }
  
  /* Ad Box */
  .ad-box {
    background-color: #fff;
    text-align: center;
  }
  
  .ad-box img {
    max-width: 100%;
  }
  
  /* Video Section */
  .video-container {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
  }
  
  /* Responsive Styles */
  @media (max-width: 768px) {
    .freshen-up-container,
    .ad-box,
    .video-container {
      text-align: center;
    }
  
    .visors {
      justify-content: center;
    }
  }
/* General Container */
/* General Container */
.partner-logo {
    background: linear-gradient(135deg, #f1f9ff 0%, #dfefff 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #dde7f3;
    position: relative;
    height: 200px; /* Increased height */
    width: 100%;
}

/* Image Styling */
.partner-logo img {
    max-width: 90%; /* Increased image size */
    max-height: 90%; /* Increased image size */
    object-fit: contain;
    filter: grayscale(100%); /* Modern look by default */
    transition: filter 0.3s ease;
}

/* Hover Effect */
.partner-logo:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
}

.partner-logo:hover img {
    filter: grayscale(0%); /* Removes grayscale effect on hover */
}

/* Gradient Overlay for Logos */
.partner-logo:before {
    content: "";
    background: rgba(255, 255, 255, 0.1);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    z-index: -1;
    transition: opacity 0.3s ease;
}

.partner-logo:hover:before {
    opacity: 0;
}

/* Heading Styling */
h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 2rem; /* Increased margin-bottom */
    position: relative;
}

h2:after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background-color: #009DDF;
    margin: 0.5rem auto;
}

/* Responsive Styling */
@media (max-width: 768px) {
    .partner-logo {
        height: 180px; /* Adjusted height for medium screens */
    }
}

@media (max-width: 576px) {
    .partner-logo {
        height: 150px; /* Adjusted height for small screens */
    }

    h2 {
        font-size: 2rem;
    }
}

  </style>
</head>

<body>
  <!-- Top Navigation Bar -->
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container d-flex justify-content-between align-items-center">
        <form class="form-inline mx-4">
            <div class="input-group">
                <input type="text" class="form-control search-input" placeholder="Search for products">
                <div class="input-group-append">
                    <button class="btn btn-search" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="navbar-icons d-flex align-items-center">
            <a class="nav-link" href="cart.php">
                <i class="fa fa-shopping-cart"></i><span class="cart-count">0</span>
            </a>
            <div class="nav-item dropdown ml-3">
                <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="login.php">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </a>
                    <a class="dropdown-item" href="SignUp.php">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


  <!-- Bottom Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
                        <a class="nav-link" href="About.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="BookingAppointment.php">Booking Appointment</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Image Slider -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Bg/MainSlider.jpg" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="Sliders/1.png" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="Sliders/2.png" class="d-block w-100" alt="Slide 3">
      </div>
      <div class="carousel-item">
        <img src="Sliders/3.png" class="d-block w-100" alt="Slide 4">
      </div>
      <div class="carousel-item">
        <img src="Sliders/4.png" class="d-block w-100" alt="Slide 5">
      </div>
      <div class="carousel-item">
        <img src="Sliders/5.png" class="d-block w-100" alt="Slide 6">
      </div>
      <div class="carousel-item">
        <img src="Sliders/6.png" class="d-block w-100" alt="Slide 7">
      </div>
      <div class="carousel-item">
        <img src="Sliders/7.png" class="d-block w-100" alt="Slide 8">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="container my-5">
    <!-- New Arrival Header -->
    <div class="new-arrival-header">
        <span>New Arrival</span>
        <a href="#">View all</a>
    </div>

    <!-- New Arrival Section -->
    <div class="new-arrival-section">
        <div class="d-flex flex-column flex-md-row">
            <!-- Oxford Collection (Left Section) -->
            <div class="oxford-collection mb-4 mb-md-0">
                <img src="https://via.placeholder.com/120" alt="Oxford Atlas" />
                <h5>OXFORD Collection</h5>
                <p>The best luggage allows you to explore wherever, whenever. Our range-topping ATLAS modular luggage range can take you to the shops or around the globe.</p>
                <button class="view-collection-btn">View Collection</button>
            </div>

            <!-- Horizontal Scrollable Product Cards -->
            <div class="horizontal-scroll product-section">
                <!-- Product Card 1 -->
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX743 STRAPS 2</div>
                    <div class="price">₱1,500.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX743 STRAPS 2</div>
                    <div class="price">₱1,500.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX745 CAM STRAPS</div>
                    <div class="price">₱590.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX744 RATCHET HOOK STRAPS</div>
                    <div class="price">₱1,790.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>

                <!-- Additional Product Cards (Optional) -->
                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX746 STRAPS</div>
                    <div class="price">₱1,200.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>

                <div class="product-card">
                    <img src="https://via.placeholder.com/200x200" alt="Product Image">
                    <div class="product-title">OXFORD OX747 STRAPS</div>
                    <div class="price">₱2,000.00</div>
                    <div class="rating"><i class="fas fa-star"></i> 0 (0 Review)</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <!-- GIVI Box & Brackets Header -->
    <div class="givi-header d-flex justify-content-between align-items-center">
      <h3 class="text-danger fw-bold">GIVI™ Box & Brackets</h3>
      <a href="#" class="text-dark">View all</a>
    </div>
  
    <!-- GIVI Products Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-3 row-gap">
      <!-- Product Card 1 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI MTB45B">
          <div class="card-body">
            <h5 class="card-title">GIVI MTB45B MONTE BIANCO TOP CASE - BLACK (45L)</h5>
            <p class="card-text text-danger">₱15,990.00</p>
            <div class="rating">★ ★ ★ ★ ★ (0 Reviews)</div>
          </div>
        </div>
      </div>
  
      <!-- Product Card 2 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI DLM46B">
          <div class="card-body">
            <h5 class="card-title">GIVI DLM46B TREKKER DOLOMITI MK TOP CASE(46L)</h5>
            <p class="card-text text-danger">₱25,990.00</p>
            <div class="rating">★ ★ ★ ★ ★ (0 Reviews)</div>
          </div>
        </div>
      </div>
  
      <!-- Product Card 3 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI B42N">
          <div class="card-body">
            <h5 class="card-title">GIVI B42N ANTARTICA TOP CASE (42L)</h5>
            <p class="card-text text-danger">₱6,990.00</p>
            <div class="rating">★★★★★ (2 Reviews)</div>
          </div>
        </div>
      </div>
  
      <!-- Product Card 4 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI B42N">
          <div class="card-body">
            <h5 class="card-title">GIVI B42N ANTARTICA TOP CASE (42L)</h5>
            <p class="card-text text-danger">₱6,990.00</p>
            <div class="rating">★★★★★ (2 Reviews)</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add more products with additional spacing -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 row-gap">
      <!-- Product Card 5 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI XYZ123">
          <div class="card-body">
            <h5 class="card-title">GIVI XYZ123 NEW TOP CASE (50L)</h5>
            <p class="card-text text-danger">₱17,990.00</p>
            <div class="rating">★★★☆☆ (5 Reviews)</div>
          </div>
        </div>
      </div>
  
      <!-- Product Card 6 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI ABC456">
          <div class="card-body">
            <h5 class="card-title">GIVI ABC456 SPECIAL EDITION (30L)</h5>
            <p class="card-text text-danger">₱12,990.00</p>
            <div class="rating">★★★★☆ (3 Reviews)</div>
          </div>
        </div>
      </div>

      <!-- Product Card 7 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI DEF789">
          <div class="card-body">
            <h5 class="card-title">GIVI DEF789 ADVANCED TOP CASE (55L)</h5>
            <p class="card-text text-danger">₱19,990.00</p>
            <div class="rating">★★☆☆☆ (8 Reviews)</div>
          </div>
        </div>
      </div>

      <!-- Product Card 8 -->
      <div class="col">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="GIVI GHI101">
          <div class="card-body">
            <h5 class="card-title">GIVI GHI101 CLASSIC TOP CASE (40L)</h5>
            <p class="card-text text-danger">₱13,990.00</p>
            <div class="rating">★★★★★ (7 Reviews)</div>
          </div>
        </div>
      </div>
    </div>
</div>

  <div class="container my-5">
    <!-- Row 1: Main FRESHEN UP Section -->
    <div class="row">
      <div class="col-md-8">
        <div class="freshen-up-container p-4 border shadow-sm">
          <div class="placeholder-image mb-3">Image Placeholder</div> <!-- Placeholder for main image -->
          <div class="freshen-up-content mt-3">
            <h2 class="text-danger fw-bold">FRESHEN UP YOUR HELMET</h2>
            <h5 class="text-uppercase text-muted mb-3">Helmet Spare Parts Available Online</h5>
            <div class="visors d-flex flex-wrap">
              <div class="visor-item me-4">
                <h6>FULL FACE VISOR</h6>
              </div>
              <div class="visor-item me-4">
                <h6>HALF FACE VISOR</h6>
              </div>
              <div class="visor-item me-4">
                <h6>SUN VISOR</h6>
              </div>
              <div class="visor-item me-4">
                <h6>MECHANISM</h6>
              </div>
              <div class="visor-item me-4">
                <h6>CHEEKPADS</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Row 1: Small Ad Boxes (LS2 Electron Visors and Custom Fit Cheek Pads) -->
      <div class="col-md-4">
        <div class="ad-box border p-3 mb-4 shadow-sm">
          <div class="placeholder-small-image mb-2">Ad Image 1 Placeholder</div> <!-- Placeholder for Ad image -->
        </div>
        <div class="ad-box border p-3 shadow-sm">
          <div class="placeholder-small-image mb-2">Ad Image 2 Placeholder</div> <!-- Placeholder for Ad image -->
        </div>
      </div>
    </div>
  
    <!-- Row 2: Video Section -->
    <div class="row mt-5">
      <div class="col">
        <div class="video-container border p-4 shadow-sm">
          <div class="placeholder-video mb-3">Video Placeholder</div> <!-- Placeholder for video -->
          <div class="mt-3 text-center">
            <h4 class="fw-bold">INTUITIVE CUBE COLLECTION</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!-- Partnership Section -->
<div class="container my-5">
    <h2 class="text-center mb-5">Our Trusted Partners</h2>
    <div class="row g-4">
        <!-- Partner 3 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/1.png" alt="Partner 3" class="img-fluid">
            </div>
        </div>
        <!-- Partner 4 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/16.png" alt="Partner 4" class="img-fluid">
            </div>
        </div>
        <!-- Partner 5 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/22.png" alt="Partner 5" class="img-fluid">
            </div>
        </div>
        <!-- Partner 6 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/26.png" alt="Partner 6" class="img-fluid">
            </div>
        </div>
        <!-- Partner 7 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/64.png" alt="Partner 7" class="img-fluid">
            </div>
        </div>
        <!-- Partner 8 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/82.png" alt="Partner 8" class="img-fluid">
            </div>
        </div>
        <!-- Partner 9 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/93.png" alt="Partner 9" class="img-fluid">
            </div>
        </div>
        <!-- Partner 10 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/106.png" alt="Partner 10" class="img-fluid">
            </div>
        </div>
        <!-- Partner 11 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/118.png" alt="Partner 11" class="img-fluid">
            </div>
        </div>

        <!-- Partner 13 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/132.png" alt="Partner 13" class="img-fluid">
            </div>
        </div>
        <!-- Partner 14 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/141.png" alt="Partner 14" class="img-fluid">
            </div>
        </div>
        <!-- Partner 15 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/144.png" alt="Partner 15" class="img-fluid">
            </div>
        </div>
        <!-- Partner 16 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/150.png" alt="Partner 16" class="img-fluid">
            </div>
        </div>
        <!-- Partner 17 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/152.png" alt="Partner 17" class="img-fluid">
            </div>
        </div>
        <!-- Partner 18 -->
        <div class="col-md-4">
            <div class="partner-logo shadow-sm">
                <img src="Products/22.png" alt="Partner 17" class="img-fluid">
            </div>
        </div>
    </div>
</div>

  <!-- Chat Icon -->
<!-- Chat Icon -->
<div class="chat-icon" onclick="toggleChat()">
    <i class="fas fa-comments"></i>
  </div>
  
  <!-- Chat Window -->
  <div class="chat-window" id="chat-window">
    <div class="chat-header">Chat with us</div>
    <div class="chat-body" id="chat-body">
      <!-- Example messages -->
      <div class="chat-message chat-message-received">
        Hello! How can I help you today?
      </div>
      <div class="chat-message chat-message-sent">
        Hi, I'd like to inquire about booking an appointment.
      </div>
    </div>
    <div class="chat-footer">
      <input type="text" id="chat-input" placeholder="Type a message...">
      <button onclick="sendMessage()">Send</button>
    </div>
  </div>
  

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-column">
          <h5>OFFICE ADDRESS</h5>
          <p>1665 Ilang Ilang St. <br>
            Bgry 174,<br>
            Caloocan, Philippines</p>
          <p>
            Telephone: <br>
            + (63) 917 - 5695 - 469<br>
            Ecommerce Team:<br>
            Mon-Sun 8:00am-5:00pm, excluding holidays
          </p>
        </div>
        <div class="col-md-3 footer-column">
          <h5>CUSTOMER CARE</h5>
          <ul>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Payment Policy</a></li>
            <li><a href="#">Shipping & Delivery Policy</a></li>
            <li><a href="#">Return, Exchange, Cancellation & Refund Policy</a></li>
          </ul>
        </div>

        <div class="col-md-3 footer-column">
          <h5>NEWSLETTER</h5>
          <p>Receive our latest news, product launches & exclusive offers. T&Cs Apply</p>
          <div class="newsletter">
            <input type="email" placeholder="Your email">
            <button>Subscribe</button>
          </div>
          <div class="social-icons" style="margin-top: 30px;">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        © 2024 AV MOTO Philippines.
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="script.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Function to update the cart count
      function updateCartCount() {
        fetch('Partials/get_cart_count.php')
          .then(response => response.json())
          .then(data => {
            if (data.cart_count !== undefined) {
              document.querySelector('.cart-count').textContent = data.cart_count;
            }
          })
          .catch(error => console.error('Error fetching cart count:', error));
      }

      // Update cart count initially
      updateCartCount();


    });
  </script>

</body>

</html>