<form action="./api/add.php" method="post">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>電話：
      <input type="text" name="tel">
    </li>
    <li>地址：
      <select name="addr" id="">
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
    </li>
    <li>信箱：
      <input type="email" name="email">
    </li>
    <li>擅長職位：
      <input type="text" name="position">
    </li>
    <li>自傳：
      <textarea name="intro" cols="30" rows="10"></textarea>
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>