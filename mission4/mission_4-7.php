<?php
    $dsn = 'mysql:dbname=tb240114db;host=localhost';
    $user = 'tb-240114';
    $password = 'BCv2fzmudA';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //テーブル名（項目名　データ型、項目名、データ型）
    //id, name, comment という項目をテーブルに作る
    //INT：整数型　 AUTO_INCREMENT：連続した数値を生成 PRIMARY KEY：重複する値を生成しない
    //char(32)：32桁の文字列
    //TEXT：可変長の文字列
    $sql = "CREATE TABLE IF NOT EXISTS tbtest"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name char(32),"
    . "comment TEXT"
    .");";
    //インスタンスー＞メソッド（）：（）にあるSQLをデータベースに対して発行する
    $stmt = $pdo->query($sql);
    
    $id = 1; //変更する投稿番号
    $name = "なまえ";
    $comment = "こめんと"; 
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $sql = 'SELECT * FROM tbtest';
    //$stmtにはqueryで発行したSQLの結果が代入されている
    //PDOStatementと呼ばれる。DBからの情報をPHPで出力するために必要なものが返される
    $stmt = $pdo->query($sql);
    //fetchALL:該当するすべてのデータを配列として返す
    $results = $stmt->fetchAll();
    foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    echo "<hr>";
    }
?>