<?php 
$page_title = "Dashboard";
include 'includes/header.php'; 
?>

<div class="container">
<h2>Dashboard</h2>

<?php
if(!isset($_SESSION['user'])){
header("Location: login.php");
exit();
}

$user = $_SESSION['user'];

if($user['role'] == 'admin'){
$result = $conn->query("SELECT * FROM orders");

while($row = $result->fetch_assoc()){
echo "<div class='card'>";
echo "<p><strong>Name:</strong> {$row['name']}</p>";
echo "<p><strong>Email:</strong> {$row['email']}</p>";
echo "<p><strong>Package:</strong> {$row['package']}</p>";
echo "<p>{$row['description']}</p>";
echo "</div>";
}
}else{
$stmt = $conn->prepare("SELECT * FROM orders WHERE email=?");
$stmt->bind_param("s",$user['email']);
$stmt->execute();

$res = $stmt->get_result();

while($row = $res->fetch_assoc()){
echo "<div class='card'>";
echo "<p><strong>Package:</strong> {$row['package']}</p>";
echo "<p>{$row['description']}</p>";
echo "</div>";
}
}
?>
</div>

<?php include 'includes/footer.php'; ?>