<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

$email = $_POST['email'];
$password = $_POST['password'];

// Get user by email
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){
    $user = $result->fetch_assoc();

    // 🔐 Verify password
    if(password_verify($password, $user['password'])){
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p style='color:red;text-align:center;'>Wrong Password</p>";
    }

} else {
    echo "<p style='color:red;text-align:center;'>User not found</p>";
}
}
?>