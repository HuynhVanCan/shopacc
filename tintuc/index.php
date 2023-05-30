<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
require('../TMQ/function.php');
require('../TMQ/head.php');
echo $id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
?>
<link href="/TMQ_giaodien/css/tintuc.css" rel="stylesheet"
          type="text/css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>
.btn-primary.btn-outline1 {
    text-align: center;
    color: #ffffff;
    background: #32c5d2;
    border-color: #32c5d2;
    padding: 6px;
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
}
.btn-primary.btn-outline2 {
    text-align: center;
    color: #ffffff;
    background: #ff0000;
    border-color: #ff0000;
    padding: 6px;
    font-size: 12px;
    font-weight: 400;
    text-transform: uppercase;
}
.btn.btn-lg1 {
    padding: 8px 7px !important;
}
         </style>
<div id="fh5co-product">
    <div class="c-layout-page">
        <div class="c-content-box c-size-md">
            <div class="container">
               <?php if($TMQ['admin'] == 9){ ?> <p><a href="dangbai.php" class="btn btn-primary btn-outline btn-lg">Đăng bài</a></p> <?php } ?>
                <div class="row">
                    <div class="art-list">
<?php  
$sotin1trang = 20;

if( isset($_GET["page"]) ){
	$trang = $_GET["page"];
	settype($trang, "int");
}else{
	$trang = 1;	
}
$from = ($trang -1 ) * $sotin1trang;
$get_tt = $db->query("SELECT * FROM `TMQ_tintuc` LIMIT $from,$sotin1trang");
foreach($get_tt as $tt){
?>                        
                        <div class="a-item">
                            <div class="thumbnail-image img-thumbnail"><a href="/tin-tuc/<?=xoa_dau($tt['title']);?>-<?=$tt['id'];?>.html">
                                <img src="<?=$tt['img']?>" alt=""></a></div>
                              <?php if($TMQ['admin'] == 9){ ?>  
                              <a href="suabai.php?id=<?=$tt['id'];?>"class="btn btn-primary btn-outline1 btn-lg1">Sửa</a>
                              <a href="/tin-tuc?del=<?=$tt['id'];?>" class="btn btn-primary btn-outline2 btn-lg1">Xóa</a> 
                              <?php } ?>
                                    <div class="info">
                                        <div class="article_title "><h2><a href="/tin-tuc/<?=xoa_dau($tt['title']);?>-<?=$tt['id'];?>.html"><?=$tt['title']?></a></h2> </div>
                                        <div class="article_cat_date">
                                            <div style="display: inline-block;margin-right: 15px"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$tt['date']?></div>
                                             <div style="display: inline-block;margin-right: 15px"><i class="fa fa-user" aria-hidden="true"></i> <?=$tt['name']?></div>
                                                                                         
                                        </div>
                                        <div class="article_description hidden-xs"></div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
            <ul class="pagination pagination-sm">

<?php 
$tong = $db->query("SELECT * FROM `TMQ_tintuc`")->rowcount();
$link = '?';
if ($tong > $sotin1trang){
echo '<center>' . phantrang($link, $from, $tong, $sotin1trang) . '</center>';
} ?>

</ul></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['del'])){
      
        $db->exec("DELETE FROM `TMQ_tintuc` WHERE `id` = '".intval($_GET['del'])."'");
        echo"<script>alert('Xóa thành công');</script>";
        }
        ?>
<?php require('../TMQ/end.php'); ?>