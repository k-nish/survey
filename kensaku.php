<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP基礎</title>
  </head>
  <body>
     <?php
         $code = $_POST['code'];

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

         //ステップ2.データベースエンジンにsql文で司令を出す
         $sql='SELECT * FROM survey1 WHERE code=?';
         
         $stmt = $dbh->prepare($sql);
         $data[]=$code;
         $stmt ->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false){
                print '検索結果がありません。';
            }
            else{
            print $rec['code'];
            print $rec['nickname'];
            print $rec['email'];
            print $rec['goiken'];
            print '<br/>';
            }
         //ステップ3.データベースから切断
         $dbh=null;
     ?>
     <br/>
     <a href="kensaku.html">検索画面に戻る<a/>
  </body>
