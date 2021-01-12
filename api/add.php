<?php
include_once "../base.php";
$table=$_POST['table'];
$data=[];
switch($table){
      case 'info':
            $data['tel']=$_POST['tel'];
            $data['addr']=$_POST['addr'];
            $data['email']=$_POST['email'];
            $data['school']=$_POST['school'];
            $data['major']=$_POST['major'];
            $data['intro']=$_POST['intro'];
      break;
      case 'exp':
            $data['year']=$_POST['year'];
            $data['month']=$_POST['month'];
            $data['company']=$_POST['company'];
            $data['job']=$_POST['job'];
      break;
}

// print_r($data);
$sql="insert into " .$table. "(`".implode("`,`",array_keys($data))."`) 
      values ('".implode("','",$data)."')";
$pdo->exec($sql);
header ("location:../backend.php?do=".$table);
?>