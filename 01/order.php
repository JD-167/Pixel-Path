<?php
session_start();
include "utils.php";

if(isset($_POST['submit'])){
    $orders = readJSON("data/orders.json");

    $orders[] = [
        "user" => $_SESSION['user'] ?? "guest",
        "plan" => $_POST['plan'],
        "details" => $_POST['details']
    ];

    writeJSON("data/orders.json", $orders);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Order</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<nav>
<h2>Portfolio Hub</h2>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="previews.php">Previews</a></li>
<li><a href="order.php">Order Now</a></li>
<li><a href="chat.php">Chat</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</nav>

<h2 style="text-align:center;">Order Portfolio</h2>

<form method="POST">
<select name="plan">
<option>Standard</option>
<option>Premium</option>
<option>Luxury</option>
</select>

<textarea name="details" placeholder="Describe your needs"></textarea>

<button name="submit" class="btn">Submit</button>
</form>

</body>
</html>