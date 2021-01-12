<form action="./api/add.php" method="post">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>
      <input type="text" name="year">
      年
    </li>
    <li>
      <input type="text" name="month">
      月
    </li>
    <li>
      <input type="text" name="company">
      公司
    </li>
    <li>
      <input type="text" name="job">
      職位
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>