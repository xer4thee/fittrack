<?php
require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";
?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">
<link rel="stylesheet" href="../../assets/css/style.css">

<?php

$totalMembers = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM members")
)['total'];

$activeMembers = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM members WHERE status='active'")
)['total'];

$totalPlans = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM plans")
)['total'];

$totalPayments = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS total FROM payments")
)['total'];

$monthlyRevenue = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT IFNULL(SUM(amount),0) AS total
        FROM payments
        WHERE MONTH(payment_date)=MONTH(CURDATE())
        AND YEAR(payment_date)=YEAR(CURDATE())
    ")
)['total'];

$todayAttendance = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT COUNT(*) AS total
        FROM attendance
        WHERE DATE(check_in_time)=CURDATE()
    ")
)['total'];

?>

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page">

<div class="page-header">

<h1>Reports</h1>

</div>

<div class="cards">

<div class="card">
<h4>Total Members</h4>
<h2><?= $totalMembers ?></h2>
</div>

<div class="card">
<h4>Active Members</h4>
<h2><?= $activeMembers ?></h2>
</div>

<div class="card">
<h4>Membership Plans</h4>
<h2><?= $totalPlans ?></h2>
</div>

<div class="card">
<h4>Total Payments</h4>
<h2><?= $totalPayments ?></h2>
</div>

<div class="card">
<h4>Monthly Revenue</h4>
<h2>₱<?= number_format($monthlyRevenue,2) ?></h2>
</div>

<div class="card">
<h4>Today's Attendance</h4>
<h2><?= $todayAttendance ?></h2>
</div>

</div>

<p style="margin-top:30px;color:#6b7280;">

Generated on

<?= date("F j, Y h:i A"); ?>

</p>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>