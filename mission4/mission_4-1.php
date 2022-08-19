<?php
  //データソース名
  $dsn = 'でえたべえす';
  //ユーザー名
  $user = 'ゆうざあ';
  //パスワード
  $password = 'ぱすわあど';
  //array...エラーを出すためのオプション
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>
