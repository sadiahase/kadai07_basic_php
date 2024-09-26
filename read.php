<!-- データ表示 -->
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ表示</title>
  <style>
   table,td,th {
     border: 1px solid #000;
     padding: 5px;
     text-align: center;
    }
  </style>
</head>
<body>
 <form name="myForm" method="post" action="study_database_edit.html">
   <select id="code_selection" name="code">
   <option value="1">テーブル作成</option>
   <option value="2">テーブル一覧</option>
   <option value="3">テーブル削除</option>
   </select>
   <p><label>テーブル名</label><input type="text" name="name" placeholder="hogehoge" pattern="^[0-9A-Za-z]+$"></p>
   <p><input type="submit" value="実行"></p>
   </form> -->

    <?php
    //POSTデータ取得
    $name = $_POST["name"];
    $email = $_POST["email"];
    $personname = $_POST["personname"];
    $point = $_POST["point"];
    $comment = $_POST["comment"];

    // 1.DBへ接続
    
     try{
        $pdo = new PDO('mysql:dbname=phpform;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
        exit('DB_CONECT:'.$e->getMessage());
      }
    // 2.データ登録SQL作成
    $sql = "SELECT * FROM phoform";
    // $sql = "INSERT INTO phoform(name,email,personname,point,comment)VALUES(:name,:email,:personname,:point,:comment,sysdate())";
    $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    // $stmt->bindValue(':email',$email, PDO::PARAM_STR);
    // $stmt->bindValue(':personname',$personname, PDO::PARAM_STR);
    // $stmt->bindValue(':point',$point, PDO::PARAM_INT);
    // $stmt->bindValue(':comment',$comment, PDO::PARAM_STR);
    $status = $stmt->execute();

    // 3.データ登録処理後
    // $view=""; 無視する
    if($status==false){
    // execute(SQL実行時にエラーがある場合)
    $error = $stmt->errorInfo(); 
    exit("SQL_ERROR:".$error[2]);
    }

    //index.phpへリダイレクト
    // header("Location: index.php");
    // exit();

    // 全データ取得
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>アンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
div{padding: 10px;font-size:16px;}
td{border: 1px solid black;}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <table>
    <?php foreach($values as $value){ ?>
        <tr>
        <td><?=$value["name"]?></td>
        <td><?=$value["email"]?></td>
        <td><?=$value["person_name"]?></td>
        <td><?=$value["point"]?></td>
        <td><?=$value["comment"]?></td>
        </tr>
    <?php }?>
    </table>
    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>