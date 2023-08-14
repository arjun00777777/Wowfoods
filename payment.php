<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        #quantity {
            border: none;
            width: 20px;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Payment Details</h1>
        <?php 
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["buyNow"]))
        {
            $item = $_POST["noodles"];
            $price = $_POST["price"];
            echo"<h2 id=\"item\">ITEM:$item</h2>";
            echo"<h2 id = \"finalPrice\">PRICE:$price</h2>";
        }
        ?>
        <form>
            <label>Quantity</label>
            <button class="bg-danger" id="decrement" name="dec">-</button>
            <input type="number" id="quantity" name="quantities" value="1"/>
            <button class="bg-success" id="increment" name="inc">+</button><br/>
            <button type="submit" name="finalBuy" id="final">Buy Now</button>
        </form>
    </div>
    <div class="container mt-4">
    <p id="finals"> Selecet a payment method</p>
    <img src="https://d13dtqinv406lk.cloudfront.net/company/images/17538.png" alt="phonepe" width="150px" height="150px"/>
    <img src="https://tse3.mm.bing.net/th?id=OIP.vvjW70E8oriIas_xAcAoaAHaGo&pid=Api&P=0&h=180" alt="phonepe" width="150px" height="150px"/>
    <p>Scan the QR and pay</p>
    <img src="https://tse2.mm.bing.net/th?id=OIP.b51Dv6nVMjWntrwxD7VEiwHaHa&pid=Api&P=0&h=180" alt="QRcode"/>
    </div>
    <script>
    var decrement = document.getElementById("decrement");
    var increment = document.getElementById("increment");
    var quantityInput = document.getElementById("quantity");
    var finalBuy = document.getElementById("final");
    var finalPrice = document.getElementById("finalPrice"); 
    var item = document.getElementById("item"); 
    var currentValue = 1;
    decrement.addEventListener("click", function(event) {
        event.preventDefault();
        if (currentValue > 1) {
        currentValue--;
        quantityInput.value = currentValue;
        } else {
        alert("You should buy a minimum of 1 piece");
        }
    });
    increment.addEventListener("click", function(event) {
        event.preventDefault();
        currentValue++;
        quantityInput.value = currentValue;
    });
    finalBuy.addEventListener("click", function(event) {
        event.preventDefault();
        var fPrice = (finalPrice.innerText.split(":")[1]);
        var fItem = item.innerText.split(":")[1];
        var quantities = parseInt(quantityInput.value);
        var totalPrice = fPrice * quantities;
        var finalPay = document.getElementById("finals");
        finalBuy.innerHTML = "Total:" + totalPrice; 
    });
</script>
</body>
</html>
