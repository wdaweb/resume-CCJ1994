<form action="./api/add.php" method="post">
  <div class="text-end my-2 border-bottom addtitle">
    <h4 ><?=$addstr[$do];?></h4>
  </div>
  <div class="row g-3 text-muted">
    <div class="col-md-7">
      <label for="addEmail" class="form-label">Email</label>
      <input class="form-control" id="addEmail" type="email" name="email">
    </div>
    <div class="col-md-5">
      <label for="addTel" class="form-label">Phone Number</label>
      <input class="form-control" id="addTel" type="text" name="tel">
    </div>
    <div class="col-6">
      <label for="addPosition" class="form-label">Position</label>
      <input class="form-control" id="addPosition" type="text" name="position">
    </div>
    <div class="col-6">
      <label for="addAddress" class="form-label">Address</label>
      <select select name="addr" id="addAddress" class="form-select">
        <option selected>請選擇</option>
        <option value="基隆市">基隆市</option>
        <option value="新北市">新北市</option>
        <option value="台北市">台北市</option>
        <option value="桃園市">桃園市</option>
        <option value="新竹市">新竹市</option>
        <option value="新竹縣">新竹縣</option>
        <option value="苗栗縣">苗栗縣</option>
        <option value="彰化縣">彰化縣</option>
        <option value="台中市">台中市</option>
        <option value="南投縣">南投縣</option>
        <option value="雲林縣">雲林縣</option>
        <option value="嘉義市">嘉義市</option>
        <option value="嘉義縣">嘉義縣</option>
        <option value="台南市">台南市</option>
        <option value="高雄市">高雄市</option>
        <option value="屏東縣">屏東縣</option>
        <option value="宜蘭縣">宜蘭縣</option>
        <option value="花蓮縣">花蓮縣</option>
        <option value="台東縣">台東縣</option>
        <option value="澎湖縣">澎湖縣</option>
        <option value="金門縣">金門縣</option>
        <option value="連江縣">連江縣</option>
      </select>
    </div>
    <div class="col-md-12">
      <label for="addIntro" class="form-label">Autobiography</label>
      <textarea type="text" class="form-control" id="addIntro" name="intro"></textarea>
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