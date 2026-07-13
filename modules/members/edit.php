<?php

require "../../config/session.php";
require "../../config/database.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM members WHERE member_id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$member = mysqli_fetch_assoc($result);

include "../../includes/header.php";

?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page">

<h1>Edit Member</h1>

<form action="update.php" method="POST" class="member-form">

<input type="hidden" name="member_id" value="<?= $member['member_id'] ?>">

<label>First Name</label>
<input type="text" name="first_name" value="<?= htmlspecialchars($member['first_name']) ?>">

<label>Last Name</label>
<input type="text" name="last_name" value="<?= htmlspecialchars($member['last_name']) ?>">

<label>Email</label>
<input type="email" name="email" value="<?= htmlspecialchars($member['email']) ?>">

<label>Phone</label>
<input type="text" name="phone" value="<?= htmlspecialchars($member['phone']) ?>">

<label>Gender</label>

<select name="gender">

<option value="male" <?= $member['gender']=="male"?"selected":"" ?>>Male</option>

<option value="female" <?= $member['gender']=="female"?"selected":"" ?>>Female</option>

<option value="other" <?= $member['gender']=="other"?"selected":"" ?>>Other</option>

</select>

<label>Status</label>

<select name="status">

<option value="active" <?= $member['status']=="active"?"selected":"" ?>>Active</option>

<option value="inactive" <?= $member['status']=="inactive"?"selected":"" ?>>Inactive</option>

<option value="expired" <?= $member['status']=="expired"?"selected":"" ?>>Expired</option>

</select>

<button class="btn">

Update Member

</button>

</form>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>