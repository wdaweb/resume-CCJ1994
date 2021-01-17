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
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@500&display=swap"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/jquery-3.5.1.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="navbar navbar-light bg-light shadow-sm sticky-top">
    <div class="container-fluid">
      <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="./img/logo.svg" width="40px" class="d-inline-block ">
      </a>
    </div>
  </header>
  <div class="container-fluid ">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse my-4" style="">
        <div class="part h-100">
          <div class="position-sticky pt-4 ">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg>
                  個人資料管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_exp">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-file">
                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                    <polyline points="13 2 13 9 20 9"></polyline>
                  </svg>
                  經歷管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_jobskill">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-shopping-cart">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                  </svg>
                  求職技能管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_mywork">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  作品管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_pic">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bar-chart-2">
                    <line x1="18" y1="20" x2="18" y2="10"></line>
                    <line x1="12" y1="20" x2="12" y2="4"></line>
                    <line x1="6" y1="20" x2="6" y2="14"></line>
                  </svg>
                  圖片管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_menu">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-layers">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  選單標題管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_message">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-layers">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  Message
                  <span class="badge rounded-pill">
                    <?php
                  echo $pdo->query("select count(*) from `resume_message` where `sh`='0'")->fetchColumn();
                  ?>
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="api/logout.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 40 40"
                    stroke="currentColor" class="feather feather-layers">
                    <g>
                      <path fill="#4D4D4D" d="M23.286,33.667H9.714C7.666,33.667,6,32.001,6,29.952V10.048C6,8,7.666,6.333,9.714,6.333h13.572
			              C25.334,6.333,27,8,27,10.048v2.262c0,0.552-0.447,1-1,1s-1-0.448-1-1v-2.262c0-0.945-0.769-1.714-1.714-1.714H9.714
			              C8.769,8.333,8,9.103,8,10.048v19.904c0,0.945,0.769,1.715,1.714,1.715h13.572c0.945,0,1.714-0.77,1.714-1.715V27.69
			              c0-0.553,0.447-1,1-1s1,0.447,1,1v2.262C27,32.001,25.334,33.667,23.286,33.667z" />

                      <path fill="#4D4D4D"
                        d="M33,21H18c-0.552,0-1-0.448-1-1s0.448-1,1-1h15c0.553,0,1,0.448,1,1S33.553,21,33,21z" />

                      <path fill="#4D4D4D"
                        d="M29.783,25c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l2.667-2.667
			              C31.909,20.46,32,20.238,32,20c0-0.238-0.091-0.46-0.257-0.626l-2.667-2.667c-0.391-0.39-0.391-1.023,0-1.414s1.023-0.391,1.414,0
			              l2.667,2.667C33.701,18.503,34,19.228,34,20s-0.299,1.497-0.843,2.04l-2.667,2.667C30.295,24.902,30.039,25,29.783,25z" />
                    </g>
                  </svg>
                  logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main class="d-flex flex-column col-md-8 col-lg-9 my-4">
        <div class="part overflow-hidden h-100">
        <?php
        $do=(isset($_GET['do']))?$_GET['do']:'resume_message';
        $file="./backend/".$do.".php";
        if(file_exists($file)){
          include $file;
        }else{
          include "./backend/resume_message.php";
        }
        ?>
        </div>
    </div>
    </main>
  </div>
  </div>
  <div id="addModal">
    <div class="addModal"></div>
    <div class="addContent container col-md-6 col-10 my-5">
      <?php
      
        if($_GET['do']){
          include "modal/".$do.".php";
        }
        
      ?>
    </div>
  </div>
  <div id="chgModal">
    <div class="chgModal"></div>
    <div class="chgContent container col-md-6 col-10 my-5">
      <?php
      
      ?>
    </div>
  </div>
  
  <footer class="text-center border-top py-2 mx-2">
    <small>
      <img src="./img/logo.svg" width="60px" alt=""><br>
      copyright &copy; 2020 <span style="color: #95a5a6;">CCJ Design</span>. All Rights Reserved
    </small>
  </footer>

  <script src="./js/backend.js"></script>
</body>

</html>
<?php };?>