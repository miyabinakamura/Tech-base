<!DOCTYPE html>
<html lnag="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_1-24</title>
    </head>
    <body>
        <?php
        $str  = "あいう";
        $filename = "m1-24.txt";
        //$fp = fopen("開きたいファイル", "モード");
        //a:追記モード、w:書き込みモード、r:読み込みモード
        $fp = fopen($filename, "a");
        //PHP_EOL:改行コード
        fwrite($fp, $str.PHP_EOL);
        fclose($fp);
        echo "書き込み完了！";
        ?>
    </body>
</html>