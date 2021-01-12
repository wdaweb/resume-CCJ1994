<form action="./api/add.php" method="post">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>技能/工具：
      <input type="text" name="skill">
    </li>
    <li>擅長程度：
    <input type="number" name="level">％
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>