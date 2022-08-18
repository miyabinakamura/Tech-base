<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission1-27</title>
    </head>
    <body>
        <form action ="" method="post">
            <input type="number" name="num" placeholder="数字を入力してください
            ">
            <input type="submit" name="submit">
        </form> 
        
        <?php
        $num =$_POST["num"];
        
        $filename="m1-27.txt";
        if (!empty($num)){
        $fp = fopen($filename, "a");
        fwrite($fp, $num.PHP_EOL);
        fclose($fp);
        echo "書き込み成功！<br>";
        }
        
        if(file_exists($filename)){
            $nums = file($filename);
            foreach($nums as $num){
                  if($num%3==0 && $num%5==0){
                      echo "FizzBuzz<br>";
                  }elseif($num%3==0){
                      echo "Fizz<br>";
                  }elseif($num%5==0){
                      echo "Buzz<br>";
                  }else{
                      echo $num . "<br>";
                  }
            }
        }
        ?>
    </body>
</html>
//isset