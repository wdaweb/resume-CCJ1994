<?php include_once "../base.php";?>
<form action="./api/upload.php" method="post" enctype="multipart/form-data">
  <div class="text-end my-2 border-bottom addtitle">
    <h4>更換圖片</h4>
  </div>
  <div class="row g-3 text-muted justify-content-center my-4">
    <div class="col-8">
      <div class="input-group">
        <input type="file" class="form-control" name="img">
      </div>
    </div>
    <div class="col-8 d-flex justify-content-end">
      <div class="mx-2">
        <input type="submit" class="btn saveBtn" value="更換">
      </div>
      <div>
        <input class="cancelbtn btn btn-outline-secondary" type="button" value="取消">
      </div>
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
  </div>
</form>

<script>
$(".cancelbtn").click(function() {
  $("#chgModal").fadeOut();
});
</script>