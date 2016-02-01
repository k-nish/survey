<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP基礎</title>
  </head>
  <body>
     <?PHP
         //ステップ1.db接続
         //DB情報
         $dsn = 'mysql:dbname=phpkiso;host=localhost';
         //user情報
         $user = 'root';
         $password = '';
         //DB接続オブジェクト作成
         $dbh = new PDO($dsn,$user,$password);
         //接続したDBオブジェクトでutf8を使うことを指定
         $dbh->query('SET NAMES utf8');

         $nickname = $_POST['nickname'];
         $email = $_POST['email'];
         $goiken = $_POST['goiken'];

         echo "ようこそ";
         echo $nickname;
         echo '様';
         echo '<br/>';
         echo 'ご意見ありがとうございました';
         echo "メールアドレス";
         echo $email;
         echo '<br/>';
         echo "ご意見『";
         echo $goiken;
         echo '』<br />';

         //ステップ2.データベースエンジンにsql文で司令を出す
         $sql = 'INSERT INTO survey1(`nickname`,`email`,`goiken`)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
         var_dump($sql);
         $stmt = $dbh->prepare($sql);
         $stmt ->execute();

         //ステップ3.データベースから切断
         $dbh=null;
     ?>
  </body>
