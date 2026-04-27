<?php
require 'db.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES (:name, :email, :course)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['name' => $name, 'email' => $email, 'course' => $course])) {
        $msg = '<div class="alert alert-success">Student added successfully!</div>';
    } else {
        $msg = '<div class="alert alert-error">Error adding student!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Add Student</h1>
<a href="index.php">&larr; Back to List</a>
<?= $msg ?>
<form method="POST">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="course" placeholder="Course" required>
    <button type="submit">Add Student</button>
</form>
</div>
</body>
</html>