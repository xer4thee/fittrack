<?php

require "../../config/database.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn,

"DELETE FROM members WHERE member_id=?"

);

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

header("Location:index.php");

exit();