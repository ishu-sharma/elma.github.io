<?php
session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `items` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['title'];
$code = $row['code'];
$price = $row['price'];
$image = $row['photo'];

$cartArray = array(
  $code=>array(
  'title'=>$name,
  'code'=>$code,
  'price'=>$price,
  'quantity'=>1,
  'photo'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'><script>alert('Product is added to your cart!');</script></div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
  $status = "<div class='box' style='color:red;'>
  Product is already added to your cart!</div>";  
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
  }

  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <title>Elma</title>
    <!-- data aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
      .outline-hov {
  padding: 0.55rem 3rem;
  background-color: #ec4067;
  color: #fff;
  border:1px solid;
  border-radius:3px;
  border-color: transparent;
  outline: none;
  transition: all 0.3s ease;
}

.outline-hov:hover {
  background-color: #fff;
  color: #ec4067;
  border-color: #ec4067;
}
    </style>
    <link rel="stylesheet" href="index-style.css">
    
    
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body class="">
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="images/logo.png" alt="" class="bi me-2" height="40" role="img" aria-label="logo" data-aos="fade-up"
     data-aos-anchor-placement="top-center">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#service" class="nav-link px-2 link-dark">Services</a></li>
          <li><a href="#product" class="nav-link px-2 link-dark">Products</a></li>
          <li><a href="#contact" class="nav-link px-2 link-dark">Contact Us</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end d-flex ">
        <div class="actions my-auto p-2">
          <?php
           if(!empty($_SESSION["shopping_cart"])) {
           $cart_count = count(array_keys($_SESSION["shopping_cart"]));
           ?>
          <button type="button" class="btns my-auto position-relative">
            <a href="cart.php">
            <img src="icons/cart.png" height="22px" alt="" srcset="" />
            </a>
            <span
              class="
                position-absolute
                top-0
                start-100
                translate-middle
                badge
                rounded-pill
                bg-danger
              "
            >
              <?php echo $cart_count; ?>
              <span class="visually-hidden">Checkout Now</span>
            </span>
          </button>
          <?php
         }
         ?>

          <button type="button" class="btns my-auto" data-toggle="tooltip" data-placement="bottom" title="Wishlist">
            <a href="#">
              <img src="icons/heart.png" height="22px" alt="" srcset="" />
            </a>
          </button>
          <button type="button" class="btns my-auto" data-toggle="tooltip" data-placement="bottom" title="Login Here">
            <a href="login-form.php">
              <img
                src="icons/profile-user.png"
                height="22px"
                alt=""
                srcset=""
              />
            </a>
          </button>

          <button type="button" class="btns my-auto">
            <img
              src="icons/night-mode.png"
              class="dark"
              height="22px"
              alt=""
              srcset=""
            />
          </button>
        </div>
          <a href="#" class="d-block my-auto link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="images/dp.jpg" alt="mdo" class="rounded-circle" width="32" height="32">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

    <header class="" >
      <div
        id="carouselExampleControls"
        class="carousel slide"
        data-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <section class="py-3 hero mt-2">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 my-auto">
                    <h1 class="display-5 font-weight-bold">
                      boAt Rockerz 400 On- Ear Headphones with 8 Hours Battery
                    </h1>
                    <p>
                      Enjoy your music while you stay on the move with boAt
                      Rockerz 400; it’s time for Super Extra Bass. Equipped with
                      40mm Dynamic Audio Drivers, soak up each moment of the
                      immersive audio experience.
                    </p>
                    <button class="btn-hov">Buy Now</button>
                    <button class="btn-hov mx-3">Learn More</button>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="images/boat.jpg" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="carousel-item ">
            <section class="py-3 hero mt-2">
              <div class="container">
                <div class="row">
                  <div class="col-6 my-auto">
                    <h1 class="display-5 font-weight-bold">
                      2020 Apple MacBook Air (13.3-inch/33.78 cm, Apple M1 chip
                      with 8‑core CPU)
                    </h1>
                    <p>
                      Apple-designed M1 chip for a giant leap in CPU, GPU, and
                      machine learning performance Go longer than ever with up
                      to 18 hours of battery life 8-core CPU delivers up to 3.5x
                      faster performance to tackle projects faster than ever.
                    </p>
                    <button class="btn-hov">Buy Now</button>
                    <button class="btn-hov mx-3">Learn More</button>
                  </div>
                  <div class="col-6">
                    <img src="images/macbook.jpg" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="carousel-item">
            <section class="py-3 hero mt-2">
              <div class="container">
                <div class="row">
                  <div class="col-6 my-auto">
                    <h1 class="display-5 font-weight-bold">
                      Apple AirPods with Charging Case
                    </h1>
                    <p>
                      AirPods with Charging Case: More than 24 hours listening
                      time, up to 18 hours talk time , AirPods (single charge):
                      Up to 5 hours listening time,1 up to 3 hours talk time or
                      15 minutes in the case equals up to 3 hours listening time
                      or up to 2 hours talk time.
                    </p>
                    <button class="btn-hov">Buy Now</button>
                    <button class="btn-hov mx-3">Learn More</button>
                  </div>
                  <div class="col-6">
                    <img src="images/airpods.jpg" class="card-img-top" alt="" />
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleControls"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <section class="bg-white" id="service" data-aos="fade-down">
      <h1 class="text-center display-2 py-5" >Services</h1>
      <div style="padding: 5rem 0">
      
      <div class="row container mx-auto">
        
        <!-- card section -->
        <div
          class="col-lg-3 col-md-3 col-sm-12 py-3 mx-auto"
          style="width: 18rem"
        >
          <div class="card p-0 rounded-3" data-aos="flip-right">
            <img src="images/c1.jpg" class="card-img-top" alt="card-img-top" />
            <div class="card-body text-center d-block py-5">
              <p class="card-text">
                free Delivery For All Orders on orders over 500
              </p>
            </div>
            <div
              class="card-body rounded-bottom"
              style="background-color: #f13030"
            >
              <h5 class="card-title text-center text-white">Free Shipping</h5>
            </div>
          </div>
        </div>

        <div
          class="col-lg-3 col-md-3 col-sm-12 py-3 mx-auto"
          style="width: 18rem"
        >
          <div class="card p-0 rounded-3" data-aos="flip-right">
            <img src="images/c2.jpg" class="card-img-top" alt="card-img-top" />
            <div class="card-body text-center d-block py-5">
              <p class="card-text">
                30 days money back Guarantee for all users.
              </p>
            </div>
            <div
              class="card-body rounded-bottom"
              style="background-color: #6411ad"
            >
              <h5 class="card-title text-center text-white font-">
                Money Guarantee
              </h5>
            </div>
          </div>
        </div>

        <div
          class="col-lg-3 col-md-3 col-sm-12 py-3 mx-auto"
          style="width: 18rem"
        >
          <div class="card p-0 rounded-3" data-aos="flip-right">
            <img src="images/c3.jpg" class="card-img-top" alt="card-img-top" />
            <div class="card-body text-center d-block py-5">
              <p class="card-text">
                Friendly 24/7 Support Given To Our Valuable Customers.
              </p>
            </div>
            <div
              class="card-body rounded-bottom"
              style="background-color: #fdc500"
            >
              <h5 class="card-title text-center text-white">24/7 Support</h5>
            </div>
          </div>
        </div>

        <div
          class="col-lg-3 col-md-3 col-sm-12 py-3 mx-auto"
          style="width: 18rem"
        >
          <div class="card p-0 rounded-3" data-aos="flip-right">
            <img src="images/c4.jpg" class="card-img-top" alt="card-img-top" />
            <div class="card-body text-center d-block py-5">
              <p class="card-text">All cards Accepted By Elma Securely.</p>
            </div>
            <div
              class="card-body rounded-bottom"
              style="background-color: #036666"
            >
              <h5 class="card-title text-center text-white">Secure Payment</h5>
            </div>
          </div>
        </div>

        <!-- card section -->
      </div>
      </div>
    </section>
    </header>

    <main>
      <div class="products bg-white" id="product" data-aos="fade-down">
        <div class="text-center">
          <h1>Best Seller Products</h1>
          <p class="text-secondary">
            check our best seller products on Elma website right now
          </p>
        </div>

        <section>
        

    <div class="container mx-auto my-auto" >
      <div class="row">
        <?php
          $result = mysqli_query($con,"SELECT * FROM `items`");
          while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-lg-3 col-md-3 col-sm-12">
          <form action="" method="post">
            <div class="card">
              <input
                type="hidden"
                name="code"
                value="<?php echo $row['code']; ?>"
              />
              <img
                class="card-img-top image"
                src="primg/<?php echo $row['photo']; ?>"
              />
              <div class="card-body text-center">
                <p class="card-text"><?php echo $row['desc']; ?></p>
                <h6 class="card-title name">
                  <?php echo $row['title']; ?>
                </h6>
                <div class="d-flex my-auto p-2 justify-content-between">
                  <p class="card-text my-auto price">
                    ₹
                    <?php echo $row['price']; ?>
                  </p>
                  <p class="badge bg-danger my-auto">
                    <?php echo $row['rating']; ?>
                    <img src="icons/star.png" class="" height="15px" alt="" />
                  </p>
                </div>
                <div class="d-flex my-auto justify-content-between">
                  <button
                    class="btn-hov1 text-center"
                    type="submit"
                    name="addtocart"
                    value=""
                    id="addtocart"
                  >
                    Add To Cart
                  </button>
                  <button class="btn-hov1">Shop Now</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <?php
         }
	      	mysqli_close($con);
	    	?>
      </div>
    </div>

    <div style="clear: both"></div>

    <div class="message_box" style="margin: 10px 0px">
      <?php echo $status; ?>
    </div>
        </section>
      </div>
    </main>

    <section class="parallex">
      
        <div class="offer-div row mx-auto container my-auto">
          <div class="col-lg-6 col-md-6 col-sm-12 p-5 bg-white my-auto d-flex" data-aos="fade-down">
            <div class="my-auto">
              <p>New Collections,New Trendy</p>
              <h5>Smart Watches</h5>
              <p>Sale upto 25% off all in store</p>
            </div>
            <div>
              <img
                src="images/watch.jpg"
                class="img-fluid"
                width="300px"
                alt=""
              />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 p-5 my-auto bg-white mx-auto d-flex ml-3" data-aos="fade-down">
            <div class="my-auto">
              <p>Top Brands,lowest Prices</p>
              <h5>Smart Phones</h5>
              <p>Free shipping order over ₹ 1,000</p>
            </div>
            <div>
              <img
                src="images/mob-of.jpg"
                class="img-fluid"
                width="300px"
                alt=""
              />
            </div>
          </div>
        </div>
     
    </section>

    <section class="p-5 bg-white" id="contact" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="100"
     data-aos-offset="0">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- <img src="svg/c2.svg" class="img-fluid" alt="" /> -->
        <h2>Get In Touch</h2>
        <p class="py-3">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil tempore
          deleniti, officia vitae eligendi qui consequuntur ea cupiditate nobis
          labore suscipit ab alias corrupti culpa aliquid nesciunt similique
          laborum consequatur.
        </p>

        <div class="py-4">
          <div class="d-flex py-2">
            <img src="icons/mail.svg" height="28px" alt="">
            <p class="px-3">Elma@mail.com</p>
          </div>
          <div class="d-flex py-2">
            <img src="icons/mob.svg" height="28px" alt="">
            <p class="px-3">+91 1234567890</p>
          </div>
          <div class="d-flex py-2">
            <img src="icons/location.svg" height="28px" alt="">
            <p class="px-3">123, Jabalpur, MadhyaPradesh</p>
          </div>
        </div>

      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 p-5 position-relative" >
        <div class="bg-white p-5 w-75 shadow-lg position-absolute">
        <h2>Say Something</h2>
        <form action="mailto:mukeshbarman243@gmail.com" method="post" class="p-3 pb-4">
          <div class="form-group py-3">
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group py-3">
            <input type="email" class="form-control" placeholder="Your Mail">
          </div>
          <div class="form-group py-3">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message"></textarea>
          </div>

          <button type="submit" class="outline-hov">Send</button>
          
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<footer style="padding-top:10rem; background-color: #ec4067;"> 
  <div class="" >
  <div class="container text-white">
  <div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117371.05679944839!2d79.8987123286932!3d23.175837426248282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae1a0fb6a97d%3A0x44020616bc43e3b9!2sJabalpur%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1627478976891!5m2!1sen!2sin" width="350" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-lg-4 col-md-4 my-auto col-sm-12">
    <h3>Elma</h3>
    <p class="text-center">If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we make it easy to find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops, cell phones, tablets and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>

    </div>
    <div class="col-lg-4 col-md-4 my-auto col-sm-12 text-center">
      <a href="" class="">
        <img src="icons/fb.svg" height="30px" alt="">
      </a>
      <a href="">
        <img src="icons/twitter.svg" height="30px" alt="">
      </a>
      <a href="">
        <img src="icons/linkin.svg" height="30px" alt="">
      </a>
    </div>
   
    <p class="text-center">
    © 2021 Elma. All rights reserved | Design by Mukesh Barman.
    </p>
  </div>
  </div>
  </div>
</footer>


    

    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="js/app.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 2000, // values from 0 to 3000, with step 50ms
      });
    </script>
  </body>
</html>
