<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-3</title>
    </head>
    <body>
        <form action="" method="post">
            名前を入力<br>
            <input type="text" name="name" placeholder="名前">
            <br>
            コメントを入力<br>
            <input type="text" name="comment" placeholder="コメント">
            <input type="submit" name="submit">
            <br>
            削除したい投稿の番号を選択<br>
            <input type="number" name="deletenumber" placeholder="削除番号">
            <input type="submit" value="削除">
            <br><br>
            投稿内容<br>
        </form>
        
        <?php
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $deletenumber = $_POST["deletenumber"];
        $date = date("Y/m/d H:i:s");
        $str = $name."<>".$comment."<>".$date;
        $filename = "mission_3-3.txt";


        if(!empty($name) && !empty($comment)/*$name != "" && $comment != ""*/){
            $fp = fopen("mission_3-3.txt", "a");
            $con = count(file("mission_3-3.txt"))+1;
            fwrite($fp,$con."<>".$str.PHP_EOL);
            fclose($fp);
        }elseif(!empty($deletenumber)){
            /*$fp = fopen("mission_3-3.txt", "w");*/
            $files = file("mission_3-3.txt",FILE_IGNORE_NEW_LINES);
            $fp = fopen("mission_3-3.txt", "w");
            for($i = 0 ; $i < count($files) ; $i++ ){
                //foreach( 配列 as 変数 )
                $file = explode("<>" , $files[$i]);
                /*if($con != $deletenumber){*/
                if($file[0] != $deletenumber){
                     //$fp = fopen("mission_3-3.txt", "w");
                     /*fwrite($fp,$con."<>".$str.PHP_EOL);*/
                     $con = count(file("mission_3-3.txt"))+1;
                     fwrite($fp,$con."<>".$file[1]."<>".$file[2]."<>".$file[3].PHP_EOL);
                     //fclose($fp);
                 }/*else{
                     fclose($fp);
                 }*/
            }
             fclose($fp);
        }
        
      
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        for($i = 0 ; $i < count($lines) ; $i++ ){
            $line = explode("<>" , $lines[$i]);
            echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]. "<br>";
        } 
        
         ?>   
    </body>
</html>