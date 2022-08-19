 <?php
        //2DB接続設定
        $dsn = 'mysql:dbname=tb240114db;host=localhost';
        $user = 'tb-240114';
        $password = 'BCv2fzmudA';
        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        //prepare:SQL文内に、変数を割り当てたい時に使う
        //name,comentoのそれぞれに対して、:name, :valueというパラメータを与えている
        //パラメーター：関数やメソッドなどが呼び出し元から渡された値を受け取るために宣言された変数の事、引数
        $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
        //$sql -> bindParam：:nameなどのパラメーターに値を入れる
        //（パラメーター, それに入れる変数, 型）
        //PDO::PARAM_STR：文字列
        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        $name = 'ナマエ';
        $comment = 'コメント'; 
        //exesute：命令などを「実行する」の意、prepareで用意したSQLをデータベースに対して発行
        $sql -> execute();
?>