<?php

require "../../config/database.php";

$member = $_POST['member_id'];
$plan = $_POST['plan_id'];
$method = $_POST['payment_method'];

$stmt=mysqli_prepare($conn,

"SELECT duration_days,price FROM plans WHERE plan_id=?"

);

mysqli_stmt_bind_param($stmt,"i",$plan);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

$planData=mysqli_fetch_assoc($result);

$duration=$planData['duration_days'];
$amount=$planData['price'];

$paymentDate=date("Y-m-d");

$expirationDate=date(

"Y-m-d",

strtotime("+{$duration} days")

);

$stmt=mysqli_prepare($conn,

"INSERT INTO payments(

member_id,

plan_id,

amount,

payment_date,

expiration_date,

payment_method

)

VALUES(?,?,?,?,?,?)"

);

mysqli_stmt_bind_param(

$stmt,

"iidsss",

$member,

$plan,

$amount,

$paymentDate,

$expirationDate,

$method

);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();