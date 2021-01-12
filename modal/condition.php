<form action="./api/add.php" method="post">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>擅長職位:
      <input type="text" name="tel">
    </li>
    <li>信箱：
      <input type="email" name="email">
    </li>
    <li>自傳：
      <textarea name="intro" cols="30" rows="10"></textarea>
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>