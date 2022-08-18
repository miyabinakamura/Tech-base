<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>
    <form action="" method="post">
        //value:初期値
        <input type="text" name="str" value="コメント">
        <input type="submit" name="submit">
    </form>
    
    <?php
    /*
    GET:データがURLで引き渡される、POST：データがURLで引き渡されない
    */
    $str= $_POST['str'];
    //isset とemptyは反対
    if($_POST["str"]){
        echo $str . "を受け付けました<br>";
    }
    /*
    if(isset($str) &&*$str != ""){
        echo $str . "を受け付けました<br>";
    //}else{
      //  echo "";
    //}
    /*
    if(!isset($str)){
        echo "";
    }else{
        echo $str . "を受け付けました";
    }
    */
    ?>   
</body>
</html>