<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=perpustakaan_nindy', 'asynnd', '1sampai8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>