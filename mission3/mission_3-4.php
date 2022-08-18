<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>mission_3-4</title>
    </head>
    <body>
   
        
        <?php
        $name = $_POST["name"]; //名前
        $comment = $_POST["comment"]; //コメント
        $deletenumber = $_POST["deletenumber"]; //削除番号
        $edit = $_POST["edit"]; //編集番号
        $editnum = $_POST["editnum"]; //投稿番号
        $date = date("Y/m/d H:i:s");
        $str = $name."<>".$comment."<>".$date;
        
        
        if(!empty($name) && !empty($comment)){
            //投稿番号がなかったら（新規）
            if(empty($editnum)){
                $fp = fopen("mission_3-4.txt", "a");
                $con = count(file("mission_3-4.txt"))+1;
                fwrite($fp,$con."<>".$str.PHP_EOL);
                fclose($fp);
            }
            //投稿番号があったら(編集）
            else{
                //$fp = fopen("mission_3-4.txt", "a");
                $files = file("mission_3-4.txt",FILE_IGNORE_NEW_LINES);
                //$file = explode("<>" , $files[$i]);
                $fp = fopen("mission_3-4.txt", "w");
                for($i = 0 ; $i < count($files) ; $i++ ){
                    $file = explode("<>" , $files[$i]);
                    //$fp = fopen("mission_3-4.txt", "w");
                    $con = count(file("mission_3-4.txt"))+1;
                     if($file[0] == $editnum){
                        fwrite($fp, $con."<>".$name."<>".$comment."<>".$date.PHP_EOL);
                    }else{
                        fwrite($fp,$files[$i].PHP_EOL);
                    }
                }
                fclose($fp);
                
            }
        }
        
               
           
         //削除番号があったら
        elseif(!empty($deletenumber)){
        /*$fp = fopen("mission_3-3.txt", "w");*/
        $files = file("mission_3-4.txt",FILE_IGNORE_NEW_LINES);
        $fp = fopen("mission_3-4.txt", "w");
            for($i = 0 ; $i < count($files) ; $i++ ){
                //foreach( 配列 as 変数 )
                $file = explode("<>" , $files[$i]);
                /*if($con != $deletenumber){*/
                if($file[0] != $deletenumber){
                     //$fp = fopen("mission_3-3.txt", "w");
                    /*fwrite($fp,$con."<>".$str.PHP_EOL);*/
                    $con = count(file("mission_3-4.txt"))+1;
                    fwrite($fp,$con."<>".$file[1]."<>".$file[2]."<>".$file[3].PHP_EOL);
                    //fclose($fp);
                 }/*else{
                     fclose($fp);
                 }*/
            }
             fclose($fp);
         }
            
            
        $namae = "";
        $komento = "";
        $num = "";
             
             
        //編集選択があったら
        if(!empty($edit)){
            $files = file("mission_3-4.txt",FILE_IGNORE_NEW_LINES);
            foreach($files as $aaa){
            $file = explode("<>" , $aaa);
                if($file[0] == $edit){
                $num = $file[0];
                $namae = $file[1];
                $komento = $file[2];
                }
            }
        }
        ?>
        
        <form action = "" method = "post">
            【入力フォーム】<br>
            名前
            <input type = "text" name = "name" placeholder = "名前" value= <?php echo $namae; ?>>
            コメント
            <input type = "text" name = "comment" placeholder = "コメント" value= <?php echo $komento; ?>>
            
            <input type = "hidden" name = "editnum" value = <?php echo $num; ?>>
            <input type = "submit" value = "送信">
            <br><br>
            【削除フォーム】<br>
            削除したい投稿の番号を選択<br>
            <input type = "number" name = "deletenumber" placeholder = "削除番号">
            <input type = "submit" value = "削除">
            <br><br>
            【編集フォーム】<br>
            編集したい投稿の番号を選択<br>
            <input type = "number" name = "edit" placeholder = "編集番号">
            <input type = "submit" value = "編集">
            <br><br>
            投稿内容<br>
        </form>
        
        
       <?php
       //投稿内容を表示
        $files = file("mission_3-4.txt",FILE_IGNORE_NEW_LINES);
        for($i = 0 ; $i < count($files) ; $i++ ){
            $file = explode("<>" , $files[$i]);
            echo $file[0]." ".$file[1]." ".$file[2]." ".$file[3]. "<br>";
        } 
        ?>
    </body>
</html>