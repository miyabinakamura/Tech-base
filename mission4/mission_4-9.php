<?php
    $dsn = 'でえたべえす';
    $user = 'ゆうざあ';
    $password = 'ぱすわあど';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = 'DROP TABLE tbtest';
    $stmt = $pdo->query($sql);
?>
