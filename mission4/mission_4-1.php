<?php
  //データソース名
  $dsn = 'mysql:dbname=tb240114db;host=localhost';
  //ユーザー名
  $user = 'tb-240114';
  //パスワード
  $password = 'BCv2fzmudA';
  //array...エラーを出すためのオプション
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>