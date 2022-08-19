<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>mission_3-5-3</title>
    </head>
    <body>
   
        
        <?php
        //投稿番号更新型
        $filename = "mission_3-5-3.txt";
        $name = $_POST["name"]; //名前
        $comment = $_POST["comment"]; //コメント
        $pass = $_POST["pass"]; //パスワード
        $num = $_POST["num"]; //投稿番号
        
        $deletenum = $_POST["deletenum"]; //削除番号
        $deletepass = $_POST["deletepass"]; //削除パスワード
        $editnum = $_POST["editnum"]; //編集番号
        $editpass = $_POST["editpass"]; //編集パスワード
        $date = date("Y/m/d H:i:s");
        $str = $name."<>".$comment."<>".$date."<>".$pass."<>";
        
        
        
        if(!empty($name) && !empty($comment) && !empty($pass)){
            //投稿番号がなかったら（新規）
            if(empty($num)){
                $fp = fopen("mission_3-5-3.txt", "a");
                $con = count(file("mission_3-5-3.txt"))+1;
                fwrite($fp,$con."<>".$str.PHP_EOL);
                fclose($fp);
            }
            //投稿番号があったら(編集）
            else{
                $files = file("mission_3-5-3.txt",FILE_IGNORE_NEW_LINES);
                $fp = fopen("mission_3-5-3.txt", "w");
                for($i = 0 ; $i < count($files) ; $i++ ){
                    $file = explode("<>" , $files[$i]);
                    $con = count(file("mission_3-5-3.txt"))+1;
                     if($file[0] == $num){
                        fwrite($fp, $con."<>".$name."<>".$comment."<>".$date."<>".$pass."<>".PHP_EOL);
                    }else{
                        fwrite($fp, $files[$i].PHP_EOL);
                    }
                }
                fclose($fp);
                
            }
        }
        
               
         //削除機能
        if(!empty($deletenum) && !empty($deletepass)){
        $files = file("mission_3-5-3.txt",FILE_IGNORE_NEW_LINES);
        $fp = fopen("mission_3-5-3.txt", "w");
            for($i = 0 ; $i < count($files) ; $i++ ){
                $file = explode("<>" , $files[$i]);
                if($file[0] != $deletenum && $file[4] = $deletepass){
                    $con = count(file("mission_3-5-3.txt"))+1;
                    fwrite($fp,$con."<>".$file[1]."<>".$file[2]."<>".$file[3]."<>".$file[4]."<>".PHP_EOL);
                 }
            }
             fclose($fp);
         }
            
            
        $namae = "";
        $komento = "";
        $number = "";
        $passwd = "";
             
             
        //編集機能
        if(!empty($editnum) && !empty($editpass)){
            $files = file("mission_3-5-3.txt",FILE_IGNORE_NEW_LINES);
            foreach($files as $aaa){
            $file = explode("<>" , $aaa);
                if($file[0] == $editnum && $file[4] = $editpass){
                $number = $file[0];
                $namae = $file[1];
                $komento = $file[2];
                $passwd = $file[4];
                }
            }
        }
        ?>
        
        <form action = "" method = "post">
            【入力フォーム】<br>
            <input type = "text" name = "name" placeholder = "名前" value= <?php echo $namae; ?>>
            <input type = "text" name = "comment" placeholder = "コメント" value= <?php echo $komento; ?>>
            <input type = "text" name = "pass" placeholder = "パスワード" value= <?php echo $passwd; ?>>
            <input type = "hidden" name = "num" value = <?php echo $number; ?>>
            <input type = "submit" value = "送信">
            <br><br>
            【削除フォーム】<br>
            <input type = "number" name = "deletenum" placeholder = "削除番号">
            <input type = "text" name = "deletepass" placeholder = "パスワード">
            <input type = "submit" value = "削除">
            <br><br>
            【編集フォーム】<br>
            <input type = "number" name = "editnum" placeholder = "編集番号">
            <input type = "text" name = "editpass" placeholder = "パスワード">
            <input type = "submit" value = "編集">
            <br><br>
            投稿内容<br>
        </form>
        
        
       <?php
       //投稿内容を表示
        $files = file("mission_3-5-3.txt",FILE_IGNORE_NEW_LINES);
        for($i = 0 ; $i < count($files) ; $i++ ){
            $file = explode("<>" , $files[$i]);
            echo $file[0]." ".$file[1]." ".$file[2]." ".$file[3]. "<br>";
        } 
        ?>
    </body>
</html>
