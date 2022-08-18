<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-1</title>
    </head>
    <body>
        /*action:データ受信のプログラムを指定、method:データの送信方法*/
        <form action="" method="post">
            <input type="text" name="name" value="名前">
            <br>
            <input type="text" name="comment" value="コメント">
            <input type="submit" name="submit">
        </form>
        
        <?php
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $str = $name."<>".$comment."<>".$date;
        $filename = "mission_3-1.txt";
        if(!empty($name) && !empty($comment)/*$name != "" && $comment != ""*/){
            $fp = fopen($filename, "a");
            $con = count(file($filename))+1;
            fwrite($fp,$con."<>".$str.PHP_EOL);
            fclose($fp);
        }
    ?>   
</html>
    </body>
</html>