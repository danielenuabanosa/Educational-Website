<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand mx-3" href="#">Student Dashboard</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</nav>

<div class="container mt-5">
    <h2>Your Enrolled Courses</h2>
    <ul>
        <?php
        include 'includes/db.php';
        $user_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT c.title FROM enrollments e JOIN courses c ON e.course_id = c.id WHERE e.user_id = $user_id");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['title']}</li>";
        }
        ?>
    </ul>
</div>
</body>
</html>
