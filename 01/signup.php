<?php
include "db.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $plain_password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];

    if ($name == "" || $email == "" || $plain_password == "" || $confirm_password == "") {
        echo "<p style='color:red;'>All fields are required.</p>";
    } elseif ($plain_password != $confirm_password) {
        echo "<p style='color:red;'>Passwords do not match.</p>";
    } elseif ($role != "teacher" && $role != "student") {
        // echo "<p style='color:red;'>Invalid role selected.</p>";
    } else {
        $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");

        if (mysqli_num_rows($check_email) > 0) {
            echo "<script>
        alert('Email already exists');
        
    </script>";
        } else {
            $is_approved = ($role == "teacher") ? 0 : 1;

            $sql = "INSERT INTO users (name, email, password, role, is_approved)
                    VALUES ('$name', '$email', '$plain_password', '$role', $is_approved)";

            if (mysqli_query($conn, $sql)) {
                if ($role == "teacher") {
echo "<script>
        alert('Registration sucessfull . your account is in pending');
        
    </script>";                } else {
                    echo "<p>Registration successful. <a href='login.php'>Login here</a></p>";
                }
            } else {
                echo "<script>
        alert('Registration failed !');
        
    </script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-box">
        <h1>Register</h1>
        <p>Create your account as a teacher or student.</p>

        

        <form method="POST">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Role</label>
            <select name="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>

        <p class="small-text">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>