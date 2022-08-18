<!DOCTYPE html>
<html lang>
    <head>
        <meta charset="UTF-8">
        <title>mission_1-21</title>
    </head>
    <body>
        <form action=""method="post">
            <input type="number" name="num" placeholder="数字を入力して下さい">
            <input type="submit" name="submit">
        </form>
        <?php
        $str = $_POST["str"];
        if($num%3==0 && $num%5==0){
            echo "FizzBuzz<br>";
        }elseif($num%3==0){
            echo "Fizz<br>";
        }elseif($num%5==0){
            echo "Buzz<br>";
        }else{
            echo $num . "<br>";
        }
        ?>
    </body>
</html>