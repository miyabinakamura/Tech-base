<?php
    $dsn = 'mysql:dbname=tb240114db;host=localhost';
    $user = 'tb-240114';
    $password = 'BCv2fzmudA';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = 'DROP TABLE tbtest';
    $stmt = $pdo->query($sql);
?>