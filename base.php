<?php
session_start();
$dsn="mysql:host=localhost;dbname=resume;charset=utf8";
$pdo=new PDO($dsn,'root','');

$tstr=[
  'info'=>'個人資料管理',
  'exp'=>'學經歷管理',
  'condition'=>'求職條件管理',
  'work'=>'作品集管理',
  'pic'=>'圖片管理 ',
  'menu'=>'選單管理',
  'footer'=>'頁尾版權管理'
];
$addstr=[
  'info'=>'新增個人資料',
  'exp'=>'新增學經歷',
  'condition'=>'新增求職條件',
  'work'=>'新增作品集',
  'pic'=>'新增圖片',
  'menu'=>'新增選單',
  'footer'=>'新增頁尾版權內容'
];

?>