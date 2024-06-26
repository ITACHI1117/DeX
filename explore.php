<?php
        // Check if 'selectedCar' parameter is present in the URL
        if (isset($_GET['selectedCar'])) {
            // Retrieve the 'selectedCar' parameter
            $selectedCar = htmlspecialchars($_GET['selectedCar']);
            // Display the retrieved parameter
            // echo "<p>Selected Car: " . $selectedCar . "</p>";
        } else {
            echo "<p>No car selected.</p>";
        }

        include "db_config.php";

        

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Photo Grid Layout</title>
    <link rel="stylesheet" href="exploreStyle.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <h3>Land Cruiser | 2024</h2>
      <span class="payment_option_button" id="show_payment_modal">See Payment Options</span>
    </nav>
    <section>
      <h1>Photos</h1>
    

<div class="photo-grid">
  <div class="first-box">
    <div class="item1"><img src="./uploads/4runner1.png" alt="Photo 1" /></div>
    <div class="first-box-column">
      <div class="item2"><img src="./uploads/4runner2.png" alt="Photo 2" /></div>
      <div class="item3">
        <img src="./uploads/4runner3.png" alt="4runner3" />
      </div>
    </div>
   
  </div>
  <div class="second-box">
    <div class="item4">
      <img src="./uploads/4runner4.png" alt="4runner4" />
    </div>
  </div>

  <div class="third-box">
    <div class="item1">
      <img src="./uploads/4runner5.png" alt="4runner5" />
    </div>
    <div class="third-box-column">
      <div class="item2"> <img src="./uploads/4runner6.png" alt="4runner6" /></div>

    </div>
   
  </div>
    </div> 
    <div class="pay" id="show_payment_modal">
     <button id="show_payment_modal">See Payment Options</button>
    </div>
  </section>

  <div class="Modal" id="Modal">
    <div class="nav">
      <p>Payment Estimator</p>
      <div class="cancel_button" id="cancel_button">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
      </svg>
      </div>
      
    </div>
    <hr>
    <div class="divider">
<div class="first_section">
  <?php 
   $sql = "SELECT year,name FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    echo "<h3>".$row["year"]." ".$row["name"]."</h3>";
   }
  ?>
  
  <div class="price_range_row">
    <p id="pay_monthly">PAY MONTHLY</p>
    <p id="pay_full">PAY IN FULL</p>
  </div>
  
  <div class="back_gray" id="payment_plan">
  <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<h1>₦$formattedPrice</h1>";
   
    echo "<p>Estimated Selling Price = ₦$formattedPrice</p>";
   }
  ?>
    <!-- <h1>₦26,410,000</h1> -->
    <!-- <p>Estimated Selling Price = ₦26,410,000</p> -->
    <p class="bold_bottom">*We accept Visa and Mastercard debit cards.</p>
  </div>
  <div class="back_gray2" id="payment_plan2">
  <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $newprice = $row["price"]/36;
    $formattedPrice = number_format($newprice);
    echo "<h1 id='calculated_price'>₦$formattedPrice<span>/mo</span></h1>";
      }
  ?>
    <!-- <h1 id="calculated_price">₦733,611<span>/mo</span></h1> -->
    <p id="month_term">36 month term and 11.4% APR</p>
    <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<p>Estimated Selling Price = ₦$formattedPrice </p>";
      }
  ?>
    
    <div class="down_payment">
      <p>Down Payment</p>
      <div class="down_payment_box">₦3,800,000</div>
    </div>
    <div class="bold_bottom">
      <p>Terms in Months</p>
      <div class="month_box_row">
        <ul class="month_box_row" id="month_list">
<!-- Items will be created dynamically -->
        </ul>
      </div>
     
    </div>
  </div>
</div>

<div class="first_section">
  <!-- <h3>2024 Land Cruiser</h3> -->
  <!-- One time payment summary -->
  <div class="price_summary" id="price_summary">
    <p>PRICING SUMMARY</p>
    <div class="price_row_summary">
   <p>Price of car</p>
   <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<p>₦$formattedPrice</p>";
    echo "<p style='display:none;' id='price_form_database'>$price</p>";
   }
  ?>
   <!-- <p>₦26,410,000</p> -->
    </div>
    <div class="price_row_summary">
     <p>Total amount payable</p>
     <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<p>₦$formattedPrice</p>";
   }
  ?>
     <!-- <p>₦26,410,000</p> -->
      </div>
      <div id="buy_now_button1" class="buy_now_button">
        
      </div>
  </div>


  <!-- MOnthly price summary -->
  <div class="price_summary" id="price_summary2">
    <p>PRICING SUMMARY</p>
    <div class="price_row_summary">
   <p>Down Payment</p>
   <p>₦3,800,000</p>
    </div>
    <div class="price_row_summary">
   <p>Monthly Payment Of</p>
   <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $newprice = $row["price"]/36;
    $formattedPrice = number_format($newprice);
    echo "<p id='monthly_payment'>₦$formattedPrice</p>";
   }
  ?>
   <!-- <p id="monthly_payment">₦738,283</p> -->
    </div>
    <div class="price_row_summary">
   <p>Amount of interest</p>
   <p>₦3,987,188</p>
    </div>
    <div class="price_row_summary">
   <p>Price of car</p>
   <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<p>₦$formattedPrice</p>";
   }
  ?>
   <!-- <p>₦26,410,000</p> -->
    </div>
    <div class="price_row_summary">
     <p>Total amount payable</p>
     <?php 
   $sql = "SELECT price FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<p>₦$formattedPrice</p>";
   }
  ?>
     <!-- <p>₦26,410,000</p> -->
      </div>
      
  </div>
  <div id="buy_now_button" class="buy_now_button">
    
  </div>
  
</div>
    </div>
  </div>

    <footer>
      <div class="terms">
        <p>©2024 DeX, Inc.</p>
        <p>English</p>
        <p>Terms & Privacy</p>
        <p>Privacy Policy</p>
      </div>
      <div class="logos">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          fill="white"
          class="bi bi-facebook"
          viewBox="0 0 16 16"
        >
          <path
            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          fill="white"
          class="bi bi-twitter-x"
          viewBox="0 0 16 16"
        >
          <path
            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"
          />
        </svg>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          fill="white"
          class="bi bi-instagram"
          viewBox="0 0 16 16"
        >
          <path
            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
          />
        </svg>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>
