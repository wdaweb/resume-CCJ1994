<?php
include_once "../base.php";
$table=$_POST['table'];

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $sql=" delete from $table where `id`='{$id}'";
    $pdo->exec($sql);
  }else{
    $sql="select * from {$table}"; 
    $row=$pdo->query($sql)->fetch();
  
  switch($table){
    case 'info':
      $row['tel']=$_POST['tel'];
      $row['addr']=$_POST['addr'];
      $row['email']=$_POST['email'];
      $row['intro']=$_POST['intro'];
      $sql="update $table set `tel`='{$_POST['tel']}',`addr`='{$_POST['addr']}',`email`='{$_POST['email']}',`intro`='{$_POST['intro']}'";
    break;
  }
  $pdo->exec($sql);
}
}
header ("location:../backend.php?do=info");
?>