<?php
$conn = new mysqli("localhost", "root", "", "portfolio_site");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

session_start();
?>