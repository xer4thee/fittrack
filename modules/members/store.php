<?php

require "../../config/database.php";

$first=$_POST['first_name'];
$last=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$status=$_POST['status'];

$sql="INSERT INTO members(

first_name,

last_name,

email,

phone,

gender,

birthdate,

status

)

VALUES(?,?,?,?,?,?,?)";

$stmt=mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param(

$stmt,

"sssssss",

$first,

$last,

$email,

$phone,

$gender,

$birthdate,

$status

);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();