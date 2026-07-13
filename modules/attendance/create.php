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

<h1>Member Check In</h1>

<form action="store.php" method="POST" class="member-form">

<label>Select Member</label>

<select name="member_id">

<?php

$members=mysqli_query($conn,
"SELECT * FROM members WHERE status='active'");

while($m=mysqli_fetch_assoc($members)){

?>

<option value="<?= $m['member_id']?>">

<?= $m['first_name']." ".$m['last_name'] ?>

</option>

<?php } ?>

</select>

<button class="btn">

Check In

</button>

</form>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>