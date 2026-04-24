<?php
session_start();
if($_SESSION['role'] != "admin"){
  echo "Access Denied";
  exit;
}

$orders = json_decode(file_get_contents("data/orders.json"), true);
$messages = json_decode(file_get_contents("data/messages.json"), true);
?>

<h2>Admin Dashboard</h2>

<h3>Orders</h3>
<?php foreach($orders as $o){ ?>
<p><?php echo $o['user']." - ".$o['plan']; ?></p>
<?php } ?>

<h3>Messages</h3>
<?php foreach($messages as $m){ ?>
<p><?php echo $m['user']." : ".$m['message']; ?></p>
<?php } ?>