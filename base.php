<?php
session_start();
$dsn="mysql:host=localhost;dbname=resume;charset=utf8";
$pdo=new PDO($dsn,'root','');

$tstr=[
  'info'=>'個人資料管理',
  'exp'=>'經歷管理',
  'jobskill'=>'求職技能管理',
  'mywork'=>'作品集管理',
  'pic'=>'圖片管理 ',
  'menu'=>'選單管理'
];
$addstr=[
  'info'=>'新增個人資料',
  'exp'=>'新增經歷',
  'jobskill'=>'新增求職技能',
  'mywork'=>'新增作品',
  'pic'=>'新增圖片',
  'menu'=>'新增選單'
];

?>