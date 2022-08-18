<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-2</title>
    </head>
    <body>
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

        if(!empty($name) && !empty($comment)/*$name != "" && $comment != ""*/){
            $fp = fopen("mission_3-2.txt", "a");
            $con = count(file("mission_3-2.txt"))+1;
            fwrite($fp,$con."<>".$str.PHP_EOL);
            fclose($fp);
        }
        
        $lines = file("mission_3-2.txt");
        for($i = 0 ; $i < count($lines) ; $i++ ){
            $line = explode("<>" , $lines[$i]);
            echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]. "<br>";
        }         
        
    ?>   
</html>
    </body>
</html>