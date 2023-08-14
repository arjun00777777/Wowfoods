<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userMobile = $_POST["userMobile"];
    $userPassword = $_POST["userPassword"];

    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "users";

    $conn = new mysqli($hostname, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO signupusers (userMobile, userPassword)
            VALUES ('$userMobile', '$userPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "you are not registered";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $verifyQuery = "SELECT mobile, pwd FROM registeredusers WHERE mobile = '$userMobile'";
    $verifyResult = $conn->query($verifyQuery);
    $verifySignupQuery = "SELECT userMobile, userPassword FROM signupusers WHERE userMobile = '$userMobile'";
    $verifySignupResult = $conn->query($verifySignupQuery);

    if ($verifyResult->num_rows > 0 && $verifySignupResult->num_rows > 0) {
        header("Location: Home.html");
        exit();
    }

    $conn->close();
}
?>
