<?php
  //2DB接続設定
  $dsn = 'mysql:dbname=tb240114db;host=localhost';
  $user = 'tb-240114';
  $password = 'BCv2fzmudA';
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  $sql = "CREATE TABLE IF NOT EXISTS tbtest"
   ." ("
   . "id INT AUTO_INCREMENT PRIMARY KEY,"
   . "name char(32),"
   . "comment TEXT"
   .");";
  $stmt = $pdo->query($sql);
?>