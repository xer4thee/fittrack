<?php

require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";

?>

<link rel="stylesheet"
href="../../assets/css/dashboard.css">

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page">

<div class="page-header">

<h1>Members</h1>

<a href="create.php" class="btn">

+ Add Member

</a>

</div>

<table>

<thead>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Status</th>

<th>Trainer</th>

<th>Actions</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM members";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?= $row['member_id']?></td>

<td><?= $row['first_name']?> <?= $row['last_name']?></td>

<td><?= $row['email']?></td>

<td><?= $row['phone']?></td>

<td><?= $row['status']?></td>

<td><?= $row['trainer_id']?></td>

<td>

<a href="edit.php?id=<?= $row['member_id']?>">Edit</a>

|

<a href="delete.php?id=<?= $row['member_id']?>">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include "../../includes/footer.php"; ?>