<?php

require "../../config/database.php";

$stmt = mysqli_prepare($conn, "

UPDATE members

SET

first_name=?,

last_name=?,

email=?,

phone=?,

gender=?,

status=?

WHERE member_id=?

");

mysqli_stmt_bind_param(

$stmt,

"ssssssi",

$_POST['first_name'],

$_POST['last_name'],

$_POST['email'],

$_POST['phone'],

$_POST['gender'],

$_POST['status'],

$_POST['member_id']

);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();