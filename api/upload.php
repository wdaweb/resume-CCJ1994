<?php
include_once "../base.php";
$table=$_POST['table'];
$id=$_POST['id'];
$data=[];
if(!empty($_FILES['img']['tmp_name'])){
      move_uploaded_file($_FILES['img']['tmp_name'],'../image/'.$_FILES['img']['name']);
      $data['img']=$_FILES['img']['name'];
}


// print_r($data);
$sql="update $table set `img`='{$data['img']}'  where `id`='{$id}'";
$pdo->exec($sql);
header ("location:../backend.php?do=".$table);
?>