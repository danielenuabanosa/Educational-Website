<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - Manage Courses</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand mx-3" href="#">Admin Panel</a>
</nav>

<div class="container mt-5">
    <h2>Manage Courses</h2>
    <a href="add_course.php" class="btn btn-primary mb-3">Add Course</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Title</th><th>Description</th><th>Price</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db.php';
            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>\${$row['price']}</td>
                        <td>
                            <a href='edit_course.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                            <a href='delete_course.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
