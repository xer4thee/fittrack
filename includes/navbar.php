<?php

$hour = date("H");

$greeting = "Good Evening";

if($hour < 12){

$greeting = "Good Morning";

}elseif($hour < 18){

$greeting = "Good Afternoon";

}

?>

<div>

<h2>

<?= $greeting ?>,

<?= htmlspecialchars($_SESSION['full_name']) ?> 👋

</h2>

<small>

<?= date("l, F j, Y"); ?>

</small>

</div>
<nav class="navbar">

    <div>

        <h2>

Good <?= date("H") < 12 ? "Morning" : (date("H") < 18 ? "Afternoon" : "Evening"); ?>,

<?= htmlspecialchars($_SESSION['full_name']); ?> 👋

</h2>

<small>

<?= date("l, F j, Y"); ?>

</small>

        <small>

            Welcome back,
            <?= htmlspecialchars($_SESSION["full_name"]) ?> 👋

        </small>

    </div>

    <div class="right">

        <div class="notification">

            🔔

        </div>

        <div class="avatar">

            <?= strtoupper(substr($_SESSION["full_name"],0,1)); ?>

        </div>

    </div>

</nav>