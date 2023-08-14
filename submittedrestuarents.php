<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>
            submitted recipes
        </title>
        <style>
            .card{
                width:300px;
            }
        </style>
    </head>
    <body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hostname = "localhost";
    $username = "root";
    $dbpassword = "";  
    $dbname = "users";

    $recipeName = $_POST["ta-1"];
    $ingrediants = $_POST["ta-2"];
    $instructions = $_POST["ta-3"];

    $conn = new mysqli($hostname, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO recipes(recipeName, ingrediants, instructions)
            VALUES ('$recipeName', '$ingrediants', '$instructions')";
    if ($conn->query($sql) === TRUE) {
        echo"<center><h1>your recipe submitted successfully</h1></center>";
        echo"<center><h3>THANK YOU</h3></center>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    exit();
}
?>
        <div class="card mt-4">
            <div class="card-body">
                <div class="card-title">
                    <h2>Recipe Name</h2>
                    <?php 
                    $recipeName = $_POST["ta-1"];
                    echo "<h3>" . $recipeName . "</h3>";
                    ?>
                </div>
                <div class="card-text">
                    <h2>Ingrediants</h2>
                    <?php 
                    $ingredients = $_POST["ta-2"];
                    echo "<p>" . $ingredients . "</p>";
                    ?>
                </div>
                <div class="card-text">
                    <h2>Instructions</h2>
                    <?php 
                    $instructions = $_POST["ta-3"];
                    echo "<p>" . $instructions . "</p>";
                    ?>
                </div>
                <button id="homeButton" class="btn btn-primary">HOME</button>
<script>
var homeButton = document.getElementById("homeButton");
homeButton.addEventListener("click", function() {
    window.location.href = "./Home.html";
});
</script>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
