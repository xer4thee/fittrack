<?php

require "../config/session.php";

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

            <h2>245</h2>

            <small>+18 this month</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                payments
            </span>

            <h4>Monthly Revenue</h4>

            <h2>₱152,400</h2>

            <small>+12% from June</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                event_available
            </span>

            <h4>Today's Attendance</h4>

            <h2>89</h2>

            <small>Currently inside gym</small>

        </div>

        <div class="card">

            <span class="material-symbols-rounded icon">
                warning
            </span>

            <h4>Expiring Soon</h4>

            <h2>9</h2>

            <small>Within 7 days</small>

        </div>

    </div>

</section>

<?php include("../includes/footer.php"); ?>