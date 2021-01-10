<?php
include_once "base.php";
if(empty($_SESSION['login'])){
  echo "你沒有使用權限";
}else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <link rel="shortcut icon" type="image/x-ico" href="img/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="navbar navbar-expand-lg container">
      <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="40px"></a>
    </div>
  </header>
  <div class="d-flex">

    <aside class="col-4">
      <nav class="">
        <ul>
          <li>個人資料管理</li>
          <li>學經歷管理</li>
          <li>自傳管理</li>
          <li>求職條件管理</li>
          <li>作品管理</li>
          <li>圖片管理</li>
          <li>選單標題管理</li>
        </ul>
      </nav>
    </aside>
    <section class="col-8">
      <?php
      $do=(isset($_GET['do']))?$_GET['do']:'info';
      $file="./backend/".$do.".php";
      if(file_exists($file)){
        include $file;
      }else{
        include "./backend/info.php";
      }
      ?>
    </section>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
};
?>