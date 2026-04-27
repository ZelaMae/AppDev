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
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><link rel="stylesheet" href="style.css"></head><body><div class="container"><div class="alert alert-error">Error deleting student!</div><a href="index.php">&larr; Back to List</a></div></body></html>';
    }
} else {
    header("Location: index.php");
    exit();
}
?>
