<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('TMQ/function.php'); ?>
<?php
include ('TMQ/head.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
if($id == NULL){
die('Bài viết không tồn tại');
}
$get_bv = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = $id")->fetch();
$get_cm = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '".$get_bv['loainick']."'")->fetch();
$thumb = explode(PHP_EOL,$get_bv['img']);
if($get_bv['trangthai'] != '1'){
echo '<title>Lỗi</title>'; 
echo('Bài viết không tồn tại'); 
}else{

?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->



    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">


            
            

            <div class="c-shop-product-details-4">
                <div class="row">
                    <div class="col-md-4 m-b-20">
                        <div class="c-product-header">
                            <!--<h4 class="c-font-uppercase c-font-bold">Liên minh huyền thoại - Việt Nam</h4>-->
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">#<?=$id;?></h3>
                                <span class="c-font-red c-font-bold"><?=$get_cm['ten'];?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 visible-sm visible-xs visible-sm">
                        <div class="text-center m-t-20">

                                                            <img class="img-responsive img-thumbnail" src="<?=$thumb[0];?>"/>
                                                    </div>
                        <div class="c-product-meta">
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                            <div class="row">

                                                                                                                                                        
                                         
                                <div class="col-sm-12 col-xs-12 c-product-variant">
                                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"><?=$get_bv['thongtin'];?></span></p>
                                    
                                </div>
                            </div>
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="c-product-meta">
                            <div class="c-product-price c-theme-font" style="float: none;text-align: center"><?php echo number_format($get_bv['giatien']-($get_bv['giatien']*0.3)); ?> ATM<br/>
                                <?=number_format($get_bv['giatien']);?> CARD
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">
                            <div class="c-content-title-1">
                                                                                                            <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/mua-ngay.html?id=<?=$id;?>">Mua ngay</button>
                                                                                                         

                                    <button type="button" class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/atm">ATM - Ví điện tử</button>
                                    <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/nap-the">Nạp thẻ cào</a>
                                                            </div>
                        </div>
                    </div>
                </div>

                <div class="c-product-meta visible-md visible-lg">
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                    <div class="row">
                                                                                                                        
                                    
                                                   

                        <div class="col-sm-12 col-xs-12 c-product-variant">

                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red"><?=$get_bv['thongtin'];?></span></p>
                            

                        </div>
                    </div>

                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="container m-t-20 content_post">
            <?php if(!empty($get_bv['img'])){ ?>
             <?php $hinhanh = explode(PHP_EOL,$get_bv['img']); ?>
					    <?php foreach($hinhanh as $row){ ?>
            
                                                <p>
                        <img src="<?=$row;?>" class="zoom">
                    </p>

                                  <?php } ?>
            <?php }else{ 
           get_img("upload/anhnick/$id/");
            
            } ?>
            <div class="buy-footer" style="text-align: center">
                


                                                                        <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/mua-ngay.html?id=<?=$id;?>">Mua ngay</button>
                                            



                            </div>

        </div>

  


    </div>
    <?php } ?>
 



<!-- END: PAGE CONTENT -->
</div>
<?php
require('TMQ/end.php');
?>