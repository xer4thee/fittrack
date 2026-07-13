<?php

$hour = date("H");

if($hour < 12){

    $greeting = "Good Morning";

}elseif($hour < 18){

    $greeting = "Good Afternoon";

}else{

    $greeting = "Good Evening";

}

?>

<nav class="navbar">

    <div>

        <h2>

            <?= $greeting ?>,
            <?= htmlspecialchars($_SESSION["full_name"]) ?> 👋

        </h2>

        <small>

            <?= date("l, F j, Y"); ?>

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