<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Get the user by username only
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL Prepare Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $username);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Check if account is active
        if ($user["status"] !== "active") {
            die("Account is inactive.");
        }

        // Verify password
        if (password_verify($password, $user["password"])) {

            // Login successful
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["full_name"] = $user["full_name"];
            $_SESSION["role"] = $user["role"];

            header("Location: ../dashboard/dashboard.php");
            exit();

        } else {

            header("Location: ../login.php?error=password");
            exit();

        }

    } else {

        header("Location: ../login.php?error=username");
        exit();

    }

} else {

    header("Location: ../login.php");
    exit();

}