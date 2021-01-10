<?php
include_once "../base.php";
$table=$_POST['table'];
$data=[];
$data['tel']=$_POST['tel'];
$data['addr']=$_POST['addr'];
$data['email']=$_POST['email'];
$data['intro']=$_POST['intro'];

$sql="insert into " .$table. "(`".implode("`,`",array_keys($data))."`) 
      values ('".implode("','",$data)."')";
$pdo->exec($sql);
// header ("location:../backend.php?do=".$table);
?>