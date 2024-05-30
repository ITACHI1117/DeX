<?php

// Generate a random ID
$random_id = uniqid();

// Add more uniqueness using additional characters
$random_id .= bin2hex(random_bytes(2)); // You can adjust the number of bytes for more randomness
// Connect to your MySQL database

$host ="localhost";
$dbname = "dex_hire_purchase";
$username = "root";
$password = "";

$connection = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if(mysqli_connect_error()){
    die("Connection error:" . mysqli_connect_error());
}

// Retrieve user input
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

if ($password == $confirmPassword){

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement
$sql = "INSERT INTO users (id, email, fullname, password) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connection);

// Check if the SQL statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($connection));
}

mysqli_stmt_bind_param($stmt,"ssss", $random_id, $email, $fullname, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    echo "User registered successfully.";
     // Redirect user to home page
     header("location: Login.html");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection

mysqli_stmt_close($stmt);
mysqli_close($connection);
}else{
    header("location: SignUp.html?error=1");
}

?>
