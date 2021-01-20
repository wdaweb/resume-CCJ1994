<?php
include_once "base.php";
$info=$pdo->query("select * from resume_info")->fetch(PDO::FETCH_ASSOC);
$menus=$pdo->query("select * from resume_menu where `sh`='1' && `parent`='0'")->fetchAll();
$exps=$pdo->query("select * from resume_exp where `sh`='1' order by id desc")->fetchAll();
$jobskills=$pdo->query("select * from resume_jobskill where `sh`='1'")->fetchAll();
$myworks=$pdo->query("select * from resume_mywork where `sh`='1'")->fetchAll();
$pic=$pdo->query("select * from resume_pic where `sh`='1'")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCJ's Resume</title>
  <link rel="shortcut icon" type="image/x-ico" href="img/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
  
</head>

<body>
  <!-- login -->
  <div id="cover" style="display:none;">
    <div class="loginbg"></div>
    <div id="coverr" class="overflow-hidden">
      <div id="back" class="text-end mt-4 me-4 text-muted" style="cursor: pointer;">Back</div>
      <div class="container d-flex flex-column align-items-center mt-5">
        <div class="logintitle align-self-start ms-5">
          <div class="subtitle">Welcome,</div>
          <div class="subtitle">Update Info</div>
        </div>
        <form action="api/login.php" method="post">
          <div class="form-floating my-2 ">
            <input type="text" class="form-control border-0" id="floatingInput" placeholder="account" name="acc" required>
            <label for="floatingInput">Account</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control border-0" id="floatingPassword" placeholder="Password" name="pw" required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="text-end">
            <a class="text-muted" href="api/findpw.php"><small>Forgot Password?</small></a>
          </div>
          <div class="text-center mt-3">
            <button type="submit" style="background: transparent;color: #34495e;border: 0px;">Sign in <i
                class="fas fa-sign-in-alt"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- 選單區 -->
  <header id="meMenu" class="fixed-top nbr">
    <nav class="navbar navbar-expand-lg navbar-light container">
      <?php if(isset($_SESSION['login'])){ ?>
      <a class="navbar-brand" href="backend.php">
      <?php }else{ ?>
        <a class="navbar-brand" href="#meHome">
        <?php };  ?>
        <img src="./img/logo.svg" width="40px">
      </a>
      <button id="menubtn" class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#mainMenu">
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 col justify-content-end">
          <?php foreach($menus as $menu){ ?>
            <li class="nav-item mx-3">
              <div style="width:<?=$menu['style'];?>;">
                <a class="nav-link" href="<?=$menu['href'];?>"><?=$menu['menu'];?></a>
              </div>
            </li>
          <?php } ?>
          <!-- <li class="nav-item mx-3">
            <div style="width: 78px;">
              <a class="nav-link" href="#meAbout">AboutMe</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <div style="width: 78px;">
              <a class="nav-link" href="#mePortfolio">Portfolio</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <div style="width: 73px;">
              <a class="nav-link" href="#meWork">MyWork</a>
            </div>
          </li>
          <li class="nav-item mx-3">
            <div style="width: 70px;">
              <a class="nav-link" href="#meContact">Contact</a>
            </div>
          </li> -->
          <li class="nav-item mx-3">
            <div style="width: 70px;">
              
                <?php
                if(empty($_SESSION['login'])){
                  ?>
                <button id="login" class="nav-link btn border-0">
                  <i class="fas fa-user-circle fa-1x"></i>
                </button>
                <?php
                }else{
                ?>
                <a href="api/logout.php">
                  <button class="nav-link btn border-0">
                    <i class='fas fa-sign-out-alt fa-1x'></i>
                  </button>
                </a>
                <?php } ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Home -->
  <section id="meHome" class="mb-5 overflow-hidden" style="margin-top:74px;">
    <div class="container d-flex flex-wrap justify-content-center">
      <div class="hleft text-left my-auto col-12 col-md-6">
        <div>hello,</div>
        <div>I'm Chun-Ju Chang.</div>
        <p><?=$info['position'];?></p>
        <div class="hirebtn"><a class="p-2 text-center" href="#meContact">HIRE ME</a></div>
      </div>
      <div class="container col-12 col-md-6 d-flex justify-content-center mt-5">
        <img class="mepic1" src="./img/me-1.png">
      </div>
    </div>

  </section>
  <!-- About Me -->
  <section id="meAbout" class="my-5">
    <div class="container d-flex justify-content-around align-items-center flex-wrap">
      <div class="container text-center col-12 col-md-5">
        <div class="title bgsq">About Me</div>
        <div><img class="mepic2" src="./img/me-3.png" alt=""></div>
      </div>
      <div class="container d-flex flex-column col-12 col-md-7 mt-5">
        <p class="descr">
        <?=$info['intro'];?>
        </p>
        <div class="d-flex flex-wrap justify-content-lg-start justify-content-around mt-5">
          <div class="viewbtn me-lg-5 mb-5">
            <a class="p-3" href="#meWork">View Works</a>
          </div>
          <div class="dwlbtn "><a class="p-3"
              href="https://www.cakeresume.com/pdf/s--wxJpm0TmLoufBd5egd6u1A--/vJn5M.pdf">Download CV</a></div>
        </div>
      </div>
    </div>
    <div id="life"></div>
  </section>
  <!-- Portfolio -->
  <section id="mePortfolio" class="my-5">
    <div class="container d-flex flex-wrap">
      <div class="d-md-block d-none col-12 border-bottom text-end title"><div id="portfolioTit">Portfolio</div></div>
      <div class="container col-lg-6 col-12 my-5 order-lg-1">
        <div id="experenceTit" class="d-md-none d-block title border-top "><div id="experienceTit">Experience</div></div>
        <div class="accordion my-4" id="accordionExp">
          <?php foreach($exps as $exp){ ?>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#exp<?=$exp['id'];?>">
                <div class="text-md-end col-md-3 col-12">
                  <div><?=$exp['year'];?></div>
                  <div><?=$exp['month'];?></div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location"><?=$exp['company'];?></div>
              </div>
            </div>
            <div id="exp<?=$exp['id'];?>" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                    <?php $j=explode("，",$exp['job']); 
                    for($i=0;$i<count($j);$i++) { ?>
                      <div><?=$j[$i];?></div>
                    <?php }; ?>
              </div>
            </div>
          </div>
          <?php } ?>
          <script>
          </script>
          <!-- <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#six">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2018-2020</div>
                  <div>April</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">澳洲打工度假</div>
              </div>
            </div>
            <div id="six" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  housekeeper
                </div>
                <div>
                  farm picker
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#fif">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2018</div>
                  <div>Jan-Apr</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">泰宇出版社</div>
              </div>
            </div>
            <div id="fif" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  教材美編人員
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#four">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2017</div>
                  <div>Sep-Dec</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">本本國際</div>
              </div>
            </div>
            <div id="four" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  設計助理
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#thrid">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2016-2017</div>
                  <div>February</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">台北萬豪酒店</div>
              </div>
            </div>
            <div id="thrid" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  房務部門
                </div>
                <div>
                  房務員
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#sec">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2015</div>
                  <div>Jun-Oct</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">美國打工旅遊</div>
              </div>
            </div>
            <div id="sec" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  grand teton national park
                </div>
                <div>
                  resort worker
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0">
            <div class="card-header border-0 expblock">
              <div class="d-flex flex-wrap" data-toggle="collapse" data-target="#first">
                <div class="text-md-end col-md-3 col-12">
                  <div class="">2013-2016</div>
                  <div>September</div>
                </div>
                <div class="col-md-1">
                  <div class="d-md-block d-none timeline"></div>
                </div>
                <div class="align-self-end col-md-7 col-12 location">銘傳大學</div>
              </div>
            </div>
            <div id="first" class="collapse" data-parent="#accordionExp">
              <div class="card-body mb-4 expblock text-end">
                <div>
                  餐旅管理學系
                </div>
                <div>
                  觀光學院系學會
                </div>
                <div>
                  網路宣傳及攝影組長
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="container col-lg-6 col-12 my-auto">
        <div id="myskillTit" class="d-md-none d-block col-12 portitle title mb-4">
          My Skill
        </div>
        <div id="expert" class=" container my-4 d-flex flex-wrap justify-content-center my-auto">
          <?php foreach($jobskills as $skill) { ?>
          <div class="col-8 my-3">
            <div class="skill"><?=$skill['skill'];?></div>
            <div class="progress">
              <div id="bar<?=$skill['id'];?>" class="cusbar progress-bar progress-bar-striped" role="progressbar"></div>
            </div>
            <div class="numb numb<?=$skill['id'];?>" data-count="<?=$skill['level'];?>"><?=$skill['level'];?>%</div>
          </div>
          <?php } ?>
          <!-- <div class="col-8 my-3">
            <div class="skill">Web Front-end Design</div>
            <div class="progress">
              <div id="bar2" class="cusbar progress-bar progress-bar-striped" role="progressbar"></div>
            </div>
            <div class="numb numb2" data-count="70">70%</div>
          </div>
          <div class="col-8 my-3">
            <div class="skill">Web Back-end Design</div>
            <div class="progress">
              <div id="bar3" class="cusbar progress-bar progress-bar-striped" role="progressbar"></div>
            </div>
            <div class="numb numb3" data-count="50">50%</div>
          </div> -->
          
          <div class="col-8 my-3 d-flex flex-column align-items-center">
            <div class="d-flex">
              <div class="tool mb-4">PS</div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cubeDef"></div>
            </div>
            <div class="d-flex">
              <div class="tool mb-4">AI</div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cubeDef"></div>
            </div>
            <div class="d-flex">
              <div class="tool mb-4" style="font-size:16px;">PHP</div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cubeDef"></div>
            </div>
            <div class="d-flex">
              <div class="tool mb-4">JS</div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cubeDef"></div>
              <div class="cubeDef"></div>
            </div>
            <div class="d-flex">
              <div class="tool mb-4">BS</div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cubeDef"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- My work -->
  <section id="meWork" class="my-5">
    <div class="container">
      <div id="myworkTit" class="text-center title mx-3">My Work</div>
      <nav>
        <div class="nav justify-content-lg-start justify-content-center" id="nav-tab" role="tablist">
          <a class="mx-2 nav-link active" id="tabAll" data-bs-toggle="tab" href="#navAll" role="tab">All</a>
          <a class="mx-2 nav-link" id="tabWeb" data-bs-toggle="tab" href="#navWeb" role="tab">Web Design</a>
          <a class="mx-2 nav-link" id="tabGraphic" data-bs-toggle="tab" href="#navGraphic" role="tab">Graphic Design</a>
          <a class="mx-2 nav-link" id="tabPhoto" data-bs-toggle="tab" href="#navPhotography" role="tab">Photography</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="navAll" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-2 g-4" id="web">
            <div class="col mb-4">
              <div class="card bgShadow border-0">
                <a href="http://220.128.133.15/s1090419/calendar/" target="_blank">
                  <img src="./img/calendar.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Web Design<br>-Calendar</h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card bgShadow border-0">
                <a href="http://220.128.133.15/s1090419/invoice/" target="_blank">
                  <img src="./img/invoice.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Web Design<br>-Invoice</h5>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="my-3 row row-cols-1 row-cols-md-4 g-4">
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM1">
                <img src="./img/p.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Brand</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM2">
                <img src="./img/edm.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-EDM</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM3">
                <img src="./img/poster.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM7">
                <img src="./img/sport.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM4">
                <img src="./img/banner.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Banner</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM5">
                <img src="./img/m1.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Manual</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM8">
                <img src="./img/game.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Game</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM6">
                <img src="./img/puffing.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Photography<br>-Postcard</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="navWeb" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-2 g-4">
            <div class="col mb-4">
              <div class="card bgShadow border-0">
                <a href="http://220.128.133.15/s1090419/calendar/" target="_blank">
                  <img src="./img/calendar.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Web Design<br>-Calendar</h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card bgShadow border-0">
                <a href="http://220.128.133.15/s1090419/invoice/" target="_blank">
                  <img src="./img/invoice.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Web Design<br>-Invoice</h5>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="navGraphic" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-3 g-4">
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM4">
                <img src="./img/banner.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Banner</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM5">
                <img src="./img/m1.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Manual</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM8">
                <img src="./img/game.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Game</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM1">
                <img src="./img/p.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Brand</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM2">
                <img src="./img/edm.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM3">
                <img src="./img/poster.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM7">
                <img src="./img/sport.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="navPhotography" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-3 g-4">
            <div class="col mt-4">
              <div class="col ">
                <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workM6">
                  <img src="./img/puffing.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Photography<br>-Postcard</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="workM1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content overflow-auto">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Brand</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="m-auto">
            <img class="w-100" src="./img/p.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content overflow-auto">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Travel EDM</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <img class="w-100" src="./img/eDM.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM3" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Poster</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <img class="w-100" src="./img/poster-01.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM4" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <img class="w-100" src="./img/banner.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM5" tabindex="-1">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Manual</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div id="workCar5" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#workCar5" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#workCar5" data-bs-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./img/m1.jpg" class=" w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/m2.jpg" class=" w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#workCar5" role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#workCar5" role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM6" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Photography-Postcard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div id="workCar6" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#workCar6" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#workCar6" data-bs-slide-to="1"></li>
                <li data-bs-target="#workCar6" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./img/puffing.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/london.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/KATUNGA.jpg" class="d-block w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#workCar6" role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#workCar6" role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM7" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Postercard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div id="workCar7" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#workCar7" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#workCar7" data-bs-slide-to="1"></li>
                <li data-bs-target="#workCar7" data-bs-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./img/sport1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/sport2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/sport3.jpg" class="d-block w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#workCar7" role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#workCar7" role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="workM8" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Graphic Design-Game</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div id="workCar8" class="carousel slide" data-bs-ride="carousel">
              <ol class="carousel-indicators">
                <li data-bs-target="#workCar8" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#workCar8" data-bs-slide-to="1"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./img/game2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img src="./img/game.jpg" class="d-block w-100">
                </div>
              </div>
              <a class="carousel-control-prev" href="#workCar8" role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#workCar8" role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    </div>
  </section>
  <!-- Contact -->
  <section id="meContact" class="my-5">
    <div class="container overflow-hidden">
      <div id="contactmeTit" class="text-center my-5 title contitle">Contact ME</div>
      <div class="d-flex flex-column  flex-wrap">
        <form class="container d-flex flex-wrap my-2 border-bottom pb-5" action="api/add_msg.php" method="post">
          <div class="col-lg-5 col-md-5 col-12 form-floating mb-4 bgShadow">
            <input type="text" class="form-control border-0" id="name" name="name" placeholder="your name" required>
            <label for="name">NAME</label>
          </div>
          <div class="col-lg-6 col-md-6 col-12 offset-lg-1 offset-md-1 form-floating mb-4 bgShadow">
            <input type="tel" class="form-control border-0" id="tel" name="tel" placeholder="your number" minlength="8" maxlength="12" required>
            <label for="tel">PHONE NUMBER</label>
          </div>
          <div class="col-12 form-floating mb-4 bgShadow">
            <input type="email" class="form-control border-0" id="email" name="email" placeholder="email address" required>
            <label for="email">EMAIL</label>
          </div>
          <div class="col-12 form-floating mb-4 bgShadow">
            <textarea style="height:90px;" type="text" class="form-control border-0" id="msg"
              name="msg" placeholder="message" required></textarea>
            <label for="msg">MESSAGE</label>
          </div>
          <input type="hidden" name="table" value="resume_message">
          <div class="d-flex col justify-content-end">
            <input class="btn btn-secondary" style="font-weight: 600;" type="submit" value="SEND">
          </div>
        </form>
      </div>
      <div class="container d-flex flex-wrap align-items-lg-center justify-content-center info my-3">
        <div class="m-3 text-center col-12">
          <h3 class="subtitle">Contact Info</h3>
        </div>
        <div class="m-3">
          <a href="tel:0988763353">
            <i class="fas fa-mobile-alt"></i>&emsp; <b><?=$info['tel'];?></b>
          </a>
        </div>
        <div class="m-3">
          <i class="fas fa-map-marker-alt"></i>&emsp; <b><?=$info['addr'];?></b>
        </div>
        <div class="m-3">
          <a href="mailto:a0changj2@gmail.com.tw">
            <i class="fas fa-envelope"></i>&emsp; <b><?=$info['email'];?></b>
          </a>
        </div>
      </div>
    </div>


  </section>

  <!-- footer -->
  <footer class="text-center my-5">
    <small>
      <img src="./img/logo.svg" width="60px" alt=""><br>
      copyright &copy; 2021 <span style="color: #95a5a6;">CCJ Design</span>. All Rights Reserved
    </small>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/myself.js"></script>
</body>

</html>