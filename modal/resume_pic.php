<form action="./api/add.php" method="post" enctype="multipart/form-data">
  <h4 class="text-center"><?=$addstr[$do];?></h4>
  <div class="text-center">
    <input type="hidden" name="table" value="<?=$do;?>">
  <ul>
    <li>圖片：
      <input type="file" name="img">
    </li>
    <li>描述：
      <textarea name="text"></textarea>
    </li>
  </ul>
  </div>
    <input type="submit" value="新增">
</form>