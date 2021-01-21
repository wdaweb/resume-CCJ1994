<form action="./api/add.php" method="post" enctype="multipart/form-data">
  <div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted justify-content-center my-4">
    <div class="col-8">
      <label for="addworks" class="form-label">作品</label>
      <select select name="type" id="addworks" class="form-select" required>
        <option selected>請選擇作品類型</option>
        <option value="1">Web Design</option>
        <option value="2">Graphic Design</option>
        <option value="3">Photography</option>
      </select>
    </div>
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
      <label for="addNote" class="form-label">Note</label>
      <textarea class="form-control" id="addNote" name="note"></textarea>
    </div>
    <div class="col-8">
      <input type="submit" class="btn saveBtn" value="Add it!">
    </div>
  </div>
</form>