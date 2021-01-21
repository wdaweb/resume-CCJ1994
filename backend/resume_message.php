<?php
$all_new=$pdo->query("select count(*) from {$do} where `sh`='0'")->fetchColumn();
$all=$pdo->query("select count(*) from {$do} where `sh`='1'")->fetchColumn();
$div=5;
$pages_new=ceil($all_new/$div);
$pages=ceil($all/$div);
$now=(isset($_GET['p']))?$_GET['p']:1;
$start=($now-1)*$div;
?>
<form action="./api/edit.php" method="post">
  <div class="d-flex justify-content-between pt-3 pb-2 mb-3 border-bottom">
    <h2 class="title">Message</h2>
    <button class="btn saveBtn" type="submit">Save</button>
  </div>
  <ul class="nav nav-tabs border-0" id="msgTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" data-bs-toggle="tab" href="#unread" role="tab">新留言</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" data-bs-toggle="tab" href="#readed" role="tab">已讀</a>
    </li>
  </ul>
  <div class="tab-content " id="msgTabContent">
    <div class="tab-pane fade show active p-3" id="unread" role="tabpanel">
      <?php
      $sql_unr="select * from {$do} where `sh`='0' limit $start,$div"; 
      $rows=$pdo->query($sql_unr)->fetchAll();
      if(empty($rows)){
        echo "no Message";
      }else{
      foreach($rows as $row){
      ?>
      <div class="accordion accordion-flush" id="unmsgcontent">
        <div class="accordion-item overflow-hidden">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse<?=$row['id'];?>">
              <?=substr($row['date'],0,10);?> <?=$row['name'];?> <?=substr( $row['msg'], 0 , 10 );?>...
            </button>
          </h2>
          <div id="collapse<?=$row['id'];?>" class="accordion-collapse collapse mb-2" data-bs-parent="#unmsgcontent">
            <div class="accordion-body text-muted">
              <div class="d-flex flex-wrap">
                <div class="col-lg-4 col-12 flex-shrink-0">
                  <div>from:<?=$row['name'];?></div>
                  <div>Tel:<?=$row['tel'];?></div>
                </div>
                <div class="col-lg-8 col-12 flex-shrink-0">
                  <div>Email:<?=$row['email'];?></div>
                  <div><?=$row['msg'];?></div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <div class="form-check mx-5">
                  <input class="form-check-input" type="checkbox" id="msgrd<?=$row['id'];?>" name="sh[]" value="<?=$row['id'];?>"
                    <?=($row['sh']==1)?'checked':'';?>>
                  <label class="form-check-label" for="msgrd<?=$row['id'];?>">
                    Read
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="msgDel<?=$row['id'];?>" name="del[]" value="<?=$row['id'];?>">
                  <label class="form-check-label" for="msgDel<?=$row['id'];?>">
                    Delete!
                  </label>
                </div>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?=$do;?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }
          }  ?>
      <div class="d-flex justify-content-center align-items-center mt-3">
        <?php if(($now-1)>0){ ?>
        <div class="me-2">
          <a href="?do=resume_message&p=<?=$now-1;?>"><i class="fas fa-caret-left fa-2x" style="color:#273c75;"></i></a>
        </div>
        <?php } ?>
        <div class="btn-toolbar " role="toolbar">
          <div class="btn-group me-2" role="group">
            <?php for($i=1;$i<=$pages_new;$i++){
            if($i==$now){ ?>
            <a class="btn btn-secondary" href="?do=resume_message&p=<?=$i;?>">
              <?=$i;?>
            </a>
            <?php  }else{ ?>
            <a class="btn btn-outline-secondary" href="?do=resume_message&p=<?=$i;?>">
              <?=$i;?>
            </a>
            <?php  }
        }?>
          </div>
        </div>
        <?php  if($now+1<=$pages_new){ ?>
        <div class="ms-2">
          <a href="?do=resume_message&p=<?=$now+1;?>"><i class="fas fa-caret-right fa-2x" style="color:#273c75;"></i></a>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="tab-pane fade p-3" id="readed" role="tabpanel">
      <?php
      $sql="select * from {$do} where `sh`='1' limit $start,$div"; 
      $rows=$pdo->query($sql)->fetchAll();
      if(empty($rows)){
        echo "沒有已讀訊息...";
      }else{
      foreach($rows as $row){
      ?>
      <div class="accordion accordion-flush" id="msgcontent">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse<?=$row['id'];?>">
              <?=substr($row['date'],0,10);?> <?=$row['name'];?> <?=substr( $row['msg'], 0 , 10 );?>...
            </button>
          </h2>
          <div id="collapse<?=$row['id'];?>" class="accordion-collapse collapse" data-bs-parent="#msgcontent">
            <div class="accordion-body text-muted">
              <div class="d-flex flex-wrap">
                <div class="col-lg-4 col-12 flex-shrink-0">
                  <div>from:<?=$row['name'];?></div>
                  <div>Tel:<?=$row['tel'];?></div>
                </div>
                <div class="col-lg-8 col-12 flex-shrink-0">
                  <div>Email:<?=$row['email'];?></div>
                  <div><?=$row['msg'];?></div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <div class="form-check mx-5">
                  <input class="form-check-input" type="checkbox" id="msgrd" name="sh[]" value="<?=$row['id'];?>"
                    <?=($row['sh']==1)?'checked':'';?>>
                  <label class="form-check-label" for="msgrd">
                    Read
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="msgDel" name="del[]" value="<?=$row['id'];?>">
                  <label class="form-check-label" for="msgDel">
                    Delete!
                  </label>
                </div>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?=$do;?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }
          }  ?>
      <div class="d-flex justify-content-center align-items-center mt-3">
        <?php if(($now-1)>0){ ?>
        <div class="me-2">
          <a href="?do=resume_message&p=<?=$now-1;?>"><i class="fas fa-caret-left fa-2x" style="color:#273c75;"></i></a>
        </div>
        <?php } ?>
        <div class="btn-toolbar " role="toolbar">
          <div class="btn-group me-2" role="group">
            <?php for($i=1;$i<=$pages;$i++){
            if($i==$now){ ?>
            <a class="btn btn-secondary" href="?do=resume_message&p=<?=$i;?>">
              <?=$i;?>
            </a>
            <?php  }else{ ?>
            <a class="btn btn-outline-secondary" href="?do=resume_message&p=<?=$i;?>">
              <?=$i;?>
            </a>
            <?php  }
        }?>
          </div>
        </div>
        <?php  if($now+1<=$pages){ ?>
        <div class="ms-2">
          <a href="?do=resume_message&p=<?=$now+1;?>"><i class="fas fa-caret-right fa-2x" style="color:#273c75;"></i></a>
        </div>
        <?php } ?>
      </div>

    </div>
  </div>


</form>