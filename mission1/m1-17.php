<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_1-17</title>
    </head>
    <body>
        <?php
        //数値が15のとき
        $num =15;
        //3の倍数かつ5の倍数であればFizzBuzz
        if($num%3==0 && $num%5==0){
          echo "FizzBuzz<br>";
        }elseif ($num%3==0){
            echo "Fizz<br>";
        }elseif ($num%5==0){
            echo "Buzz<br>";
        }else{
            echo $num . "<br>";
        }
        ?>
    </body>
</html>