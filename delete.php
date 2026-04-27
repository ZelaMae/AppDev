<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting student!";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
