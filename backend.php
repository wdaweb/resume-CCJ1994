<?php
include_once "base.php";
if(empty($_SESSION['login'])){
  echo "你沒有使用權限";
  exit();
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <link rel="shortcut icon" type="image/x-ico" href="img/favicon.ico">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/backendstyle.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/jquery-3.5.1.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="./img/logo.svg"  width="40px" class="d-inline-block ">
        </a>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="?do=resume_info">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                個人資料管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?do=resume_exp">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                經歷管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?do=resume_jobskill">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                求職技能管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?do=resume_mywork">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                作品管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?do=resume_pic">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                圖片管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?do=resume_menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                選單標題管理
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <?php
      $do=(isset($_GET['do']))?$_GET['do']:'resume_info';
      $file="./backend/".$do.".php";
      if(file_exists($file)){
        include $file;
      }else{
        include "./backend/resume_info.php";
      }
      ?>
      <button id="addbtn" type="button"><?=$addstr[$do];?></button>
      <h2>Section title</h2>
      
    </main>
    </div>
  </div>
  <div class="d-flex container" >
    
    <section class="col-8">
      
  

    </section>
  </div>
  <div id="addModal" style="display:none;">
    <div class="addModal"></div>
    <div class="addContent">
      
      <?php
      if(isset($_GET['do'])){
        include "modal/".$do.".php";
      }else{
        include "modal/resume_info.php";
      }
      
      ?>
      
      <button class="backbtn">取消</button>
    </div>
  </div>
  
    
    <script src="./js/backend.js"></script>
  </body>
</html>
<?php
};
?>