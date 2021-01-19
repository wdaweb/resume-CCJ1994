<?php
include_once "../base.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>忘記密碼</title>
  <link rel="shortcut icon" type="image/x-ico" href="img/favicon.ico">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/7e94f0c211.js" crossorigin="anonymous"></script>
</head>

<body>

  <form action="?" method="post">
    <div class="container my-5 mx-auto">
      <div class="col-md-6 my-5">
        <label for="email" class="form-label">請輸入信箱</label>
        <input name="email" class="form-control" id="email" type="text" required>
      </div>
      <div class="col-6 my-5">
        <label for="ques" class="form-label">請選擇問題，並輸入正確答案</label>
        <select select name="ques" id="ques" class="form-select" required>
          <option value="1">你畢業的國小是？</option>
          <option value="2">你的身高是？</option>
          <option value="3">你的體重是？</option>
        </select>
      </div>
      <div class="col-md-6 my-5">
        <label for="ans" class="form-label">Ans:</label>
        <input name="ans" class="form-control" id="ans" type="text" required>
      </div>
      <div class="my-5 me-5 d-flex justify-content-start">
        <input type="submit" class="btn btn-secondary" value="查詢">
        <div class="ms-5">
          <?php
          if(isset($_POST['email']) && isset($_POST['ques']) && isset($_POST['ans'])){
            $sql="select * from resume_admin where `email`='{$_POST['email']}' && `ques`='{$_POST['ques']}' && `ans`='{$_POST['ans']}' ";
            $chk=$pdo->query($sql)->fetch();
            
            if(!empty($chk)){
                $res=$chk['pw'];
                echo "密碼：".$chk['pw'];
                echo "<br><a href='../index.php'>立即登入</a>";
            }else{
                echo "查無此人,請重新輸入";
            }
          }
            ?>
        </div>
      </div>
    </div>
  </form>



</body>

</html>