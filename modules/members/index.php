<?php
require "../../config/session.php";
require "../../config/database.php";

include "../../includes/header.php";
?>

<link rel="stylesheet" href="../../assets/css/dashboard.css">

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

                $members = mysqli_query($conn,"SELECT * FROM members ORDER BY member_id DESC");

                while($row = mysqli_fetch_assoc($members)){

                ?>

                <tr>

                    <td><?= htmlspecialchars($row['first_name']." ".$row['last_name']) ?></td>

                    <td><?= htmlspecialchars($row['email']) ?></td>

                    <td><?= htmlspecialchars($row['phone']) ?></td>

                    <td><?= htmlspecialchars($row['gender']) ?></td>

                    <td><?= htmlspecialchars($row['status']) ?></td>

                    <td>

                        <a href="edit.php?id=<?= $row['member_id'] ?>">Edit</a>

                        |

                        <a href="delete.php?id=<?= $row['member_id'] ?>"
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