<nav class="navbar">

    <div>

        <h2>Dashboard</h2>

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