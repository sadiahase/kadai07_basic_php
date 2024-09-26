<!-- データ登録 -->

<?php
//1. データ取得
$name      = $_POST["name"];
$email     = $_POST["email"];
$personname = $_POST["personname"];
$point     = $_POST["point"];
$comment   = $_POST["comment"];

//2. DB接続します(↓は決まった構文)
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=phpform;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql = "INSERT INTO phoform(name,email,personname,point,comment)VALUES(:name, :email, :person_name, :point, :comment);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':person_name', $personname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':point', $point, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
//５．read.phpへリダイレクト
header("Location: read.php");
exit();

}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="index.html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<body>
<?php

// $con = mysql_connect('127.0.0.1', 'root', '1234');
// if (!$con) {
//   exit('データベースに接続できませんでした。');
// }

// $result = mysql_select_db('phpdb', $con);
// if (!$result) {
//   exit('データベースを選択できませんでした。');
// }

// $result = mysql_query('SET NAMES utf8', $con);
// if (!$result) {
//   exit('文字コードを指定できませんでした。');
// }

// $no   = $_REQUEST['no'];
// $name = $_REQUEST['name'];
// $tel  = $_REQUEST['tel'];

// $result = mysql_query("INSERT INTO address(no, name, tel) VALUES('$no', '$name', '$tel')", $con);
// if (!$result) {
//   exit('データを登録できませんでした。');
// }

// $con = mysql_close($con);
// if (!$con) {
//   exit('データベースとの接続を閉じられませんでした。');
// }

?>
<p>登録が完了しました。<br /><a href="index.php">戻る</a></p>


</body>
</html>