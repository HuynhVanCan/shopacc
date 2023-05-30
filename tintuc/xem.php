<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////

require('../TMQ/function.php'); 
require('../TMQ/head.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
if($id == NULL){
die('Bài viết không tồn tại');
}
$get_bv = $db->query("SELECT * FROM `TMQ_tintuc` WHERE `id` = $id")->fetch(); ?>
<link href="/TMQ_giaodien/css/tintuc.css" rel="stylesheet"
          type="text/css"/>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="fh5co-product">
    <div class="c-layout-page">
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="article-title title_custom"> <?=$get_bv['title'];?></h2>
                        <div class="article_cat_date">
                            <div style="display: inline-block;margin-right: 15px"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$get_bv['date'];?></div>
                            
                                                            <div style="display: inline-block"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="" title="<?=$get_bv['name'];?>"><?=$get_bv['name'];?></a></div>
                                                    </div>
                        <div class="article-content">
                           <?=$get_bv['noidung'];?>
                        </div>
                    </div>
                     </div>
                    </div>
                     </div>
                     <div id="fh5co-product">
                    </div>


<?php require('../TMQ/end.php'); ?>