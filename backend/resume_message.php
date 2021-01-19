<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
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
      $sql="select * from {$do} where `sh`='0'"; 
      $rows=$pdo->query($sql)->fetchAll();
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
                <?=substr($row['date'],0,10);?> <?=substr( $row['msg'], 0 , 10 );?>...
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
                    <input class="form-check-input" type="checkbox" id="msgrd" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
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
      </div>
      <div class="tab-pane fade p-3" id="readed" role="tabpanel">
        <?php
      $sql="select * from {$do} where `sh`='1'"; 
      $rows=$pdo->query($sql)->fetchAll();
      if(empty($rows)){
        echo "no Message";
      }else{
      foreach($rows as $row){
      ?>
        <div class="accordion accordion-flush" id="msgcontent">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse<?=$row['id'];?>">
                <?=substr($row['date'],0,10);?> <?=substr( $row['msg'], 0 , 10 );?>...
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
                    <input class="form-check-input" type="checkbox" id="msgrd" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
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
      </div>

    </div>
  
</form>