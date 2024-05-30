<?php
// Start session
session_start();



// Connect to your MySQL database
$mysqli = new mysqli("localhost", "root", "", "dex_hire_purchase");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);    
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement to retrieve hashed password
$stmt = $mysqli->prepare("SELECT id, email, fullname, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

// Bind the result
$stmt->bind_result($id, $email, $fullname, $hashed_password);

// Fetch the result
$stmt->fetch();

// Verify the password
if (password_verify($password, $hashed_password)) {
    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $email;
    $_SESSION["fullname"] = $fullname;

    // Redirect user to home page
    header("location: Home.html");
} else {
    // Redirect user back to login page with error message
    header("location: Login.html?error=1");
    // echo "<p>wrong details</p>";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>

