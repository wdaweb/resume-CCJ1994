<?php
include_once "base.php";
$info=$pdo->query("select * from resume_info")->fetch(PDO::FETCH_ASSOC);
$menus=$pdo->query("select * from resume_menu where `sh`='1' && `parent`='0'")->fetchAll();
$exps=$pdo->query("select * from resume_exp where `sh`='1' order by id desc")->fetchAll();
$jobskills=$pdo->query("select * from resume_jobskill where `sh`='1'")->fetchAll();
$workWs=$pdo->query("select * from resume_mywork where `type`='1' && `sh`='1'")->fetchAll();
$workGs=$pdo->query("select * from resume_mywork where `type`='2' && `sh`='1'")->fetchAll();
$workPs=$pdo->query("select * from resume_mywork where `type`='3' && `sh`='1'")->fetchAll();
$workWebs=$pdo->query("select * from resume_mywork where `sh`='1'")->fetchAll();
$pic=$pdo->query("select * from resume_pic where `sh`='1'")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCJ's Resume</title>
  <link rel="shortcut icon" type="image/x-ico" href="./image/<?=$pic[0]['img'];?>">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VSZ0RSKMVY"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-VSZ0RSKMVY');
  </script>
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
            <input type="text" class="form-control border-0" id="floatingInput" placeholder="account" name="acc"
              required>
            <label for="floatingInput">Account</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control border-0" id="floatingPassword" placeholder="Password" name="pw"
              required>
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
        <button id="menubtn" class="navbar-toggler border-0" type="button" data-toggle="collapse"
          data-target="#mainMenu">
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
        <div>I'm Rowan Chang.</div>
        <p><?=$info['position'];?></p>
        <div class="hirebtn"><a class="p-2 text-center" href="#meContact">HIRE ME</a></div>
      </div>
      <div class="container col-12 col-md-6 d-flex justify-content-center mt-5">
        <img class="mepic1" src="./image/<?=$pic[1]['img'];?>">
      </div>
    </div>

  </section>
  <!-- About Me -->
  <section id="meAbout" class="my-5">
    <div class="container d-flex justify-content-around align-items-center flex-wrap">
      <div class="container text-center col-12 col-md-5">
        <div class="title bgsq">About Me</div>
        <div><img class="mepic2" src="./image/<?=$pic[2]['img'];?>" alt=""></div>
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
              href="https://www.cakeresume.com/pdf/s--6LR5klUHpoQWkyzj1TrQ4A--/xZ2mQ.pdf">Download CV</a></div>
        </div>
      </div>
    </div>
    <div id="life"></div>
  </section>
  <!-- Portfolio -->
  <section id="mePortfolio" class="my-5">
    <div class="container d-flex flex-wrap">
      <div class="d-md-block d-none col-12 border-bottom text-end title">
        <div id="portfolioTit">Portfolio</div>
      </div>
      <div class="container col-lg-6 col-12 my-5 order-lg-1">
        <div id="experenceTit" class="d-md-none d-block title border-top ">
          <div id="experienceTit">Experience</div>
        </div>
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
              <div class="card-body mb-4 expblock">
              <p><?=$exp['job'];?></p>
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
            <div class="numb numb<?=$skill['id'];?>" data-count="<?=$skill['level'];?>"></div>
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

          <!-- <div class="col-8 my-3 d-flex flex-column align-items-center">
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
          </div> -->
          <div class="col-8 my-3 d-flex flex-wrap justify-content-around text-center">
            <div class="col-5 m-2 tool2">
              <i class="fab fa-html5 fa-3x"></i><br><span>HTML</span>
            </div>
            <div class="col-5 m-2 tool2">
              <i class="fab fa-css3-alt fa-3x"></i><br><span>CSS</span>
            </div>
            <div class="col-5 m-2 tool2">
              <i class="fab fa-php fa-3x"></i><br><span>PHP</span>
            </div>
            <div class="col-5 m-2 tool2">
              <i class="fab fa-js-square fa-3x"></i><br><span>JavaScript</span>
            </div>
            <div class="col-5 m-2 tool2">
              <i class="fab fa-bootstrap fa-3x"></i><br><span>Bootstrap</span>
            </div>
            <div class="col-5 m-2 tool2">
              <svg x="0px" y="0px" viewBox="0 0 52 52" width="85">
                <path d="M1.7,51.4c-0.1-0.1-0.1-0.1-0.1-0.2c0.1-0.5,0.2-1,0.4-1.6c0.1-0.4,0.4-0.3,0.7-0.3c0.4,0,0.7-0.1,0.9-0.5
		                    c0.4-0.8,0.6-1.6,0.8-2.5C4.5,45.2,4.6,44.1,5,43c0.2-0.5,0.2-0.5,0.7-0.5c0.5,0,1,0,1.4,0c0.3,0,0.3,0.1,0.3,0.3
		                    c-0.1,0.4-0.1,0.8-0.3,1.1c-0.2,0.5-0.2,1-0.4,1.6c-0.3,1.1-0.5,2.3-0.8,3.4c-0.1,0.5-0.3,1-0.5,1.4c-0.3,0.6-0.8,0.8-1.3,1
		                    c-0.1,0-0.2,0-0.2,0.1C3.1,51.4,2.4,51.4,1.7,51.4z" />
                <path d="M27.4,33.4c-1.5,0-2.9-0.2-4.3-0.6c-2-0.5-3.9-1.4-5.6-2.5c-1.5-1-2.8-2.1-3.9-3.4c-1-1.1-1.9-2.4-2.7-3.8
		                    c-0.7-1.4-1.3-2.8-1.7-4.3C8.9,18,8.7,17,8.7,16.1c0-0.3,0-0.5-0.1-0.8c0-0.3,0-0.6,0-1c0.1-2.9,1-5.5,2.9-7.8
		                    c0.2-0.3,0.5-0.5,0.7-0.8c0.1-0.1,0.1-0.2,0.2-0.1c0.1,0.1,0,0.2,0,0.3c-0.3,1.2-0.4,2.5-0.5,3.8c0,0.1,0,0.2,0,0.4
		                    c0,0.2,0,0.4,0,0.6c0,0.1,0,0.3,0,0.4c0.1,0.2,0,0.4,0,0.6c0,0.1,0,0.2,0,0.4c0.1,0.9,0.2,1.7,0.3,2.5c0.5,2.6,1.7,4.9,3.4,7
		                    c1.6,1.9,3.5,3.4,5.6,4.8c1.8,1.1,3.7,2,5.7,2.5c1.2,0.3,2.5,0.5,3.7,0.5c0.3,0,0.7,0,1,0c1.5,0,3-0.2,4.4-0.7c2-0.6,3.9-1.5,5.5-3
		                    c0.3-0.2,0.5-0.5,0.9-0.8c-1.5,3.9-6.8,8.6-13.8,8.7C28.3,33.5,27.8,33.5,27.4,33.4z" />
                <path
                  d="M43.4,16.1c-0.4,0.9-0.9,1.7-1.5,2.5c-0.8,1-1.7,1.7-2.8,2.3c-1.2,0.7-2.6,1.2-4,1.4c-0.5,0.1-1.1,0.2-1.6,0.2
		                    c-0.1,0-0.2,0-0.3,0c-0.4,0-0.8,0-1.2,0c-0.1,0-0.2,0-0.4,0c-1.4-0.1-2.9-0.4-4.2-1C26.2,21,25,20.3,24,19.4
		                    c-1.5-1.2-2.7-2.6-3.6-4.3c-0.8-1.4-1.3-3-1.4-4.6c0-0.2,0-0.4-0.1-0.6c0-0.1,0-0.3,0-0.4c0-0.2,0-0.3,0-0.5c0-0.2,0-0.3,0-0.5
		                    c0.1-2.1,1.4-5.2,2.6-6c-0.2,0.8-0.2,1.7-0.4,2.5c0,0.1,0,0.2,0,0.3c0,0.1,0,0.2,0,0.4c0,0.2,0,0.5,0,0.7c0,0.1,0,0.3,0,0.4
		                    c0.1,2.6,0.9,4.9,2.5,7c1.2,1.5,2.7,2.7,4.3,3.6c1.3,0.7,2.6,1.4,4.1,1.7c0.7,0.2,1.3,0.3,2,0.3c0.1,0,0.3,0,0.4,0
		                    c0.4,0,0.7,0,1.1,0c2.4-0.2,4.6-0.9,6.5-2.5c0.4-0.3,0.7-0.7,1.1-1.1C43.5,15.9,43.5,16,43.4,16.1z" />
                <path d="M21.7,48c-0.5,0-1,0-1.5-0.2c-0.4-0.1-0.7-0.4-0.9-0.8c-0.4-0.7-0.3-1.4-0.2-2.2c0.2-1.3,0.5-2.7,0.7-4
		                    c0.1-0.4,0.2-0.7,0.2-1.1c0,0,0-0.1,0.1-0.1c0.7,0,1.3-0.1,2,0c0.1,0.8-0.2,1.5-0.3,2.3c-0.1,0.7-0.3,1.3-0.4,2
		                    c-0.1,0.6-0.1,1.2,0.1,1.8c0.8,0,1.5,0,2.3,0c0.4-1.9,0.8-3.8,1.2-5.6c0.1-0.3,0.2-0.5,0.5-0.4c0.5,0,0.9,0,1.4,0
		                    c0.3,0,0.3,0.1,0.3,0.4c-0.2,1.1-0.5,2.3-0.7,3.4c-0.2,1.2-0.5,2.3-0.7,3.5c0,0.2-0.1,0.5-0.2,0.8c0,0.2-0.1,0.2-0.3,0.2
		                    c-0.4,0-0.8,0-1.2,0C23.3,48.1,22.5,48.1,21.7,48z" />
                <path d="M27.5,4.3c0-1.3,0.5-2.5,1.3-3.6c0.1-0.1,0.1-0.2,0.2-0.2c0.1,0.1,0,0.2,0,0.3c0,0.3,0,0.6-0.1,0.9
		                    c-0.1,0.1,0,0.3,0,0.4c0,0.1,0,0.2,0,0.3c0.1,0.1,0,0.3,0,0.4c0.1,1.9,0.8,3.5,2,4.8c1.4,1.5,3,2.6,5,3.1c0.5,0.1,1,0.2,1.5,0.2
		                    c0.3,0,0.5,0,0.8,0c0.6,0,1.2-0.2,1.8-0.3c0.6-0.1,1.1-0.4,1.8-0.7c-0.4,0.8-1,1.3-1.6,1.8c-0.9,0.7-1.9,1-3.1,1.1
		                    c-0.1,0-0.2,0-0.3,0.1c-0.4-0.1-0.7,0-1.1,0c-1.2-0.1-2.4-0.3-3.5-0.9c-1-0.5-1.9-1.1-2.6-2c-1-1.2-1.7-2.5-2.1-3.9
		                    c-0.1-0.4-0.1-0.7-0.1-1.1C27.5,4.7,27.5,4.5,27.5,4.3z" />
                <path
                  d="M42,48c0.3-0.4,0.4-1,0.4-1.5c0-0.1,0-0.2,0-0.4c-0.1-1-0.5-2-0.7-2.9c-0.1-0.3-0.1-0.5-0.2-0.8
		                    c0.4-0.1,0.9,0,1.3,0c0.3,0,0.7,0,1,0c0.2,0.3,0.2,0.7,0.3,1c0,0.1,0,0.2,0.1,0.2c0.1,0,0.1-0.1,0.2-0.2c0.3-0.4,0.5-0.7,0.8-1.1
		                    c0.8-1.2,1.7-2.4,2.5-3.7c0.2-0.1,0.3,0,0.5,0c0.7,0,1.4-0.1,2.1,0c-0.2,0.5-0.5,0.9-0.8,1.4c-0.4,0.5-0.7,1-1.1,1.5
		                    c-0.4,0.5-0.8,0.9-1.1,1.4c-0.6,0.9-1.3,1.7-1.9,2.7c-0.4,0.7-0.8,1.5-1,2.4c-0.2,0.1-0.4,0-0.6,0C43.2,48,42.6,48.1,42,48z" />
                <path d="M41.3,41.9c-0.7,0-1.4,0-2.2,0c-0.3,0-0.4,0.1-0.4,0.3c-0.2,1.3-0.5,2.6-0.8,3.8c-0.1,0.6-0.3,1.2-0.4,1.7
		                    c0,0.2-0.1,0.2-0.2,0.2c-0.6,0-1.2,0-1.8,0c-0.3,0-0.1-0.2-0.1-0.3c0.1-0.5,0.2-1,0.3-1.5c0.4-2,0.8-3.9,1.2-5.9
		                    c0.1-0.3,0.1-0.4,0.4-0.4c0.8,0,1.7,0,2.5,0c0.8,0,1.6,0.1,2.4,0c0.7,0,1.2,0.6,1.3,1.3c0,0.2,0.2,0.5,0,0.7c-0.1,0.1-0.4,0-0.7,0
		                    C42.5,41.9,41.9,41.9,41.3,41.9z" />
                <path d="M8,39.9c0,0.2-0.1,0.5-0.1,0.7c-0.1,0.4-0.1,0.8-0.3,1.2c-0.1,0.1-0.2,0-0.3,0c-0.7,0-1.3,0.1-2,0
		                    c0.1-0.6,0.3-1.2,0.4-1.8c0,0,0,0,0,0C6.5,39.9,7.2,39.8,8,39.9z" />
                <path d="M17.7,46C17.6,46,17.6,46,17.7,46c-0.2-0.1-0.3,0-0.4-0.1c-0.2,0.1-0.2,0-0.2-0.2c0.2-0.6,0.4-1.1,0.6-1.7
		                    c0.3-1,0.7-1.9,0.6-3c0-0.3-0.1-0.6-0.2-0.9c-0.6-1.7-1.9-2.4-3.6-2.6c-0.3,0-0.5,0-0.8,0c-0.2,0-0.3,0-0.5,0.1
		                    c-1.2,0.2-2.2,0.7-3,1.6c-1.1,1.3-1.7,2.9-1.9,4.6c0,0.1,0,0.2,0,0.3c0,0.7,0,1.5,0.3,2.2c0.3,0.7,0.8,1.3,1.6,1.5
		                    c0.6,0.2,1.3,0.2,1.9,0.2c0.3,0.1,0.6,0,0.8,0c0.6,0,1.2,0,1.8,0c0.4,0,0.9,0,1.3,0c0.5,0,0.9,0,1.4,0c0.3,0,0.3-0.1,0.4-0.3
		                    c0.1-0.4,0.2-0.9,0.3-1.3C18.1,46,18.1,46,17.7,46z M15.4,43.8c-0.2,0.7-0.4,1.3-0.6,2c-0.1,0.2-0.1,0.3-0.3,0.3c-0.3,0-0.6,0-1,0
		                    c-0.4,0-0.9,0-1.4-0.1c-0.5-0.1-0.9-0.3-1.1-0.7c-0.1-0.2-0.1-0.3-0.1-0.5c0-1.2,0.3-2.3,0.7-3.4c0.3-0.7,0.8-1.2,1.5-1.4
		                    c0.6-0.2,1.2-0.2,1.7,0c0.6,0.2,1.1,0.9,1.1,1.5C15.8,42.2,15.5,43,15.4,43.8z" />
                <path
                  d="M35.3,42c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.6-0.4-1.1-1-1.4c-1-0.6-2.1-0.6-3.2-0.4c-1,0.2-1.9,0.7-2.5,1.5
		                    c-0.3,0.5-0.5,1-0.7,1.5c-0.3,1.1-0.7,2.3-0.5,3.5c0.1,0.7,0.4,1.2,1.1,1.5c0.5,0.2,0.9,0.2,1.4,0.3c0.1,0,0.2,0,0.3,0
		                    c0.2,0,0.3,0,0.5,0c0.4,0,0.8,0,1.2,0c0.3,0.1,0.6,0,0.8,0c0.3,0,0.6,0,0.9,0c0.1,0,0.1,0,0.2,0c0.3,0,0.5-0.1,0.5-0.4
		                    c0.1-0.4,0.1-0.9,0.3-1.3c0.1-0.1,0-0.2-0.1-0.2c-0.4,0-0.9,0-1.3,0c-0.5,0-1-0.1-1.5-0.1c-0.1-0.1-0.3,0-0.4-0.1
		                    c-0.2,0.1-0.5,0-0.7,0c-0.4,0-0.6-0.2-0.8-0.6c0-0.1,0-0.2,0-0.3c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.2,0,0.3,0c1.5,0,3,0,4.6,0
		                    c0.1,0,0.2,0,0.3,0c0.2-0.8,0.3-1.6,0.5-2.3C35.2,42.2,35.2,42.1,35.3,42z M32.9,42.8c0,0.1-0.1,0.1-0.3,0.1c-0.8,0-1.6,0-2.4,0
		                    c-0.3,0-0.3-0.1-0.2-0.4c0.4-0.7,0.9-1,1.8-0.9c0.5,0.1,0.9,0.2,1,0.8c0,0,0,0,0,0c0,0,0,0,0,0C32.9,42.6,32.9,42.7,32.9,42.8z" />
              </svg>
            </div>
            <div class="col-5 m-2 tool2">
              <svg x="0px" y="0px" viewBox="0 0 52 52" width="55">
                <polygon points="16.2,42.3 13.1,50.7 33.4,50.7 30.3,42.3 	" />
                <path d="M26.5,17l12.9,33.7h3.7V26.3h5.4v24.4H49c0.9,0,1.7-0.8,1.7-1.7V3c0-0.9-0.8-1.7-1.7-1.7H3
		                  C2.1,1.3,1.3,2.1,1.3,3v45.8c0,0.9,0.8,1.7,1.7,1.7h4.2l12.9-33.7h6.4V17z M43.2,17.3c0.8-0.6,1.6-0.9,2.6-0.9
		                  c1.1,0,1.9,0.3,2.6,0.9c0.6,0.6,1.1,1.6,1.1,2.5s-0.3,1.9-1.1,2.6c-0.8,0.6-1.6,0.9-2.6,0.9c-1.1,0-1.9-0.3-2.6-0.9
		                  c-0.8-0.8-1.1-1.6-1.1-2.6S42.4,17.9,43.2,17.3z" />
                <polygon points="23.4,22.9 23.2,22.9 17.9,37.6 28.8,37.6" />
              </svg><br><span>Illustrator</span>
            </div>
            <div class="col-5 m-2 tool2">
              <svg x="0px" y="0px" viewBox="0 0 52 52" width="55">
                <path d="M22.3,34.4c0.9-0.8,1.4-2,1.4-3.7c0-1.7-0.5-3-1.6-3.7c-0.9-0.8-2.5-1.1-4.5-1.1h-6.9v9.8h6.9
		                    C19.8,35.5,21.3,35.2,22.3,34.4z" />
                <path
                  d="M49.3,1.2H3.1c-0.9,0-1.7,0.8-1.7,1.7V49c0,0.9,0.8,1.7,1.7,1.7h2.8V21.8h12c7,0,10.6,3,10.6,8.9
		                    s-3.6,9.1-10.6,9.1h-7.2v11.1h29.7c-5.9,0-9.1-2.5-9.5-7.3h4.7c0.3,1.4,0.8,2.3,1.4,2.8c0.6,0.5,1.7,0.8,3.3,0.8
		                    c3.3,0,4.8-0.9,4.8-2.7c0-0.9-0.6-1.7-1.9-2.3c-0.6-0.3-2-0.6-4.2-1.2c-2.5-0.6-4.2-1.2-5.3-1.9c-1.6-1.1-2.5-2.5-2.5-4.2
		                    c0-2,0.8-3.4,2.3-4.5c1.6-1.1,3.6-1.7,6.2-1.7c5.5,0,8.6,2.2,9.1,6.7h-4.5c-0.3-1.1-0.8-1.9-1.4-2.2c-0.6-0.5-1.7-0.6-3.1-0.6
		                    c-1.2,0-2.2,0.2-2.8,0.5c-0.8,0.3-1.1,0.9-1.1,1.7c0,0.6,0.5,1.2,1.7,1.7c0.6,0.3,2,0.6,4.2,1.2c2.3,0.6,4.2,1.2,5.3,2
		                    c1.7,1.1,2.5,2.5,2.5,4.4c0,4.5-3.1,6.7-9.5,6.7h8.7c0.9,0,1.7-0.8,1.7-1.7V2.9C51,1.9,50.2,1.2,49.3,1.2z" />
              </svg><br><span>Photoshop</span>
            </div>
            <div class="col-5 m-2 tool2">
            <i class="fas fa-address-card fa-3x"></i><br><span>網頁設計乙級</span>
            </div>
            <div class="col-5 m-2 tool2">
              <i class="far fa-address-card fa-3x"></i><br><span>印前製程乙級</span>
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
          <a class="mx-2 nav-link active" id="tabWeb" data-bs-toggle="tab" href="#navWeb" role="tab">Web Design</a>
          <a class="mx-2 nav-link" id="tabGraphic" data-bs-toggle="tab" href="#navGraphic" role="tab">Graphic Design</a>
          <a class="mx-2 nav-link" id="tabPhoto" data-bs-toggle="tab" href="#navPhotography" role="tab">Photography</a>
          <a class="mx-2 nav-link" id="tabAll" data-bs-toggle="tab" href="#navAll" role="tab">All</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="navAll" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-3 g-4" id="web">

            <?php foreach($workWs as $w){ 
              $wnote=explode(",",$w['note']); ?>
            <div class="col mb-2">
              <div class="card bgShadow border-0 h-100">
                <a href="<?php echo $wnote[0];?>" target="_blank">
                  <img src="./image/<?=$w['img']?>" class="card-img-top">
                  <div class="card-body text-muted">
                    <h5 class="card-title">應用技術</h5>
                    <p class="card-text small"><?php echo $wnote[1];?></p>
                  </div>
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">
                      <?php $wtext=explode(",",$w['text']);
                      echo $wtext[0]."<br>".$wtext[1];?>
                    </h5>
                  </div>
                </a>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="col mb-4">
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
            </div> -->
          </div>

          <div class="my-3 row row-cols-1 row-cols-md-4 g-4">
            <?php foreach($workGs as $g){ ?>
            <div class="col mt-4">
              <div class="card bgShadow border-0 h-100" data-bs-toggle="modal" data-bs-target="#workG<?=$g['id']?>">
                <img src="./image/<?=$g['img'];?>" class="card-img-top rounded">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">
                    <?php $gtext=explode(",",$g['text']);
                      echo $gtext[0]."<br>".$gtext[1];?>
                  </h5>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG3">
                <img src="./img/p.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Brand</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG4">
                <img src="./img/edm.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-EDM</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG5">
                <img src="./img/poster.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG6">
                <img src="./img/sport.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG7">
                <img src="./img/banner.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Banner</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG8">
                <img src="./img/m1.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Manual</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG9">
                <img src="./img/game.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Game</h5>
                </div>
              </div>
            </div> -->
            <?php foreach($workPs as $p){ ?>
            <div class="col mt-4">
              <div class="card bgShadow border-0 h-100" data-bs-toggle="modal" data-bs-target="#workP<?=$p['id'];?>">
                <img src="./image/<?=$p['img'];?>" class="card-img-top rounded">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">
                    <?php $ptext=explode(",",$p['text']);
                      echo $ptext[0]."<br>".$ptext[1];?>
                  </h5>
                </div>
              </div>
            </div>
            <?php }; ?>
            <!-- <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workP10">
                <img src="./img/puffing.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Photography<br>-Postcard</h5>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="tab-pane fade show active" id="navWeb" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($workWs as $w){ 
              $wnote=explode(",",$w['note']);?>
            <div class="col mb-4">
              <div class="card bgShadow border-0 h-100">
                <a href="<?php echo $wnote[0];?>" target="_blank">
                  <img src="./image/<?=$w['img']?>" class="card-img-top">
                  <div class="card-body text-muted">
                    <h5 class="card-title">應用技術</h5>
                    <p class="card-text small"><?php echo $wnote[1];?></p>
                  </div>
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">
                      <?php $wtext=explode(",",$w['text']);
                      echo $wtext[0]."<br>".$wtext[1];?>
                    </h5>
                  </div>
                </a>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="col mb-4">
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
            </div> -->

          </div>
        </div>
        <div class="tab-pane fade" id="navGraphic" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-4 g-4">
            <?php foreach($workGs as $g){ ?>
            <div class="col mt-4">
              <div class="card bgShadow border-0 h-100" data-bs-toggle="modal" data-bs-target="#workG<?=$g['id']?>">
                <img src="./image/<?=$g['img'];?>" class="card-img-top rounded">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">
                    <?php $gtext=explode(",",$g['text']);
                      echo $gtext[0]."<br>".$gtext[1];?>
                  </h5>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG7">
                <img src="./img/banner.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Banner</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG8">
                <img src="./img/m1.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Manual</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG9">
                <img src="./img/game.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Game</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG3">
                <img src="./img/p.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Brand</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG4">
                <img src="./img/edm.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG5">
                <img src="./img/poster.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div>
            <div class="col mt-4">
              <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workG6">
                <img src="./img/sport.png" class="card-img-top">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">Graphic Design<br>-Poster</h5>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="tab-pane fade" id="navPhotography" role="tabpanel">
          <div class="my-3 row row-cols-1 row-cols-md-3 g-4 ">
            <?php foreach($workPs as $p){ ?>
            <div class="col mt-4">
              <div class="card bgShadow border-0 h-100" data-bs-toggle="modal" data-bs-target="#workP<?=$p['id'];?>">
                <img src="./image/<?=$p['img'];?>" class="card-img-top rounded">
                <div class="d-flex align-items-center justify-content-center hoverContent">
                  <h5 class="subtitle text-center">
                    <?php $ptext=explode(",",$p['text']);
                      echo $ptext[0]."<br>".$ptext[1];?>
                  </h5>
                </div>
              </div>
            </div>
            <?php }; ?>
            <!-- <div class="col mt-4">
              <div class="col ">
                <div class="card bgShadow border-0" data-bs-toggle="modal" data-bs-target="#workP10">
                  <img src="./img/puffing.png" class="card-img-top">
                  <div class="d-flex align-items-center justify-content-center hoverContent">
                    <h5 class="subtitle text-center">Photography<br>-Postcard</h5>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <?php foreach($workGs as $g){ ?>
    <div class="modal fade" id="workG<?=$g['id']?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content overflow-auto">
          <div class="modal-header">
            <h5 class="modal-title">
              <?php 
              $gtext=explode(",",$g['text']);
              echo $gtext[0].$gtext[1];?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="m-auto">
            <img class="w-100" src="./image/<?=$g['img']?>" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php foreach($workPs as $p){ ?>
    <div class="modal fade " id="workP<?=$p['id']?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content overflow-auto">
          <div class="modal-header">
            <h5 class="modal-title">
              <?php 
              $ptext=explode(",",$p['text']);
              echo $ptext[0].$ptext[1];?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="m-auto">
            <img class="w-100" src="./image/<?=$p['img']?>" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- <div class="modal fade" id="workG3" tabindex="-1">
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
    <div class="modal fade" id="workG4" tabindex="-1">
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
    <div class="modal fade" id="workG5" tabindex="-1">
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
    <div class="modal fade" id="workG6" tabindex="-1">
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
    <div class="modal fade" id="workG7" tabindex="-1">
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
    <div class="modal fade" id="workG8" tabindex="-1">
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
    <div class="modal fade" id="workG9" tabindex="-1">
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
    <div class="modal fade" id="workP10" tabindex="-1">
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
    </div> -->

    </div>
  </section>
  <!-- Contact -->
  <section id="meContact" class="mt-5 mb-2">
    <div class="container overflow-hidden">
      <div id="contactmeTit" class="text-center my-5 title contitle">Contact ME</div>
      <div class="d-flex flex-column  flex-wrap">
        <form class="container d-flex flex-wrap my-2 border-bottom pb-5" action="api/add_msg.php" method="post">
          <div class="col-lg-5 col-md-5 col-12 form-floating mb-4 bgShadow">
            <input type="text" class="form-control border-0" id="name" name="name" placeholder="your name" required>
            <label for="name">NAME</label>
          </div>
          <div class="col-lg-6 col-md-6 col-12 offset-lg-1 offset-md-1 form-floating mb-4 bgShadow">
            <input type="tel" class="form-control border-0" id="tel" name="tel" placeholder="your number" minlength="8"
              maxlength="12" required>
            <label for="tel">PHONE NUMBER</label>
          </div>
          <div class="col-12 form-floating mb-4 bgShadow">
            <input type="email" class="form-control border-0" id="email" name="email" placeholder="email address"
              required>
            <label for="email">EMAIL</label>
          </div>
          <div class="col-12 form-floating mb-4 bgShadow">
            <textarea style="height:90px;" type="text" class="form-control border-0" id="msg" name="msg"
              placeholder="message" required></textarea>
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
        <div class="my-3">
          <a class="mx-2" href="https://github.com/CCJ1994"><i style="color:#57606f;" class="fab fa-github"></i></a>
          <a class="mx-2" href="https://codepen.io/CCJ1994"><i style="color:#57606f;" class="fab fa-codepen"></i></a>
        </div>
      </div>
    </div>


  </section>

  <!-- footer -->
  <footer class="text-center my-1">
    <small>
      <img src="./image/<?=$pic[3]['img'];?>" width="60px" alt=""><br>
      copyright &copy; 2021 <span style="color: #95a5a6;">CCJ Design</span>. All Rights Reserved
    </small>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/myself.js"></script>
</body>

</html>