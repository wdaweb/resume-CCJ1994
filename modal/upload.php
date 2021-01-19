<?php include_once "../base.php";?>
<div class="text-end my-2 border-bottom addtitle">
  <h4>更換圖片</h4>
</div>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
  <div>
    <input type="file" name="img" id="">
  </div>
  <div>
    <input type="submit" value="修改">
  </div>
  <input type="hidden" name="table" value="<?=$_GET['table'];?>">
  <input type="hidden" name="id" value="<?=$_GET['id'];?>">
</form>
<div>
  <button class="cancelbtn" type="button">取消</button> 
</div> 

<script>
$(".cancelbtn").click(function () {
      $("#chgModal").fadeOut();
    });
</script>
