<?php

require "../../config/database.php";

$stmt = mysqli_prepare(

$conn,

"INSERT INTO plans(

plan_name,

duration_days,

price,

description,

status

)

VALUES(?,?,?,?,?)"

);

mysqli_stmt_bind_param(

$stmt,

"sidss",

$_POST['plan_name'],

$_POST['duration_days'],

$_POST['price'],

$_POST['description'],

$_POST['status']

);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();