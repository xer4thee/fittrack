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

    <div class="page-top">

        <div>

            <h1>Membership Plans</h1>

            <p>Create and manage available gym membership plans.</p>

        </div>

        <a href="create.php" class="btn">

            + Add Plan

        </a>

    </div>

    <form method="GET" class="search-form">

        <input
            type="text"
            name="search"
            placeholder="Search membership plan..."
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

        <button class="btn">

            Search

        </button>

    </form>

    <div class="table-card">

    <table>

        <thead>

        <tr>

            <th>Plan Name</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>

        </thead>

        <tbody>

<?php

if(isset($_GET['search']) && $_GET['search']!=""){

    $search=mysqli_real_escape_string($conn,$_GET['search']);

    $sql="

    SELECT *

    FROM plans

    WHERE

    plan_name LIKE '%$search%'

    ORDER BY plan_id DESC";

}else{

    $sql="

    SELECT *

    FROM plans

    ORDER BY plan_id DESC";

}

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){

?>

<tr>

<td colspan="5" style="text-align:center;padding:30px;">

No membership plans found.

</td>

</tr>

<?php

}

while($plan=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?= htmlspecialchars($plan['plan_name']) ?>

</td>

<td>

<?= $plan['duration_days'] ?> Days

</td>

<td>

₱<?= number_format($plan['price'],2) ?>

</td>

<td>

<span class="status">

<?= ucfirst($plan['status']) ?>

</span>

</td>

<td>

<a
class="btn-edit"
href="edit.php?id=<?= $plan['plan_id'] ?>">

Edit

</a>

<a
class="btn-delete"
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