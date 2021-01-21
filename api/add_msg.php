<?php
include_once "../base.php";

// print_r($_POST);
$table=$_POST['table'];
$data=[];
$data['name']=$_POST['name'];
$data['tel']=$_POST['tel'];
$data['email']=$_POST['email'];
$data['msg']=$_POST['msg'];
$data['sh']=0;
$sql=" insert into " .$table. "(`".implode("`,`",array_keys($data))."`) 
      values ('".implode("','",$data)."')";
$pdo->exec($sql);
// echo $sql;
header ("location:../index.php");

?>