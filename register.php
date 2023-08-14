<?php
$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$mobileNumber = $_POST["mobile"];
$password = $_POST["pwd"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hostname = "localhost";
    $username = "root";
    $dbpassword = "";  
    $dbname = "users";

    $conn = new mysqli($hostname, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO registeredusers(fname, lname, mobile, pwd)
            VALUES ('$firstName', '$lastName', '$mobileNumber', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: signin.html");
    exit();
}
?>
