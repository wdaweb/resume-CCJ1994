<form action="./api/add.php" method="post">
  <div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted">
    <div class="col-6">
      <label for="addYear" class="form-label">Year</label>
      <input class="form-control" id="addYear" type="text" name="year">
    </div>
    <div class="col-6">
      <label for="addMonth" class="form-label">Month</label>
      <input class="form-control" id="addMonth" type="text" name="month">
    </div>
    <div class="col-12">
      <label for="addCompany" class="form-label">Company</label>
      <input class="form-control" id="addCompany" type="text" name="company">
    </div>
  
    <div class="col-12">
      <label for="addJob" class="form-label">Position</label>
      <textarea type="text" class="form-control" id="addJob" name="job"></textarea>
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