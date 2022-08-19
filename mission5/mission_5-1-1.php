<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5-1-1</title>
</head>
<body>
<?php
    $dsn = 'mysql:dbname=tb240114db;host=localhost';
    $user = 'tb-240114';
    $password = 'BCv2fzmudA';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = "CREATE TABLE IF NOT EXISTS miyaa"
    ."("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"
    ."name char(32),"
    ."comment TEXT,"
    ."pass TEXT,"
    ."date DATETIME"
    .");";
    $stmt = $pdo->query($sql);
    

    //入力フォーム
    if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["pass"])){
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $pass = $_POST["pass"];
        $date = date("Y-m-d H:i:s");
        //編集
        if(!empty($_POST["number"])){
            $number = $_POST["number"];
            $sql = 'UPDATE miyaa SET name=:name, comment=:comment, pass=:pass, date=:date WHERE id=:id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt->bindParam(':id', $number, PDO::PARAM_INT);
            $stmt->execute();
        //新規    
        }else{
            $pass = $_POST["pass"];
            $sql = $pdo -> prepare("INSERT INTO miyaa (name, comment, pass, date) VALUES (:name, :comment, :pass, :date)");
            $sql -> bindParam(':name', $name, PDO::PARAM_STR);
            $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
            $sql -> bindParam(':pass', $pass, PDO::PARAM_STR);
            $sql -> bindParam(':date', $date, PDO::PARAM_STR);
            $sql -> execute();
        }
    }

    // 削除フォーム
    if(!empty($_POST["deletenum"]) && !empty($_POST["deletepass"])){
        $deletenum = $_POST["deletenum"];
        $deletepass = $_POST["deletepass"];
        
        $sql = 'delete from miyaa where id=:id AND pass=:pass';
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(':id', $deletenum, PDO::PARAM_INT);
        $stmt -> bindParam(':pass', $deletepass, PDO::PARAM_STR);
        $stmt -> execute();
    }
    
    $number= "";
    $namae="";
    $komento="";
    
    //編集フォーム
    if(!empty($_POST["editnum"]) && !empty($_POST["editpass"])){
        $editnum = $_POST["editnum"];
        $editpass = $_POST["editpass"];
    
        $sql = 'SELECT * FROM miyaa WHERE id=:id AND pass=:pass';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $editnum, PDO::PARAM_INT);
        $stmt->bindParam(':pass', $editpass, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach($results as $row){
            $number = $row['id'];
            $namae = $row['name'];
            $komento = $row['comment'];
        }
    }
?>


    <form action="" method="post">
        【入力フォーム】<br>
        <input type="text" name="name" placeholder="名前" value="<?php echo $namae; ?>">
        <input type="text" name="comment" placeholder="コメント" value="<?php echo $komento; ?>">
        <input type="text" name="pass" placeholder="パスワード">
        <input type="hidden" name="number" value="<?php echo $number; ?>">
        <input type="submit" name="送信">
        <br>
        【削除フォーム】<br>
        <input type="number" name="deletenum" placeholder="削除番号">
        <input type="text" name="deletepass" placeholder="パスワード">
        <input type="submit" value="削除">
        <br>
        【編集フォーム】<br>
        <input type="number" name="editnum" placeholder="編集番号">
        <input type="text" name="editpass" placeholder="パスワード"> 
        <input type="submit" value="編集">
         <br><br>
        投稿内容<br>
    </form>
    
    <?php
        $sql = 'SELECT * FROM miyaa';
        $stmt = $pdo -> query($sql);
        $results = $stmt -> fetchAll();
        foreach($results as $row){
          echo $row['id']." ";
          echo $row['name']." ";
          echo $row['comment']." ";
          echo $row['date']."<br>";
        echo "<hr>";
        }  
        
    ?>
</body>
</html>