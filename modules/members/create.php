<?php

require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";

?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page">

<div class="page-header">

<h1>Add Member</h1>

</div>

<form action="store.php" method="POST" class="member-form">

<label>First Name</label>
<input type="text" name="first_name" required>

<label>Last Name</label>
<input type="text" name="last_name" required>

<label>Email</label>
<input type="email" name="email">

<label>Phone</label>
<input type="text" name="phone">

<label>Gender</label>

<select name="gender">

<option>male</option>
<option>female</option>
<option>other</option>

</select>

<label>Birthdate</label>

<input type="date" name="birthdate">

<label>Status</label>

<select name="status">

<option>active</option>

<option>inactive</option>

<option>expired</option>

</select>

<button class="btn">

Save Member

</button>

</form>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>