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

    /* New Arrival Section */
    .new-arrival {
      padding: 60px 0;
      background-color: var(--white-color);
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
    }

    .new-arrival-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .new-arrival h2 {
      font-size: 2rem;
      color: var(--primary-color);
    }

    .view-all {
      font-size: 1rem;
      color: var(--primary-color);
      text-decoration: none;
    }

    .promo-section {
      background-color: var(--white-color);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform var(--transition-speed), box-shadow var(--transition-speed);
      position: relative;
    }

    .promo-section img {
      width: 100%;
      height: auto;
    }

    .promo-text {
      padding: 15px;
      text-align: center;
    }

    .promo-text h4 {
      font-size: 1.5rem;
      color: var(--black-color);
      margin-bottom: 10px;
    }

    .promo-text p {
      font-size: 1rem;
      color: var(--grey-color);
      margin-bottom: 15px;
    }

    .promo-text .btn {
      background-color: var(--danger-color);
      border: none;
      color: var(--white-color);
      transition: background-color var(--transition-speed);
    }

    .promo-text .btn:hover {
      background-color: darken(var(--danger-color), 10%);
    }

    .product-scroll-container {
      display: flex;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      padding-bottom: 15px;
    }

    .product-card {
      flex: 0 0 auto;
      width: 300px;
      margin-right: 15px;
      border: none;
      background: var(--white-color);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform var(--transition-speed), box-shadow var(--transition-speed);
      position: relative;
    }

    .product-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
      width: 100%;
      height: auto;
      transition: transform var(--transition-speed);
    }

    .product-card:hover img {
      transform: scale(1.05);
    }

    .product-card .card-body {
      padding: 1rem;
      text-align: center;
    }

    .product-card .card-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: var(--black-color);
      margin-bottom: 0.5rem;
    }

    .product-card .price {
      font-size: 1.2rem;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
      text-decoration: line-through;
    }

    .product-card .discounted-price {
      font-size: 1.5rem;
      color: var(--danger-color);
      margin-left: 10px;
      text-decoration: none;
    }

    .product-card .badge {
      font-size: 0.8rem;
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .product-card .review {
      font-size: 0.875rem;
      color: var(--grey-color);
      margin-bottom: 1rem;
    }

    .product-card .btn {
      background-color: var(--primary-color);
      border: none;
      color: var(--white-color);
      transition: background-color var(--transition-speed);
    }

    .product-card .btn:hover {
      background-color: var(--secondary-color);
    }



    /* img section */
    .new-section {
      background-color: var(--secondary-color);

    }

    .new-section-item {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(95, 243, 248, 0.1);
      transition: transform var(--transition-speed), box-shadow var(--transition-speed);
    }

    .new-section-item img {
      width: 100%;
      height: 100%;
      transition: transform var(--transition-speed);
    }

    .new-section-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
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
      <div class="navbar-icons">
        <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i><span class="cart-count">0</span></a>
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
          <li class="nav-item">
            <a class="nav-link" href="Login.php">Log in</a>
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

  <!-- New Arrival Section -->
  <div class="container new-arrival">
    <div class="row">
      <div class="col-12">
        <div class="new-arrival-header">
          <h2 class="text-left">RACEPOWER COLLECTION</h2>
          <a href="#" class="view-all">View all</a>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Promotional Section -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="promo-section">
          <img src="Products/1.png" alt="TAICHI Collection" class="img-fluid">
          <div class="promo-text">
            <h4>RACEPOWER Collection</h4>
            <p>RACEPOWER goes above and beyond other manufacturers by developing protective gear based on the standards of "CE marking".</p>
            <a href="#" class="btn btn-danger">View Collection</a>
          </div>
        </div>
      </div>
      <!-- Horizontal Scroll for Product Cards -->
      <div class="col-lg-9 col-md-12 mb-4">
        <div class="product-scroll-container">
          <div class="product-card">
            <img src="Products/10.png" class="card-img-top" alt="TAICHI Collection">
            <div class="card-body">
              <h5 class="card-title">RACEPOWER PCX PREMIUM R PLUS</h5>
              <p class="price">₱5,600 <span class="discounted-price">₱5,600</span></p>


              <p class="review">0 (0 Reviews)</p>
              <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
          <div class="product-card">
            <img src="Products/10.png" class="card-img-top" alt="TAICHI Collection">
            <div class="card-body">
              <h5 class="card-title">RACEPOWER PCX PREMIUM R PLUS</h5>
              <p class="price">₱5,600 <span class="discounted-price">₱5,600</span></p>

              <p class="review">0 (0 Reviews)</p>
              <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
          <div class="product-card">
            <img src="Products/10.png" class="card-img-top" alt="TAICHI Collection">
            <div class="card-body">
              <h5 class="card-title">RACEPOWER PCX PREMIUM R PLUS</h5>
              <p class="price">₱5,600 <span class="discounted-price">₱5,600</span></p>

              <p class="review">0 (0 Reviews)</p>
              <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
          <div class="product-card">
            <img src="Products/10.png" class="card-img-top" alt="TAICHI Collection">
            <div class="card-body">
              <h5 class="card-title">RACEPOWER PCX PREMIUM R PLUS</h5>
              <p class="price">₱5,600 <span class="discounted-price">₱5,600</span></p>

              <p class="review">0 (0 Reviews)</p>
              <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
          <div class="product-card">
            <img src="Products/10.png" class="card-img-top" alt="TAICHI Collection">
            <div class="card-body">
              <h5 class="card-title">RACEPOWER PCX PREMIUM R PLUS</h5>
              <p class="price">₱5,600 <span class="discounted-price">₱5,600</span></p>

              <p class="review">0 (0 Reviews)</p>
              <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
            </div>
          </div>
          <!-- Add more product cards as needed -->
        </div>
      </div>
    </div>
  </div>


  <div class="container new-section">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center mb-4"></h2>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color:#009DDF">
          <img src="Bg/Price.jpg" alt="Image 1">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Bg/Price2.jpg" alt="Image 2">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Bg/Price3.jpg" alt="Image 3">
        </div>
      </div>
    </div>
  </div>


  <div class="container new-arrival">
    <div class="row">
      <div class="col-12">
        <div class="new-arrival-header">
          <h2 class="text-left">PROFENDER</h2>
          <a href="#" class="view-all">View all</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="product-scroll-container">
        <!-- LS2 FF902 Scope Modular Helmet -->
        <div class="product-card">
          <img src="Products/17.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Flash Earox 285 MM</h5>
            <p class="price">₱10,850</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>

        <div class="product-card">
          <img src="Products/17.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Flash Earox 285 MM</h5>
            <p class="price">₱10,850</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>


        <div class="product-card">
          <img src="Products/17.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Flash Earox 285 MM</h5>
            <p class="price">₱10,850</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>

        <div class="product-card">
          <img src="Products/17.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Flash Earox 285 MM</h5>
            <p class="price">₱10,850</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>

        <div class="product-card">
          <img src="Products/17.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Flash Earox 285 MM</h5>
            <p class="price">₱10,850</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="container new-arrival">
    <div class="row">
      <div class="col-12">
        <div class="new-arrival-header">
          <h2 class="text-left">OHLINS</h2>
          <a href="#" class="view-all">View all</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="product-scroll-container">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="promo-section">
            <img src="Products/22.png" alt="TAICHI Collection" class="img-fluid">
            <div class="promo-text">
              <h4>OHLINS Collection</h4>
              <p>OHLINS goes above and beyond other manufacturers by developing protective gear based on the standards of "CE marking".</p>
              <a href="#" class="btn btn-danger">View Collection</a>
            </div>
          </div>
        </div>
        <!-- LS2 FF902 Scope Modular Helmet -->
        <div class="product-card">
          <img src="Products/23.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Blackline Vespa Sprint / Primavera</h5>
            <p class="price">₱31,000</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>

        <div class="product-card">
          <img src="Products/23.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Blackline Vespa Sprint / Primavera</h5>
            <p class="price">₱31,000</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>


        <div class="product-card">
          <img src="Products/23.png" alt="LS2 FF902 Scope Modular Helmet">
          <div class="card-body">
            <h5 class="card-title">Blackline Vespa Sprint / Primavera</h5>
            <p class="price">₱31,000</p>
            <p class="review">★★★★★ (2 Reviews)</p>
            <a href="#" class="btn btn-primary btn-block">Add to Cart</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container new-section mt-3 mb-3">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center mb-4 mt-4">OFFICIAL NATIONWIDE DISTRUBUTOR</h2>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="img/AV Moto Rebrand Outline.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="img/AV Moto Logo Outline.png" alt="Image 3">
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color:#009DDF">
          <img src="Products/1.png" alt="Image 1">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/16.png" alt="Image 2">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/22.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/26.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color:#009DDF">
          <img src="Products/64.png" alt="Image 1">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/82.png" alt="Image 2">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/93.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/106.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color:#009DDF">
          <img src="Products/118.png" alt="Image 1">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/129.png" alt="Image 2">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/132.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/141.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color:#009DDF">
          <img src="Products/144.png" alt="Image 1">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/150.png" alt="Image 2">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/152.png" alt="Image 3">
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="new-section-item" style="background-color: #009DDF">
          <img src="Products/22.png" alt="Image 3">
        </div>
      </div>
    </div>
  </div>

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