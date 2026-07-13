<?php

require "../../config/database.php";

$member_id = $_POST['member_id'];

$checkIn = date("Y-m-d H:i:s");

$stmt = mysqli_prepare(

$conn,

"INSERT INTO attendance(

member_id,

check_in_time

)

VALUES(?,?)"

);

mysqli_stmt_bind_param(

$stmt,

"is",

$member_id,

$checkIn

);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();