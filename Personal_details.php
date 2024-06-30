<?php
  include "db_config.php";

  if (isset($_GET['duration'])) {
  // Getting Payment Information
  $userId = htmlspecialchars($_GET['userId']);
  $duration = htmlspecialchars($_GET['duration']);
  $startDate = htmlspecialchars($_GET['startDate']);
  $endDate = htmlspecialchars($_GET['endDate']);
  $downPayment = htmlspecialchars($_GET['downPayment']);
  $amountPerMonth = htmlspecialchars($_GET['amountPerMonth']);
  $remainingMonth = htmlspecialchars($_GET['remainingMonth']);
  $fullPrice = htmlspecialchars($_GET['fullPrice']);




  }

        // Check if 'selectedCar' parameter is present in the URL
        if (isset($_GET['selectedCar'])) {
            // Retrieve the 'selectedCar' parameter
            $selectedCar = htmlspecialchars($_GET['selectedCar']);
           
            // Display the retrieved parameter
            // echo "<p>duration: " . $endDate . "</p>";
        } else {
            echo "<p>No car selected.</p>";
        }

        // Checking if user has made payment
        if (isset($_GET['paid'])) {
          // Retrieve the 'selectedCar' parameter
          $payment_confirmation = htmlspecialchars($_GET['paid']);

          if($payment_confirmation == "paid"){
            // echo "<p>Payment Successful! Your car has been booked.</p>";
// Update the payment status in the databse
function update_personal_details_and_paymentinfo(){
  include "db_config.php";
  $sql = "UPDATE `personal_details_and_paymentinfo` SET `payment`= ?";

  $stmt = mysqli_stmt_init($conn);
  
  // Check if the SQL statement is valid
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      die(mysqli_error($conn));
  }
  
  mysqli_stmt_bind_param($stmt,"s", $payment_confirmation);
  
  // Execute the statement
  if ($stmt->execute()) {
      // echo "Updated";
       // Redirect user to home page
      //  header("location: Login.html");
  } else {
      echo "Error: " . $stmt->error;
  }
  
  // Close the statement and connection
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
update_personal_details_and_paymentinfo();
function update_payment(){
  $userId = htmlspecialchars($_GET['userId']);
  $duration = htmlspecialchars($_GET['duration']);
  $startDate = htmlspecialchars($_GET['startDate']);
  $endDate = htmlspecialchars($_GET['endDate']);
  $downPayment = htmlspecialchars($_GET['downPayment']);
  $amountPerMonth = htmlspecialchars($_GET['amountPerMonth']);
  $remainingMonth = htmlspecialchars($_GET['remainingMonth']);
  include "db_config.php";
$sql = "INSERT INTO payments (id, duration, start_date, end_date, down_payment, amount_per_month, remaining_payment) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

// Check if the SQL statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"sissiii", $userId, $duration, $startDate, $endDate, $downPayment, $amountPerMonth, $remainingMonth);

// Execute the statement
if ($stmt->execute()) {
    // echo "User registered successfully.";
     
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and conn

mysqli_stmt_close($stmt);
mysqli_close($conn);
}
update_payment();

function update_balance(){
  $userId = htmlspecialchars($_GET['userId']);
  $duration = htmlspecialchars($_GET['duration']);
  // $startDate = htmlspecialchars($_GET['startDate']);
  // $endDate = htmlspecialchars($_GET['endDate']);
  $downPayment = htmlspecialchars($_GET['downPayment']);
  $amountPerMonth = htmlspecialchars($_GET['amountPerMonth']);
  $fullPrice = htmlspecialchars($_GET['fullPrice']);


  $ap_plus_dp = (int)$amountPerMonth + (int)$downPayment;
  $new_amount_remaining = (int)$fullPrice - (int)$ap_plus_dp;
  include "db_config.php";
$sql = "INSERT INTO balance (id, duration, total_amount_to_be_paid, amount_per_month, ap_plus_dp, amount_remaining) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

// Check if the SQL statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"ssiiii", $userId, $duration, $fullPrice, $amountPerMonth, $ap_plus_dp, $new_amount_remaining);

// Execute the statement
if ($stmt->execute()) {
    // echo "User registered successfully.";
     
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and conn

mysqli_stmt_close($stmt);
mysqli_close($conn);
}
update_balance();
}

      else {
          // echo "<p>No car selected.</p>";
      }


        include "db_config.php";

        
    }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peronal Details</title>
    <link rel="stylesheet" href="Perosnal_details.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <script src="https://checkout.flutterwave.com/v3.js"></script>
  </head>
  <body>
    <nav>
      <div class="links_and_logo">
        <div>
          <h1>DeX.</h1>
        </div>
      </div>
      <div class="buttons">
        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31.3608 16.7686L29.4359 16.7805L29.404 11.6531C29.3915 9.63883 28.5794 7.71202 27.1462 6.29655C25.7131 4.88108 23.7763 4.0929 21.762 4.1054C19.7478 4.11791 17.8209 4.93007 16.4055 6.36322C14.99 7.79637 14.2018 9.73312 14.2143 11.7474L14.2462 16.8748L12.3212 16.8867C11.1609 16.894 10.051 17.3618 9.23562 18.1873C8.42025 19.0129 7.96623 20.1285 7.97344 21.2888L8.0561 34.6061C8.06653 35.7654 8.53539 36.8734 9.36023 37.6881C10.1851 38.5027 11.2988 38.9578 12.4582 38.9538L31.4978 38.8356C32.6571 38.8252 33.7651 38.3564 34.5798 37.5315C35.3945 36.7067 35.8495 35.5929 35.8456 34.4336L35.7629 21.1163C35.7557 19.956 35.2879 18.8461 34.4623 18.0307C33.6368 17.2154 32.5211 16.7614 31.3608 16.7686ZM15.9643 11.7365C15.9547 10.1864 16.5612 8.69588 17.6506 7.59295C18.7399 6.49002 20.2227 5.86499 21.7729 5.85537C23.3231 5.84575 24.8136 6.45232 25.9165 7.54164C27.0194 8.63097 27.6444 10.1138 27.6541 11.664L27.6859 16.7914L15.9961 16.8639L15.9643 11.7365ZM34.0956 34.4444C34.0953 35.1392 33.8214 35.806 33.3332 36.3003C32.845 36.7946 32.1817 37.0768 31.4869 37.0857L12.4473 37.2039C11.7525 37.2036 11.0858 36.9297 10.5915 36.4415C10.0971 35.9532 9.81496 35.2899 9.80606 34.5952L9.7234 21.278C9.71908 20.5818 9.99149 19.9124 10.4807 19.4171C10.9699 18.9217 11.6359 18.641 12.3321 18.6367L31.3717 18.5185C32.0679 18.5142 32.7373 18.7866 33.2326 19.2758C33.7279 19.7651 34.0086 20.431 34.0129 21.1272L34.0956 34.4444Z" fill="#0074D9"/>
            <path d="M23.6521 26.6516C23.6557 26.9577 23.5774 27.2592 23.4251 27.5248C23.2729 27.7904 23.0524 28.0104 22.7864 28.162L22.8027 30.7869C22.8042 31.019 22.7133 31.2421 22.5503 31.4072C22.3872 31.5723 22.1652 31.6659 21.9332 31.6673C21.7011 31.6688 21.478 31.578 21.3129 31.4149C21.1478 31.2518 21.0542 31.0299 21.0527 30.7978L21.0365 28.1728C20.7686 28.0246 20.5454 27.8073 20.3899 27.5436C20.2344 27.2799 20.1523 26.9794 20.1521 26.6733C20.1492 26.2092 20.3309 25.7629 20.657 25.4327C20.9831 25.1025 21.4271 24.9154 21.8912 24.9125C22.3553 24.9096 22.8016 25.0912 23.1318 25.4173C23.462 25.7435 23.6492 26.1875 23.6521 26.6516Z" fill="#0074D9"/>
            </svg>
            
        </svg>
        <p>Secure Checkout</p>
      </div>
    </nav>
    <section class="cars_deatils_nav_section">
    <?php 
   $sql = "SELECT * FROM vehicles WHERE id = $selectedCar";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
    $price =$row["price"];
    $formattedPrice = number_format($price);
    echo "<div class='car_details'>
            <img src='".$row["img"]."' width='200px' height='100px' style='object-fit: cover; transform: scaleX(-1);' alt=''>
            <div>
                <h2>₦$formattedPrice</h2>
                <p>".$row["name"]."</p>
            </div>
        </div>";
   }
  ?>
        <!-- <div class="car_details">
            <img src="uploads/landcruiser.png" width="200px" height="100px" style="object-fit: cover; transform: scaleX(-1);" alt="">
            <div>
                <h2>₦83,925,000</h2>
                <p>Land Cruiser</p>
            </div>
        </div> -->
        <a href="" class="go_backbutton">
            <div>
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M36 18C36 27.9411 27.9411 36 18 36C8.05887 36 0 27.9411 0 18C0 8.05887 8.05887 0 18 0C27.9411 0 36 8.05887 36 18Z" fill="#ECF5FA"/>
                    <path d="M19.4732 23.4166C19.3273 23.4161 19.183 23.386 19.049 23.3283C18.9149 23.2706 18.7939 23.1864 18.6933 23.0808L14.5116 18.7475C14.3131 18.545 14.2019 18.2727 14.2019 17.9891C14.2019 17.7056 14.3131 17.4333 14.5116 17.2308L18.8449 12.8975C18.9459 12.7964 19.0658 12.7163 19.1978 12.6617C19.3298 12.607 19.4712 12.5789 19.6141 12.5789C19.7569 12.5789 19.8984 12.607 20.0304 12.6617C20.1623 12.7163 20.2822 12.7964 20.3832 12.8975C20.4843 12.9985 20.5644 13.1184 20.619 13.2504C20.6737 13.3823 20.7018 13.5238 20.7018 13.6666C20.7018 13.8095 20.6737 13.9509 20.619 14.0829C20.5644 14.2149 20.4843 14.3348 20.3832 14.4358L16.8083 18L20.2533 21.575C20.455 21.7779 20.5683 22.0525 20.5683 22.3387C20.5683 22.6249 20.455 22.8995 20.2533 23.1025C20.1507 23.2042 20.0289 23.2844 19.895 23.3383C19.761 23.3923 19.6176 23.4189 19.4732 23.4166Z" fill="black"/>
                    </svg>
                    
                <p>Go back</p>
               </div>
        </a>

    </section>
    <hr />
    <section class="half_sections">
    <section class="first_half_section">
        <div class="process">
            <div class="process_row">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.125C14.4647 0.125 11.0087 1.17335 8.06919 3.13748C5.12966 5.10161 2.83858 7.8933 1.48566 11.1595C0.132745 14.4258 -0.22124 18.0198 0.468471 21.4872C1.15818 24.9547 2.86061 28.1397 5.36047 30.6395C7.86034 33.1394 11.0454 34.8418 14.5128 35.5315C17.9802 36.2212 21.5742 35.8673 24.8405 34.5143C28.1067 33.1614 30.8984 30.8703 32.8625 27.9308C34.8267 24.9913 35.875 21.5353 35.875 18C35.87 13.2608 33.9851 8.71712 30.634 5.36599C27.2829 2.01487 22.7392 0.130005 18 0.125ZM25.8478 14.8478L16.2228 24.4728C16.0951 24.6007 15.9435 24.7021 15.7766 24.7713C15.6096 24.8405 15.4307 24.8761 15.25 24.8761C15.0693 24.8761 14.8904 24.8405 14.7235 24.7713C14.5565 24.7021 14.4049 24.6007 14.2772 24.4728L10.1522 20.3478C9.89419 20.0898 9.74924 19.7399 9.74924 19.375C9.74924 19.0101 9.89419 18.6602 10.1522 18.4022C10.4102 18.1442 10.7601 17.9992 11.125 17.9992C11.4899 17.9992 11.8398 18.1442 12.0978 18.4022L15.25 21.5561L23.9022 12.9022C24.0299 12.7744 24.1816 12.6731 24.3485 12.604C24.5154 12.5348 24.6943 12.4992 24.875 12.4992C25.0557 12.4992 25.2346 12.5348 25.4015 12.604C25.5684 12.6731 25.7201 12.7744 25.8478 12.9022C25.9756 13.0299 26.0769 13.1816 26.146 13.3485C26.2152 13.5154 26.2508 13.6943 26.2508 13.875C26.2508 14.0557 26.2152 14.2346 26.146 14.4015C26.0769 14.5684 25.9756 14.7201 25.8478 14.8478Z" fill="#0074D9"/>
                    </svg>
                    <div class="process_row_details">
                        <h2>Create Account</h2>
                        <p>Should take around 3 minutes</p>
                    </div>
                    
              </div>
              <div class="process_line">
                <svg width="2" height="52" viewBox="0 0 2 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.75" y1="3.27836e-08" x2="0.749998" y2="52" stroke="#A1BFE2" stroke-width="1.5"/>
                    </svg>
                    
              </div>
        </div>

        <div class="after_process">
            <div class="process_row">
                <div id="second_process">
                    <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37 19C37 28.9411 28.9411 37 19 37C9.05887 37 1 28.9411 1 19C1 9.05887 9.05887 1 19 1C28.9411 1 37 9.05887 37 19Z" fill="#ECF5FA"/>
                        <path d="M21.352 18.896L18.056 22.528H23.144V24H15.768V22.672L19.56 18.608C20.2427 17.8933 20.728 17.312 21.016 16.864C21.304 16.4053 21.448 15.9307 21.448 15.44C21.448 14.864 21.24 14.3893 20.824 14.016C20.4187 13.632 19.912 13.44 19.304 13.44C18.3227 13.44 17.368 13.888 16.44 14.784L15.56 13.648C16.7013 12.528 17.96 11.968 19.336 11.968C20.4133 11.968 21.2933 12.2933 21.976 12.944C22.6587 13.5947 23 14.4533 23 15.52C23 16.5653 22.4507 17.6907 21.352 18.896Z" fill="#1565C4"/>
                        <path d="M19 37.5C29.2173 37.5 37.5 29.2173 37.5 19C37.5 8.78273 29.2173 0.5 19 0.5C8.78273 0.5 0.5 8.78273 0.5 19C0.5 29.2173 8.78273 37.5 19 37.5Z" stroke="#ABC9E9"/>
                        </svg>
                </div>
                
                    <div class="check" id="check">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 0.125C14.4647 0.125 11.0087 1.17335 8.06919 3.13748C5.12966 5.10161 2.83858 7.8933 1.48566 11.1595C0.132745 14.4258 -0.22124 18.0198 0.468471 21.4872C1.15818 24.9547 2.86061 28.1397 5.36047 30.6395C7.86034 33.1394 11.0454 34.8418 14.5128 35.5315C17.9802 36.2212 21.5742 35.8673 24.8405 34.5143C28.1067 33.1614 30.8984 30.8703 32.8625 27.9308C34.8267 24.9913 35.875 21.5353 35.875 18C35.87 13.2608 33.9851 8.71712 30.634 5.36599C27.2829 2.01487 22.7392 0.130005 18 0.125ZM25.8478 14.8478L16.2228 24.4728C16.0951 24.6007 15.9435 24.7021 15.7766 24.7713C15.6096 24.8405 15.4307 24.8761 15.25 24.8761C15.0693 24.8761 14.8904 24.8405 14.7235 24.7713C14.5565 24.7021 14.4049 24.6007 14.2772 24.4728L10.1522 20.3478C9.89419 20.0898 9.74924 19.7399 9.74924 19.375C9.74924 19.0101 9.89419 18.6602 10.1522 18.4022C10.4102 18.1442 10.7601 17.9992 11.125 17.9992C11.4899 17.9992 11.8398 18.1442 12.0978 18.4022L15.25 21.5561L23.9022 12.9022C24.0299 12.7744 24.1816 12.6731 24.3485 12.604C24.5154 12.5348 24.6943 12.4992 24.875 12.4992C25.0557 12.4992 25.2346 12.5348 25.4015 12.604C25.5684 12.6731 25.7201 12.7744 25.8478 12.9022C25.9756 13.0299 26.0769 13.1816 26.146 13.3485C26.2152 13.5154 26.2508 13.6943 26.2508 13.875C26.2508 14.0557 26.2152 14.2346 26.146 14.4015C26.0769 14.5684 25.9756 14.7201 25.8478 14.8478Z" fill="#0074D9"/>
                            </svg>
                    </div>
                    <div class="process_row_details">
                        <h2>Personal details</h2>
                        <p>Should take around 3 minutes</p>
                    </div>
                    
              </div>
              <div class="process_line">
                <svg width="2" height="52" viewBox="0 0 2 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0.75" y1="3.27836e-08" x2="0.749998" y2="52" stroke="#A1BFE2" stroke-width="1.5"/>
                    </svg>
                    
              </div>
        </div>

        <div class="after_process">
            <div class="process_row">
            <div class="third_process" id="third_process">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M37 19C37 28.9411 28.9411 37 19 37C9.05887 37 1 28.9411 1 19C1 9.05887 9.05887 1 19 1C28.9411 1 37 9.05887 37 19Z" fill="#ECF5FA"/>
                    <path d="M18.968 24.192C17.688 24.192 16.4773 23.8027 15.336 23.024L16.056 21.728C17.1013 22.3893 18.0667 22.72 18.952 22.72C19.688 22.72 20.2693 22.5387 20.696 22.176C21.1333 21.8027 21.352 21.312 21.352 20.704C21.352 20.096 21.1227 19.6 20.664 19.216C20.216 18.832 19.6347 18.64 18.92 18.64H17.464V17.216H18.904C19.5547 17.216 20.088 17.04 20.504 16.688C20.92 16.3253 21.128 15.8613 21.128 15.296C21.128 14.7307 20.9307 14.2827 20.536 13.952C20.1413 13.6107 19.6347 13.44 19.016 13.44C18.1947 13.44 17.3307 13.7867 16.424 14.48L15.608 13.36C16.0347 12.9333 16.5627 12.5973 17.192 12.352C17.832 12.096 18.4827 11.968 19.144 11.968C20.2 11.968 21.0693 12.2667 21.752 12.864C22.424 13.4507 22.76 14.192 22.76 15.088C22.76 15.7173 22.5733 16.2773 22.2 16.768C21.8267 17.2587 21.3307 17.6 20.712 17.792V17.856C21.416 18.016 21.976 18.3627 22.392 18.896C22.808 19.4187 23.016 20.0373 23.016 20.752C23.016 21.7653 22.6373 22.592 21.88 23.232C21.1333 23.872 20.1627 24.192 18.968 24.192Z" fill="#1565C4"/>
                    <path d="M19 37.5C29.2173 37.5 37.5 29.2173 37.5 19C37.5 8.78273 29.2173 0.5 19 0.5C8.78273 0.5 0.5 8.78273 0.5 19C0.5 29.2173 8.78273 37.5 19 37.5Z" stroke="#ABC9E9"/>
                    </svg>                    
                </div>
                <div class="check" id="check2">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 0.125C14.4647 0.125 11.0087 1.17335 8.06919 3.13748C5.12966 5.10161 2.83858 7.8933 1.48566 11.1595C0.132745 14.4258 -0.22124 18.0198 0.468471 21.4872C1.15818 24.9547 2.86061 28.1397 5.36047 30.6395C7.86034 33.1394 11.0454 34.8418 14.5128 35.5315C17.9802 36.2212 21.5742 35.8673 24.8405 34.5143C28.1067 33.1614 30.8984 30.8703 32.8625 27.9308C34.8267 24.9913 35.875 21.5353 35.875 18C35.87 13.2608 33.9851 8.71712 30.634 5.36599C27.2829 2.01487 22.7392 0.130005 18 0.125ZM25.8478 14.8478L16.2228 24.4728C16.0951 24.6007 15.9435 24.7021 15.7766 24.7713C15.6096 24.8405 15.4307 24.8761 15.25 24.8761C15.0693 24.8761 14.8904 24.8405 14.7235 24.7713C14.5565 24.7021 14.4049 24.6007 14.2772 24.4728L10.1522 20.3478C9.89419 20.0898 9.74924 19.7399 9.74924 19.375C9.74924 19.0101 9.89419 18.6602 10.1522 18.4022C10.4102 18.1442 10.7601 17.9992 11.125 17.9992C11.4899 17.9992 11.8398 18.1442 12.0978 18.4022L15.25 21.5561L23.9022 12.9022C24.0299 12.7744 24.1816 12.6731 24.3485 12.604C24.5154 12.5348 24.6943 12.4992 24.875 12.4992C25.0557 12.4992 25.2346 12.5348 25.4015 12.604C25.5684 12.6731 25.7201 12.7744 25.8478 12.9022C25.9756 13.0299 26.0769 13.1816 26.146 13.3485C26.2152 13.5154 26.2508 13.6943 26.2508 13.875C26.2508 14.0557 26.2152 14.2346 26.146 14.4015C26.0769 14.5684 25.9756 14.7201 25.8478 14.8478Z" fill="#0074D9"/>
                            </svg>
                    </div>
                    <div class="process_row_details">
                        <h2>Payment details</h2>
                        <p>Should take around 3 minutes</p>
                    </div>
                    
              </div>
        </div>
      
    </section>
    <section class="second_half_section">
        <div id="details_form">
            <h1>Personal details</h1>
            <p>Please check these details match your driving license</p>
            <form id="form" action="fill_personal_details_payment_form.php" method="post" enctype="multipart/form-data">
               <label for="title">Title</label>
               <p>We need this for the car’s paperwork</p>
               <select required name="title" id="">
                   <option value="Select Title">Select a title</option>
                   <option value="Mr">Mr</option>
                   <option value="Mr">Mrs</option>
                   <option value="Mr">Miss</option>
               </select>
       
               <label for="firstname">First name</label>
               <input required type="text" name="firstname">
               <label for="lastname">Last name</label>
               <input  required type="text" name="lastname">
               <label for="mobile number">Mobile Number</label>
               <p>So we can contact you about your car</p>
               <input required type="text" name="mobile_number">
               <label for="home address">Home address</label>
               <p>So we can deliver your car if you choose home delivery</p>
               <input required type="address" name="home_address">
               <?php 
               echo "<input type='text' hidden name='selectedCar' value='$selectedCar'>";
               echo "<input type='text' hidden name='userId' value='$userId'>";
               echo "<input type='text' hidden name='duration' value='$duration'>";
               echo "<input type='text' hidden name='startDate' value='$startDate'>";
               echo "<input type='text' hidden name='endDate' value='$endDate'>";
               echo "<input type='text' hidden name='downPayment' value='$downPayment'>";
               echo "<input type='text' hidden name='amountPerMonth' value='$amountPerMonth'>";
               echo "<input type='text' hidden name='remainingMonth' value='$remainingMonth'>";
               echo "<input type='text' hidden name='fullPrice' value='$fullPrice'>";
               ?>
               <button type="submit" id="continue_button">Continue</button>
            </form>
        </div>

        <div id="details_form2">
            <h1>Payment details</h1>
            
            <form id="form2" >
               <label for="title">Payment method</label>
               <div class="card_payment_method">
               <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 17.625C2 18.3212 2.27656 18.9889 2.76884 19.4812C3.26113 19.9734 3.92881 20.25 4.625 20.25H20.375C21.0712 20.25 21.7389 19.9734 22.2312 19.4812C22.7234 18.9889 23 18.3212 23 17.625V10.4062H2V17.625ZM5.09375 14.0625C5.09375 13.6895 5.24191 13.3319 5.50563 13.0681C5.76935 12.8044 6.12704 12.6562 6.5 12.6562H8.75C9.12296 12.6562 9.48065 12.8044 9.74437 13.0681C10.0081 13.3319 10.1562 13.6895 10.1562 14.0625V15C10.1562 15.373 10.0081 15.7306 9.74437 15.9944C9.48065 16.2581 9.12296 16.4062 8.75 16.4062H6.5C6.12704 16.4062 5.76935 16.2581 5.50563 15.9944C5.24191 15.7306 5.09375 15.373 5.09375 15V14.0625ZM20.375 3.75H4.625C3.92881 3.75 3.26113 4.02656 2.76884 4.51884C2.27656 5.01113 2 5.67881 2 6.375V7.59375H23V6.375C23 5.67881 22.7234 5.01113 22.2312 4.51884C21.7389 4.02656 21.0712 3.75 20.375 3.75Z" fill="black"/>
</svg>
               <p>Card</p>
               </div>
       
               <label for="firstname">Name on card</label>
               <input required type="text" name="name_on_card" placeholder="Jon Smith" style="font-family: 'Poppins', sans-serif;">
               <label for="lastname">Card number</label>
               <input  required type="text" name="card_number" placeholder="0000 0000 0000 0000" style="font-family: 'Poppins', sans-serif;">
               <div class="EX_date_and_SC_code">
                <div class="EX">
                <label for="mobile number">Expiry date</label>
                <input required type="text" name="EX_date" placeholder="MM / YY" style="font-family: 'Poppins', sans-serif;">
                </div>
              <div class="SC">
              <label for="home address">Security code</label>
              <input required type="address" name="SC_code" placeholder="CVV" style="font-family: 'Poppins', sans-serif;">
              </div>
               
               </div>

               
               
               <?php 
               echo "<input type='text' hidden name='selectedCar' value='$selectedCar'>";
               echo "<input type='text' hidden name='userId' value='$userId'>";
               echo "<input type='text' hidden name='duration' value='$duration'>";
               echo "<input type='text' hidden name='startDate' value='$startDate'>";
               echo "<input type='text' hidden name='endDate' value='$endDate'>";
               echo "<input type='text' hidden name='downPayment' value='$downPayment'>";
               echo "<input type='text' hidden name='amountPerMonth' value='$amountPerMonth'>";
               echo "<input type='text' hidden name='remainingMonth' value='$remainingMonth'>";
               ?>
               <button  id="continue_button2">Continue</button>
            </form>
        </div>

        <!-- <div class="paymentgateway">
            <div>Your order is ₦2,500</div>
            <button type="button" id="start-payment-button" onclick="makePayment()">
              Pay Now
            </button>
        </div> -->
    
    </section>
</section>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <script src="animate.js"></script>
    <!-- <script src="flutterwavePayment.js"></script> -->
  </body>
</html>
