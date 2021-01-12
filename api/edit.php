<?php
include_once "../base.php";
$table=$_POST['table'];

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $sql=" delete from $table where `id`='{$id}'";
    $pdo->exec($sql);
  }else{
    $sql="select * from $table where `id`='{$id}'"; 
    $row=$pdo->query($sql)->fetch();
    // print_r($row);
    
  switch($table){
    case 'info':
      $row['tel']=$_POST['tel'];
      $row['addr']=$_POST['addr'];
      $row['email']=$_POST['email'];
      $row['position']=$_POST['position'];
      $row['intro']=$_POST['intro'];
      $sql="update $table set `tel`='{$row['tel']}',`addr`='{$row['addr']}',`email`='{$row['email']}',`intro`='{$row['intro']}' where `id`='{$id}'";
    break;
    case 'exp':
      $row['year']=$_POST['year'][$key];
      $row['month']=$_POST['month'][$key];
      $row['company']=$_POST['company'][$key];
      $row['job']=$_POST['job'][$key];
      $row['sh']=(in_array($id,$_POST['sh']))?1:0;
      $sql="update $table set `year`='{$row['year']}',`month`='{$row['month']}',
      `company`='{$row['company']}',`job`='{$row['job']}',`sh`='{$row['sh']}' where `id`='{$id}'";
    break;
    case 'jobskill':
      $row['skill']=$_POST['skill'][$key];
      $row['level']=$_POST['level'][$key];
      $row['sh']=(in_array($id,$_POST['sh']))?1:0;
      $sql="update $table set `skill`='{$row['skill']}',`level`='{$row['level']}',
      `sh`='{$row['sh']}' where `id`='{$id}'";
    break;
    case 'mywork':
      $row['type']=$_POST['type'][$key];
      $row['text']=$_POST['text'][$key];
      $row['sh']=(in_array($id,$_POST['sh']))?1:0;
      $sql="update $table set `type`='{$row['type']}',`text`='{$row['text']}',
      `sh`='{$row['sh']}' where `id`='{$id}'";
    break;
    case 'pic':

    break;
    case 'menu':

    break;
  }
  $pdo->exec($sql);
}
}

echo "<br>";
print_r($_POST);
header ("location:../backend.php?do=$table");
?>