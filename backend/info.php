<?php
$sql="select * from {$do}"; 
$rows=$pdo->query($sql)->fetchAll();
?>
<h2><?=$tstr[$do];?></h2>
<div>聯絡資料
  <form action="./api/edit.php" method="post">
  <?php
  foreach($rows as $row){

    ?>
 
  <ul>
    <li>電話：
      <input type="text" name="tel" value="<?=$row['tel'];?>">
    </li>
    <li>地址：
      <select name="addr">
        <option value="基隆市" <?=($row['addr']=='基隆市')?'selected':'';?>>基隆市</option>
        <option value="新北市" <?=($row['addr']=='新北市')?'selected':'';?>>新北市</option>
        <option value="台北市" <?=($row['addr']=='台北市')?'selected':'';?>>台北市</option>
        <option value="桃園市" <?=($row['addr']=='桃園市')?'selected':'';?>>桃園市</option>
        <option value="新竹市" <?=($row['addr']=='新竹市')?'selected':'';?>>新竹市</option>
        <option value="新竹縣" <?=($row['addr']=='新竹縣')?'selected':'';?>>新竹縣</option>
        <option value="苗栗縣" <?=($row['addr']=='苗栗縣')?'selected':'';?>>苗栗縣</option>
        <option value="彰化縣" <?=($row['addr']=='彰化縣')?'selected':'';?>>彰化縣</option>
        <option value="台中市" <?=($row['addr']=='台中市')?'selected':'';?>>台中市</option>
        <option value="南投縣" <?=($row['addr']=='南投縣')?'selected':'';?>>南投縣</option>
        <option value="雲林縣" <?=($row['addr']=='雲林縣')?'selected':'';?>>雲林縣</option>
        <option value="嘉義市" <?=($row['addr']=='嘉義市')?'selected':'';?>>嘉義市</option>
        <option value="嘉義縣" <?=($row['addr']=='嘉義縣')?'selected':'';?>>嘉義縣</option>
        <option value="台南市" <?=($row['addr']=='台南市')?'selected':'';?>>台南市</option>
        <option value="高雄市" <?=($row['addr']=='高雄市')?'selected':'';?>>高雄市</option>
        <option value="屏東縣" <?=($row['addr']=='屏東縣')?'selected':'';?>>屏東縣</option>
        <option value="宜蘭縣" <?=($row['addr']=='宜蘭縣')?'selected':'';?>>宜蘭縣</option>
        <option value="花蓮縣" <?=($row['addr']=='花蓮縣')?'selected':'';?>>花蓮縣</option>
        <option value="台東縣" <?=($row['addr']=='台東縣')?'selected':'';?>>台東縣</option>
        <option value="澎湖縣" <?=($row['addr']=='澎湖縣')?'selected':'';?>>澎湖縣</option>
        <option value="金門縣" <?=($row['addr']=='金門縣')?'selected':'';?>>金門縣</option>
        <option value="連江縣" <?=($row['addr']=='連江縣')?'selected':'';?>>連江縣</option>
      </select>
    </li>
    <li>信箱：
      <input type="email" name="email" value="<?=$row['email'];?>">
    </li>
    <li>自傳：
      <textarea name="intro" cols="30" rows="5"><?=$row['intro'];?></textarea>
    </li>
    <li>
    刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
    </li>
  </ul>
    <input type="submit" value="儲存">
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    <input type="hidden" name="table" value="<?=$do;?>">
    <?php
  }
  ?>
  </form>
</div>