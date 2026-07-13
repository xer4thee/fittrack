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

            <small>+18 this month</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                payments
            </span>

            <h4>Monthly Revenue</h4>


            <h2>₱<?= number_format($monthlyRevenue,2) ?></h2>

            <small>+12% from June</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                event_available
            </span>

            <h4>Today's Attendance</h4>

            <h2><?= $todayAttendance ?></h2>

            <small>Currently inside gym</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                warning
            </span>

            <h4>Expiring Soon</h4>

            <h2><?= $expiring ?></h2>

            <small>Within 7 days</small>

        </div>

    </div>

</section>

</div>
</div>

<?php include("../includes/footer.php"); ?>