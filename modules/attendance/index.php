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

<div class="page-header">

<h1>Attendance</h1>

<a href="create.php" class="btn">
+ Check In
</a>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>Member</th>
<th>Check In</th>
<th>Check Out</th>

</tr>

</thead>

<tbody>

<?php

$sql = "

SELECT attendance.*,
members.first_name,
members.last_name

FROM attendance

JOIN members
ON attendance.member_id = members.member_id

ORDER BY attendance_id DESC

";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?>

</td>

<td>

<?= $row['check_in_time'] ?>

</td>

<td>

<?= $row['check_out_time'] ?? "-" ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>