<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_2-3</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="str" value="コメント">
            <input type="submit" name="submit">
        </form>
        
        <?php
        $str=$_POST["str"];
        $filename="mission_2-3.txt";
        if($str != ""){
            $fp = fopen($filename, "a");
            fwrite($fp, $str. PHP_EOL);
            fclose($fp);
        }
    ?>   
    </body>
</html>