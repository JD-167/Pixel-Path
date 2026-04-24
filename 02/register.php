<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// ✅ Password validation
if(strlen($password) < 6){
    echo "<p style='color:red;text-align:center;'>Password must be at least 6 characters</p>";
} else {

    // 🔒 Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if($stmt->execute()){
        echo "<p style='text-align:center;'>Registered Successfully!</p>";
    } else {
        echo "<p style='color:red;text-align:center;'>Email already exists</p>";
    }
}
}
?>