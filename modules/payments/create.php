<?php

require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";

?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page">

<h1>Record Payment</h1>

<form action="store.php" method="POST" class="member-form">

<label>Member</label>

<select name="member_id">

<?php

$members=mysqli_query($conn,"SELECT * FROM members WHERE status='active'");

while($m=mysqli_fetch_assoc($members)){

?>

<option value="<?= $m['member_id'] ?>">

<?= $m['first_name']." ".$m['last_name'] ?>

</option>

<?php } ?>

</select>

<label>Membership Plan</label>

<select name="plan_id">

<?php

$plans=mysqli_query($conn,"SELECT * FROM plans WHERE status='active'");

while($p=mysqli_fetch_assoc($plans)){

?>

<option value="<?= $p['plan_id'] ?>">

<?= $p['plan_name'] ?>

</option>

<?php } ?>

</select>

<label>Payment Method</label>

<select name="payment_method">

<option value="cash">Cash</option>

<option value="gcash">GCash</option>

<option value="card">Card</option>

<option value="bank_transfer">Bank Transfer</option>

</select>

<button class="btn">

Record Payment

</button>

</form>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>