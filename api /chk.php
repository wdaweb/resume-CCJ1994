
<?php
include_once "../base.php";


$acc=$_POST['acc'];
$pw=$_POST['pw'];

$sql="select count(*) from admin where `acc`='$acc' && `pw`='$pw' ";
$chk=$pdo->query($sql)-> fetchColumn() ;

if($chk>0){
  $_SESSION['login']=$acc;
  header("location:../backend.php");
}else{
  header("location:../index.html");

}



?>