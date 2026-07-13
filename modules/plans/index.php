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

<h1>Membership Plans</h1>

<a href="create.php" class="btn">+ Add Plan</a>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>Plan</th>
<th>Duration</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$result = mysqli_query($conn,"SELECT * FROM plans ORDER BY plan_id DESC");

while($plan = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?= htmlspecialchars($plan['plan_name']) ?></td>

<td><?= $plan['duration_days'] ?> Days</td>

<td>₱<?= number_format($plan['price'],2) ?></td>

<td><?= ucfirst($plan['status']) ?></td>

<td>

<a class="btn-edit"
href="edit.php?id=<?= $plan['plan_id'] ?>">

Edit

</a>

<a class="btn-delete"
href="delete.php?id=<?= $plan['plan_id'] ?>"
onclick="return confirm('Delete this plan?')">

Delete

</a>

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