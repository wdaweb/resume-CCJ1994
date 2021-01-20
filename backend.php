<?php
include_once "base.php";
if(empty($_SESSION['login'])){
  echo "你沒有使用權限，";
  echo "<a href='index.php'>請登入</a>";
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
  <header class="navbar navbar-light bg-light shadow-sm fixed-top">
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
  <section class="container-fluid ">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse my-3" style="">
        <div class="part h-100">
          <div class="position-sticky pt-4 ">
            <ul class="nav flex-column">
              <li class="nav-item ">
                <a class="nav-link" href="?do=resume_info">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
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
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather">
                    <line x1="18" y1="20" x2="18" y2="10"></line>
                    <line x1="12" y1="20" x2="12" y2="4"></line>
                    <line x1="6" y1="20" x2="6" y2="14"></line>
                  </svg>
                  求職技能管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_mywork">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                  </svg>
                  作品管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_pic">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="24" height="24" fill="none"
                    stroke="currentColor" class="feather">
                  <path d="M23,3.3a2.05,2.05,0,0,0-1.45-.51H2.58A2,2,0,0,0,.9,3.58,2.07,2.07,0,0,0,.52,4.85V19.23a1.87,1.87,0,0,0,1.11,1.83,2.16,2.16,0,0,0,.91.2h19a2,2,0,0,0,2-1.61.21.21,0,0,1,0-.06V4.45A2.23,2.23,0,0,0,23,3.3Zm-.9,15.82c0,.5-.11.61-.61.61H2.66c-.5,0-.6-.11-.6-.62V4.94c0-.5.11-.61.61-.61H21.46c.5,0,.61.11.61.61Z"/>
                  <path d="M7.46,12l1.92,1.92L15.52,7.8,15.7,8l4.67,4.67a.47.47,0,0,1,.16.39v5.13H3.6v-.41c0-.57,0-1.13,0-1.69a.37.37,0,0,1,.09-.26C4.93,14.54,6.18,13.3,7.46,12Z"/>
                  <path d="M5.79,5.89A2.3,2.3,0,1,1,3.63,8.52,2.25,2.25,0,0,1,5.79,5.89Z"/>
                </svg>
                  圖片管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_menu">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#535c68"
                    stroke="currentColor" stroke-width="1" class="feather">
                    <path class="cls-1"
                      d="M20.79,5.27H6.5a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H20.79a.5.5,0,0,1,.5.5A.5.5,0,0,1,20.79,5.27Z" />
                    <circle class="cls-1" cx="3.91" cy="4.77" r="0.62" />
                    <path class="cls-1" d="M20.79,12.5H6.5a.5.5,0,0,1,0-1H20.79a.5.5,0,0,1,0,1Z" />
                    <circle class="cls-1" cx="3.91" cy="12" r="0.62" />
                    <path class="cls-1"
                      d="M20.79,19.73H6.5a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H20.79a.5.5,0,0,1,.5.5A.5.5,0,0,1,20.79,19.73Z" />
                    <circle class="cls-1" cx="3.91" cy="19.23" r="0.62" />
                  </svg>
                  選單標題管理
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?do=resume_message">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="1" class="feather">
                    <path d="M12,6a.47.47,0,1,0,.46.47A.47.47,0,0,0,12,6Z" />
                    <path
                      d="M4.33,14.31a.46.46,0,0,0,.46-.46.45.45,0,0,0-.46-.46.46.46,0,0,0-.46.46A.47.47,0,0,0,4.33,14.31Z" />
                    <path
                      d="M15.7,1.38c-4.16,0-7.58,2.86-7.84,6.47-4,.2-7.69,3.06-7.69,6.92A6.43,6.43,0,0,0,2,19.19a2.81,2.81,0,0,1-.75,2.65.46.46,0,0,0,.33.78A5.08,5.08,0,0,0,5.09,21.2a10.64,10.64,0,0,0,3.21.5c4.16,0,7.58-2.87,7.84-6.48a10.34,10.34,0,0,0,2.77-.49,5.09,5.09,0,0,0,3.53,1.43.46.46,0,0,0,.43-.29.46.46,0,0,0-.1-.5A2.8,2.8,0,0,1,22,12.72,6.43,6.43,0,0,0,23.83,8.3C23.83,4.29,19.81,1.38,15.7,1.38ZM8.3,20.78a9.33,9.33,0,0,1-3.16-.55.46.46,0,0,0-.51.12,4.23,4.23,0,0,1-2.08,1.23,3.74,3.74,0,0,0,.29-2.75.47.47,0,0,0-.12-.2A5.56,5.56,0,0,1,1.1,14.77c0-3.25,3.3-6,7.2-6,3.69,0,6.93,2.56,6.93,6S12.13,20.78,8.3,20.78Zm13-8.61a.39.39,0,0,0-.12.19,3.74,3.74,0,0,0,.29,2.75,4.16,4.16,0,0,1-2.08-1.23.46.46,0,0,0-.51-.12,9.05,9.05,0,0,1-2.72.54,6.64,6.64,0,0,0-2.5-4.61h6a.47.47,0,0,0,.46-.46.46.46,0,0,0-.46-.46H12.22a8.41,8.41,0,0,0-3.43-.91C9.05,4.75,12.05,2.3,15.7,2.3c3.9,0,7.2,2.75,7.2,6A5.58,5.58,0,0,1,21.28,12.17Z" />
                    <path
                      d="M12,13.39H6.18a.45.45,0,0,0-.46.46.46.46,0,0,0,.46.46H12a.46.46,0,0,0,.46-.46A.45.45,0,0,0,12,13.39Z" />
                    <path
                      d="M12,16.16H4.33a.46.46,0,0,0-.46.46.47.47,0,0,0,.46.46H12a.46.46,0,0,0,.46-.46A.45.45,0,0,0,12,16.16Z" />
                    <path d="M19.67,6H13.85a.47.47,0,0,0,0,.93h5.82a.47.47,0,0,0,0-.93Z" />
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
      <main class="d-flex flex-column col-md-8 col-lg-9 my-3">
        <div class="part h-100">
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
  </section>
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
      
    </div>
  </div>

  <footer class=" text-center border-top py-1 mx-2 " style="transform:translateY(70px);">
    <small>
      copyright &copy; 2021 <span style="color: #95a5a6;">CCJ Design</span>. All Rights Reserved
    </small>
  </footer>

  <script src="./js/backend.js"></script>
</body>

</html>
<?php };?>