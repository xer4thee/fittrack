<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="assets/css/login.css">

<div class="login-container">

    <div class="login-card">

       <div class="logo">

    <img src="assets/images/logo.svg" class="brand-logo" alt="FitTrack Logo">

    <h1>FitTrack</h1>

    <p>Train Hard. Track Smarter.</p>
    <p class="system-version">

Gym Membership Management System

</p>

</div>

       <form action="config/auth.php" method="POST">

            <div class="input-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required>

            </div>

            <div class="input-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required>

            </div>

            <button type="submit">

                Login

            </button>

        </form>

        <small>

            FitTrack Gym Membership Management System

        </small>

    </div>

</div>

<?php include "includes/footer.php"; ?>