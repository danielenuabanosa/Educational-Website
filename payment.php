<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id'];

    include 'includes/db.php';
    $conn->query("INSERT INTO enrollments (user_id, course_id) VALUES ($user_id, $course_id)");
    echo "<script>alert('Payment Successful! Course enrolled.'); window.location.href='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Complete Your Payment</h2>
    <form method="POST" action="payment.php">
        <label>Choose Course:</label>
        <select name="course_id" class="form-control">
            <?php
            include 'includes/db.php';
            $result = $conn->query("SELECT * FROM courses");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['title']} - \${$row['price']}</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-success mt-3">Pay Now</button>
    </form>
</div>
</body>
</html>
