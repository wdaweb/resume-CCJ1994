<?php
session_start();
$dsn="mysql:host=localhost;dbname=s1090419;charset=utf8";
$pdo=new PDO($dsn,'root','');

$tstr=[
  'resume_info'=>'個人資料管理',
  'resume_exp'=>'經歷管理',
  'resume_jobskill'=>'求職技能管理',
  'resume_mywork'=>'作品集管理',
  'resume_pic'=>'圖片管理 ',
  'resume_menu'=>'選單管理'
];
$addstr=[
  'resume_info'=>'新增個人資料',
  'resume_exp'=>'新增經歷',
  'resume_jobskill'=>'新增求職技能',
  'resume_mywork'=>'新增作品',
  'resume_pic'=>'新增圖片',
  'resume_menu'=>'新增選單'
];

?>