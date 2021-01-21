<form action="./api/add.php" method="post">
  <div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted">
    <div class="col-md-7">
      <label for="addEmail" class="form-label">Email</label>
      <input class="form-control" id="addEmail" type="email" name="email" required>
    </div>
    <div class="col-md-5">
      <label for="addTel" class="form-label">Phone Number</label>
      <input class="form-control" id="addTel" type="text" name="tel" required>
    </div>
    <div class="col-6">
      <label for="addPosition" class="form-label">Position</label>
      <input class="form-control" id="addPosition" type="text" name="position" required>
    </div>
    <div class="col-6">
      <label for="addAddress" class="form-label">Address</label>
      <input class="form-control" id="infoAddress" type="text" name="addr" required>
    </div>
    <div class="col-md-12">
      <label for="addIntro" class="form-label">Autobiography</label>
      <textarea type="text" class="form-control" id="addIntro" name="intro" required></textarea>
      <input type="hidden" name="table" value="<?=$do;?>">
    </div>
  </div>
  <div class="d-flex my-2 align-items-center">
    <div class="me-2">
      <input type="submit" class="btn saveBtn" value="Add it!">
    </div>
  </form>
  <div>
    <input class="backbtn btn btn-outline-secondary" type="button" value="Cancel">
  </div>
</div>