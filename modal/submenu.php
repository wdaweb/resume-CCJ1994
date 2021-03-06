<?php
include_once "../base.php";
// print_r($_GET);
$sql="select * from {$_GET['table']} where `parent`='{$_GET['id']}'";
$subs=$pdo->query($sql)->fetchAll();
// print_r($subs);
?>
<form action="./api/editsub.php" method="post">
    <div class="text-end my-2 border-bottom addtitle">
        <h4 >編輯次選單</h4>
    </div>
    <?php if(empty($subs)){ ?>
    <div class="text-center text-muted">
      <h2>目前無任何次選單，請新增</h2>
    </div>
    <?php } ?>
    <div class="row g-3 my-3 text-muted align-items-center">
    <?php foreach($subs as $sub){ ?>
        <div class="col-5 form-floating overflow-hidden">
            <input name="menu[]" type="text" class="form-control" id="subMenu" value="<?=$sub['menu'];?>" required>
            <label for="subMenu">Menu</label>
        </div>
        <div class="col-5 form-floating overflow-hidden">
            <input name="href[]" type="text" class="form-control" id="subHref" value="<?=$sub['href'];?>" required>
            <label for="subHref">Link</label>
        </div>
        <div class="col-2 flex-shrink-0">
            <div class="form-check">
                <label class="form-check-label" for="subDel">刪除</label>
                <input class="form-check-input" type="checkbox" id="subDel" name="del[]" value="<?=$sub['id'];?>" required>
                <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
            </div>
        </div>
        <?php } ?>
        <div class="d-flex justify-content-end" id="btnGroup">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
                <input type="hidden" name="parent" value="<?=$_GET['id'];?>">
                <input class="btn btn-outline-secondary me-3" type="button" value="更多次選單" onclick="more()">   
                <input class="btn saveBtn" type="submit" value="修改確定">
        </div>
    </div>
</form>

<script>
function more(){
let str=`
        <div class="col-5 form-floating overflow-hidden">
            <input name="menu2[]" type="text" class="form-control" id="subMenu" value="">
            <label for="subMenu">Menu</label>
        </div>
        <div class="col-5 form-floating overflow-hidden">
            <input name="href2[]" type="text" class="form-control" id="subHref" value="">
            <label for="subHref">Link</label>
        </div>
`;
$("#btnGroup").before(str);
}
</script>