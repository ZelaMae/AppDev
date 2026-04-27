<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Student List</h1>
<a href="create.php" style="margin-bottom:18px;display:inline-block;">Add New Student</a>
<script>
function deleteItem(id) {
  if (confirm("Are you sure you want to delete this?")) {
  window.location.href = "delete.php?id=" + id;
  }
}
</script>
<table>
  <tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
  </tr>
  <?php foreach ($students as $s): ?>
  <tr>
    <td><?= $s['id'] ?></td>
    <td><?= htmlspecialchars($s['name']) ?></td>
    <td><?= htmlspecialchars($s['email']) ?></td>
    <td><?= htmlspecialchars($s['course']) ?></td>
    <td>
      <a href="edit.php?id=<?= $s['id'] ?>">Edit</a>
      <button onclick="deleteItem(<?= $s['id'] ?>)">Delete</button>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
</body>
</html>