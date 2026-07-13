<?php

require "../config/session.php";
require "../config/database.php";

// Total Active Members
$memberQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM members WHERE status='active'");
$totalMembers = mysqli_fetch_assoc($memberQuery)['total'];

// Monthly Revenue
$revenueQuery = mysqli_query($conn, "
    SELECT IFNULL(SUM(amount),0) AS revenue
    FROM payments
    WHERE MONTH(payment_date)=MONTH(CURDATE())
    AND YEAR(payment_date)=YEAR(CURDATE())
");
$monthlyRevenue = mysqli_fetch_assoc($revenueQuery)['revenue'];

// Today's Attendance
$attendanceQuery = mysqli_query($conn,"
    SELECT COUNT(*) AS total
    FROM attendance
    WHERE DATE(check_in_time)=CURDATE()
");
$todayAttendance = mysqli_fetch_assoc($attendanceQuery)['total'];

// Expiring Within 7 Days
$expireQuery = mysqli_query($conn,"
    SELECT COUNT(*) AS total
    FROM payments
    WHERE expiration_date
    BETWEEN CURDATE()
    AND DATE_ADD(CURDATE(),INTERVAL 7 DAY)
");

$expiring = mysqli_fetch_assoc($expireQuery)['total'];

?>
<?php include("../includes/header.php"); ?>

<link rel="stylesheet"
href="../assets/css/dashboard.css">

<div class="layout">

<?php include("../includes/sidebar.php"); ?>

<div class="content">

<?php include("../includes/navbar.php"); ?>

<section class="dashboard">

    <div class="cards">

        <div class="card">

            <span class="material-symbols-rounded icon">
                group
            </span>

            <h4>Active Members</h4>

            <h2><?= $totalMembers ?></h2>

            <small>Live Member Count</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                payments
            </span>

            <h4>Monthly Revenue</h4>


            <h2>₱<?= number_format($monthlyRevenue,2) ?></h2>

            <small>Updated Automatically</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                event_available
            </span>

            <h4>Today's Attendance</h4>

            <h2><?= $todayAttendance ?></h2>

            <small>Today's Check-ins</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                warning
            </span>

            <h4>Expiring Soon</h4>

            <h2><?= $expiring ?></h2>

            <small>Upcoming Renewals</small>

        </div>

    </div>

</section>
<section class="dashboard">

<div class="table-card">

<h2 style="padding:25px;">

Recent Activity

</h2>

<table>

<thead>

<tr>

<th>Activity</th>

<th>Date</th>

</tr>

</thead>

<tbody>

<tr>

<td>

Member records managed through the system

</td>

<td>

<?= date("M d, Y") ?>

</td>

</tr>

<tr>

<td>

Membership payments recorded

</td>

<td>

<?= date("M d, Y") ?>

</td>

</tr>

<tr>

<td>

Attendance logs updated

</td>

<td>

<?= date("M d, Y") ?>

</td>

</tr>

</tbody>

</table>

</div>

</section>

</div>
</div>

<?php include("../includes/footer.php"); ?>