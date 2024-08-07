
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing mainlogout</title>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
  <link rel="stylesheet" href="../css/landingPage.css">

</head>
<body>
    <video autoplay loop muted class="bvid">
        <source src="../videos/pexels-cottonbro-studio-3196248-1920x1080-25fps.mp4" type="video/mp4">
      </video>
  <header class="bs">
    <div class="logo-container">
        <div class="logo">M<span>y</span> Ho<span>tel</span></div>
        <img class="logo-image" src="../IMAGES/logo.png" alt="Logo Image">
      </div>
    <div class="navigation">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
      <a href="#gallary">Gallary</a>
      <button class="btnLogin-popup" onclick="logout()">Logout</button>
    </div>
  </header>
  <div class="main">
    <div class="welcome">
        <h1>Booking Successful!!</h1>
        <p>We care for people so they can be their best</p>
    </div>
</div>
    <div class="box-container">
        <div class="gallary">
            <h2 id="gallary">Our Hotel Gallery</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto omnis atque perspiciatis, reprehenderit alias architecto, esse ipsa dolores pariatur, voluptas fuga nisi aut. Aliquid cupiditate impedit error ullam odio itaque?</p>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/gallery.jpg" alt="Hotel gallery" />
            </div>
            <div class="info">
                <h3 class="title">Hotel Gallery</h3>
                <div class="subInfo">
                    <span>The perfect place to getaways</span>
                </div>

            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/services.jpg" alt="our service" />
            </div>
            <div class="info">
                <h3 class="title">Service</h3>
                <div class="subInfo">
                    <span>Comfort is more important</span>
                </div>

            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/livingroom1.jpg" alt="Living room1" />
            </div>
            <div class="info">
                <h3 class="title">Living Room</h3>
                <div class="subInfo">
                    <span>Start here! New Living</span>
                </div>

            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/livingroom 2.jpg" alt="Luxuary" />
            </div>
            <div class="info">
                <h3 class="title">Next Space View</h3>
                <div class="subInfo">
                    <span>Stay once, carry memories forever</span>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/kitchen.jpg" alt="Kitchen" />
            </div>
            <div class="info">
                <h3 class="title">Kitchen</h3>
                <div class="subInfo">
                    <span>One Step close to paradise</span>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../IMAGES/meal Style.jpg" alt="Meal" />
            </div>
            <div class="info">
                <h3 class="title">Food</h3>
                <div class="subInfo">
                    <span>eat drink & marry</span>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/bath.jpg" alt="Bath" />
            </div>
            <div class="info">
                <h3 class="title">Water Closet</h3>
                <div class="subInfo">
                    <span>Never just stay</span>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="../IMAGES/swimmingPool1.jpg" alt="Swimming Pool" />
            </div>
            <div class="info">
                <h3 class="title">Swimming Poool</h3>
                <div class="subInfo">
                    <span>enjoy the thrill with hotels</span>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="../IMAGES/antique collection.jpg "alt="Antique Collection" />
            </div>
            <div class="info">
                <h3 class="title">Antique Collections </h3>
                <div class="subInfo">
                    <span>Grace and pride of our hotel</span>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<footer>
    <p>M<span>y</span> Ho<span>tel</span></p>
    <p>
      For more info about us - please click on the link <br> below
      to subscribe our channel:
    </p>
    <div class="social">
      <a href="https://web.facebook.com/umair.shabbir.9022/"
        ><i class="fab fa-facebook-f"></i
      ></a>
      <a href="https://www.instagram.com/umair.7912/"
        ><i class="fab fa-instagram"></i
      ></a>
     
    </div>
    <p class="end">@CopyRight By My Hotel</p>
  </footer>
  <!-- ---------------  -->
  <script>
function logout() {
  // Send a request to the server to destroy sessions
  <?php session_destroy(); ?>

  // Redirect to the landingpage.php
  window.location.href = "landingPage.php";
}
</script>
</body>
</html>
