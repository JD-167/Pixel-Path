<?php 
include 'config.php';

if (!isset($page_title)) {
    $page_title = "Home";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PixelPath | <?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="preview.php">Preview</a>
    <a href="order.php">Order</a>
    <a href="about.php">About</a>

    <?php if(isset($_SESSION['user'])): ?>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
</nav>