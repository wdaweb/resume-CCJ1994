<?php
$sql="select * from info"; 
$row=$pdo->query($sql)->fetch();
print_r($row);
?>

<h2><?=$tstr[$do];?></h2>
<div>聯絡資料
  <form action="./api/edit.php">
  <ul>
    <li>電話：
      <input type="text" name="tel" value="<?=$row['tel'];?>">
    </li>
    <li>地址：
      <select name="addr">
        <option value="<?=$row['addr'];?>" selected ><?=$row['addr'];?></option>
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
      <input type="email" name="email" value="<?=$row['email'];?>">
    </li>
    <li>自傳：
      <textarea name="intro" cols="30" rows="10"><?=$row['intro'];?></textarea>
    </li>
  </ul>
    <input type="submit" value="修改儲存">
  </form>
</div>