<?php
require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";
?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">
<link rel="stylesheet" href="../../assets/css/style.css">

<div class="layout">

<?php include "../../includes/sidebar.php"; ?>

<div class="content">

<?php include "../../includes/navbar.php"; ?>

<div class="page-top">

    <div>

        <h1>Members Management</h1>

        <p>
            Manage registered gym members efficiently.
        </p>

    </div>

    <div>

        <a href="create.php" class="btn">

            <span class="material-symbols-rounded">

            person_add

            </span>

            Add Member

        </a>

    </div>

</div>

    <?php if(isset($_GET['success'])): ?>

    <div class="success-message">

        <?php

        switch($_GET['success']){

            case "added":
                echo "✅ Member added successfully!";
                break;

            case "updated":
                echo "✏️ Member updated successfully!";
                break;

            case "deleted":
                echo "🗑️ Member deleted successfully!";
                break;

        }

        ?>

    </div>

    <?php endif; ?>

  <form method="GET" class="search-form">

<div class="search-box">

<span class="material-symbols-rounded">

search

</span>

<input
type="text"
name="search"
placeholder="Search members..."
value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

</div>

<button class="btn">

Search

</button>

</form>

    <div class="table-card">

    <table>

        <thead>

        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>

        </thead>

        <tbody>

<?php

if(isset($_GET['search']) && $_GET['search']!=""){

    $search=mysqli_real_escape_string($conn,$_GET['search']);

    $sql="

    SELECT *

    FROM members

    WHERE

    first_name LIKE '%$search%'

    OR

    last_name LIKE '%$search%'

    ORDER BY member_id DESC";

}else{

    $sql="

    SELECT *

    FROM members

    ORDER BY member_id DESC";

}

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0){

?>

<tr>

<td colspan="6" style="text-align:center;padding:30px;">

No members found.

</td>

</tr>

<?php

}

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?>

</td>

<td>

<?= htmlspecialchars($row['email']) ?>

</td>

<td>

<?= htmlspecialchars($row['phone']) ?>

</td>

<td>

<?= ucfirst($row['gender']) ?>

</td>

<td>

<span class="status status-active">

<?= ucfirst($row['status']) ?>

</span>

</td>

<td>

<a
class="btn-edit"
href="edit.php?id=<?= $row['member_id'] ?>">

<span class="material-symbols-rounded">

edit

</span>

Edit

</a>

<a
class="btn-delete"
href="delete.php?id=<?= $row['member_id'] ?>"
onclick="return confirm('Delete this member?')">

<span class="material-symbols-rounded">

delete

</span>

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

</div>

<?php include "../../includes/footer.php"; ?>