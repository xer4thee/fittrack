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

        <div class="page">

            <div class="page-header">

                <h1>Members</h1>

                <a href="create.php" class="btn">
                    + Add Member
                </a>

            </div>

            <?php if(isset($_GET['success'])): ?>

<div class="success-message">

<form method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Search by name..."
        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

    <button class="btn">

        Search

    </button>

</form>

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

        default:
            echo "Operation completed successfully!";
    }

    ?>

</div>

<?php endif; ?>

            <div class="table-card">

            <table>

                <thead>

                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                <?php

               if(isset($_GET['search']) && $_GET['search'] != ""){

    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $sql = "

    SELECT *

    FROM members

    WHERE

    first_name LIKE '%$search%'

    OR

    last_name LIKE '%$search%'

    ORDER BY member_id DESC

    ";

}else{

    $sql = "

    SELECT *

    FROM members

    ORDER BY member_id DESC

    ";

}

$members = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_assoc($members)){

                ?>

                <tr>

                    <td><?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?></td>

                    <td><?= htmlspecialchars($row['email']) ?></td>

                    <td><?= htmlspecialchars($row['phone']) ?></td>

                    <td><?= htmlspecialchars($row['gender']) ?></td>

                    <td><?= htmlspecialchars($row['status']) ?></td>

                    <td>

                       <a href="edit.php?id=<?= $row['member_id'] ?>" class="btn-edit">
               Edit  
    </a>

    <a href="delete.php?id=<?= $row['member_id'] ?>"
       class="btn-delete"
       onclick="return confirm('Delete this member?')">
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