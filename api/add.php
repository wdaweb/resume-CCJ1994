<?php
include_once "../base.php";
$table=$_POST['table'];
$data=[];
if(!empty($_FILES['img']['tmp_name'])){
      move_uploaded_file($_FILES['img']['tmp_name'],'../image/'.$_FILES['img']['name']);
      $data['img']=$_FILES['img']['name'];
}
switch($table){
      case 'resume_info':
            $data['tel']=$_POST['tel'];
            $data['addr']=$_POST['addr'];
            $data['email']=$_POST['email'];
            $data['position']=$_POST['position'];
            $data['intro']=$_POST['intro'];
      break;
      case 'resume_exp':
            $data['year']=$_POST['year'];
            $data['month']=$_POST['month'];
            $data['company']=$_POST['company'];
            $data['job']=$_POST['job'];
            $data['sh']=1;
      break;
      case 'resume_jobskill':
            $data['skill']=$_POST['skill'];
            $data['level']=$_POST['level'];
            $data['sh']=1;
      break;
      case 'resume_mywork':
            $data['type']=$_POST['type'];
            $data['text']=$_POST['text'];
            $data['sh']=1;
      break;
      case 'resume_pic':
            $data['text']=$_POST['text'];
            $data['sh']=1;
      break;
      case 'resume_menu':
            $data['menu']=$_POST['menu'];
            $data['href']=$_POST['href'];
            $data['sh']=1;
      break;
            
}

// print_r($data);
$sql="insert into " .$table. "(`".implode("`,`",array_keys($data))."`) 
      values ('".implode("','",$data)."')";
$pdo->exec($sql);
// echo $sql;
header ("location:../backend.php?do=".$table);
?>