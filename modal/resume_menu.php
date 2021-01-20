<form action="./api/add.php" method="post">
  <div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted justify-content-center">
    <div class="col-8">
      <label for="addMenu" class="form-label">Meun Title</label>
      <input class="form-control" id="addMenu" type="text" name="menu" required>
    </div>
    <div class="col-8">
      <label for="addHref" class="form-label">Link</label>
      <input class="form-control" id="addHref" type="text" name="href" required>
      <input type="hidden" name="table" value="<?=$do;?>">
    </div>
  </div>
  <div class=" col-8 d-flex my-4 align-items-center justify-content-center">
    <div class="me-2">
      <input type="submit" class="btn saveBtn" value="Add it!">
    </div>
  </form>
  <div>
    <input class="backbtn btn btn-outline-secondary" type="button" value="Cancel">
  </div>
</div>