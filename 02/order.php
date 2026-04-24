<?php 
$page_title = "Order Now";
include 'includes/header.php'; 
?>

<div class="container">
<h2>Order Your Portfolio</h2>

<form method="POST">
<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>
<input name="phone" placeholder="Phone">

<select name="field">
<option>Filmmaker</option>
<option>Photographer</option>
<option>Designer</option>
</select>

<select name="package">
<option>Standard</option>
<option>Premium</option>
<option>Luxury</option>
</select>

<textarea name="description" placeholder="Describe your needs"></textarea>

<button type="submit">Submit</button>
</form>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$stmt = $conn->prepare("INSERT INTO orders (name,email,phone,field,package,description) VALUES (?,?,?,?,?,?)");

$stmt->bind_param("ssssss",
$_POST['name'],
$_POST['email'],
$_POST['phone'],
$_POST['field'],
$_POST['package'],
$_POST['description']
);

$stmt->execute();

echo "<p style='text-align:center;'>Order Submitted Successfully!</p>";
}
?>

<?php include 'includes/footer.php'; ?>