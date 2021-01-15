<?php
include_once "../base.php";


// print_r($_POST);


foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $sql=" delete from {$_POST['table']} where `id`='{$id}'";
        $pdo->exec($sql);
    }else{
        $sql="select * from {$_POST['table']} where `id`='{$id}'"; 
        $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        echo $key;
        $row['menu']=$_POST['menu'][$key];
        $row['href']=$_POST['href'][$key];
        $sql_row="update {$_POST['table']} set `menu`='{$row['menu']}',`href`='{$row['href']}' where `id`='{$id}'";
        $pdo->exec($sql_row);
        
    }
}



if(isset($_POST['menu2'])){
    foreach($_POST['menu2'] as $key => $sub){
        if(!empty($sub)){
            $add=[];
            
            $add['menu']=$sub;
            $add['href']=$_POST['href2'][$key];
            $add['parent']=$_POST['parent'];
            $add['sh']=1;
            
            $sql_add="insert into " .$_POST['table']. "(`".implode("`,`",array_keys($add))."`) 
            values ('".implode("','",$add)."')";
            $pdo->exec($sql_add);
        }
    }

}


header ("location:../backend.php?do={$_POST['table']}");

?>