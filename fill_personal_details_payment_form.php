<?php

function generateTextReferenceID($prefix = "REF") {
    // Generate a unique reference ID using the current timestamp and a random number
    $timestamp = time(); // Current Unix timestamp
    $randomNumber = mt_rand(1000, 9999); // Generate a random number between 1000 and 9999
    $referenceID = $prefix . $timestamp . $randomNumber; // Concatenate prefix, timestamp, and random number

    return $referenceID;
}

$random_id = generateTextReferenceID();

include "db_config.php";

// Retrieve user input
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mobile_number = $_POST['mobile_number'];
$home_address = $_POST['home_address'];
$selectedCar = $_POST['selectedCar'];


$ammount_paid = "";

$sql = "SELECT * FROM vehicles WHERE id = $selectedCar";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $car_name = $row['name'];
    $car_type = $row['type'];
    $car_year = $row['year'];
    $car_power = $row['power'];
    $car_transmission = $row['transmission'];
    $price = $row['price'];
    $payment = "Pending";
}


// Prepare SQL statement
$sql = "INSERT INTO personal_details_and_paymentinfo (id, title, firstname, lastname, mobile_number, home_address, car_name, car_type, car_year, car_power, car_transmission, price, payment, ammount_paid) 
VALUES (?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = mysqli_stmt_init($conn);

// Check if the SQL statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"ssssisssssssss", $random_id, $title, $firstname, $lastname, $mobile_number, $home_address, $car_name, $car_type, $car_year, $car_power, $car_transmission, $price, $payment, $ammount_paid);

// Execute the statement
if ($stmt->execute()) {
    // echo "saved  successfully.";
     // Redirect user to home page
    header("location: Personal_details.php?selectedCar=$selectedCar&userid=$random_id&form=submitted&paid=notPaid&price=$price&firstname=$firstname&lastname=$lastname&mobile_number=$mobile_number&home_address=$home_address&car_name=$car_name");


} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection

mysqli_stmt_close($stmt);
mysqli_close($conn);


?>
