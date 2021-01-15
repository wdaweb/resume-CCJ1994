<form action="./api/add.php" method="post">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>選單標題：
      <input type="text" name="menu">
    </li>
    <li>選單連結：
      <input type="text" name="href">
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>