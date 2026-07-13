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

<h1>Payments</h1>

<a href="create.php" class="btn">

+ Record Payment

</a>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>Member</th>
<th>Plan</th>
<th>Amount</th>
<th>Payment Date</th>
<th>Expiration</th>
<th>Method</th>

</tr>

</thead>

<tbody>

<?php

$sql = "

SELECT

payments.*,

members.first_name,

members.last_name,

plans.plan_name

FROM payments

JOIN members

ON payments.member_id = members.member_id

JOIN plans

ON payments.plan_id = plans.plan_id

ORDER BY payment_id DESC

";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?>

</td>

<td>

<?= htmlspecialchars($row['plan_name']) ?>

</td>

<td>

₱<?= number_format($row['amount'],2) ?>

</td>

<td>

<?= $row['payment_date'] ?>

</td>

<td>

<?= $row['expiration_date'] ?>

</td>

<td>

<?= ucfirst($row['payment_method']) ?>

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