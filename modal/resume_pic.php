<form action="./api/add.php" method="post" enctype="multipart/form-data">
<div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted justify-content-center my-4">
    <div class="col-8">
      <div class="input-group">
        <input type="file"  class="form-control" name="img" required>
      </div>
    </div>
    <div class="col-8">
      <label for="addText" class="form-label">Description</label>
      <textarea class="form-control" id="addText" name="text" required></textarea>
      <input type="hidden" name="table" value="<?=$do;?>">
    </div>
    <div class="col-8">
      <input type="submit" class="btn saveBtn" value="Add it!">
    </div>
  </div>
</form>