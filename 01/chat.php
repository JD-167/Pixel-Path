<?php
session_start();
include "utils.php";

if(isset($_POST['msg'])){
    $messages = readJSON("data/messages.json");

    $messages[] = [
        "user" => $_SESSION['user'] ?? "guest",
        "message" => $_POST['msg']
    ];

    writeJSON("data/messages.json", $messages);
}

$messages = readJSON("data/messages.json");
?>

<!DOCTYPE html>
<html>
<head>
<title>Chat</title>
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

<h2 style="text-align:center;">Chat With Us</h2>

<div class="chat-box">
<?php foreach($messages as $m){ ?>
<p><b><?php echo $m['user']; ?>:</b> <?php echo $m['message']; ?></p>
<?php } ?>
</div>

<form method="POST">
<input type="text" name="msg">
<button class="btn">Send</button>
</form>

</body>
</html>