<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_1-16</title>
    </head>
    <body>
        <?php
        var_dump(true);
        echo "<br>";
        var_dump(false);
        echo "<br>";
        echo "数値が４であるか<br>";
        $num = 4;
        var_dump($num==4);
        echo "<br>";
        var_dump($num!=4);
        echo "<br><br>";
        ?>
        <?php
        echo "数値が3の倍数であるか<br>";
        $num = 6;
        var_dump($num%3==0);
        ?>
    </body>
</html>