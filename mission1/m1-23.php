<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_1-23</title>
    </head>
    <body>
        <?php
        $name=
        array("Ken","Alice","Judy","BOSS","Bob");
        foreach($name as $name){
            if($name=="BOSS"){
                echo "Good morning $name!<br>";
            }else{
                echo "Hi! $name<br>";
            }
        }
        ?>
    </body>
</html>