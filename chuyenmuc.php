<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('TMQ/function.php'); ?>
<?php include ('TMQ/head.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
$get = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '$id'")->fetch();
$acc = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '$id'")->rowCount();
if($get['trangthai'] == 'off'){
    die('Chuyên mục game đã bị tắt bởi ADMIN. Vui lòng quay lại sau');
}
if($id == NULL){
die('Chuyên không tồn tại');
}


//linh tinh nhưng không được xóa
//1
$thongtin1 = explode(PHP_EOL,$get['thongtin_1']);
$count_info1 = count($thongtin1);
//2
$thongtin2 = explode(PHP_EOL,$get['thongtin_2']);
$count_info2 = count($thongtin2);
//3
$thongtin3 = explode(PHP_EOL,$get['thongtin_3']);
$count_info3 = count($thongtin3);
//4
$thongtin4 = explode(PHP_EOL,$get['thongtin_4']);
$count_info4 = count($thongtin4);
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->



    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h2 class="alert-heading"><?=$get['ten'];?></h2>
                    <p><?=$get['thongbao'];?>
<p>&nbsp;</p></p>
                </div>
            </div>
        </div>
    <?php if($get['loaicm'] == 1){ ?>    
        <div class="row" style="margin-bottom: 15px">
            <div class="m-l-10 m-r-10">
			<form class="form-inline m-b-10" method="POST">
			    
			      <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Mã số</span>
                            <input type="text" class="form-control c-square" value="" placeholder="Mã số nick" name="id">

                        </div>
                    </div>
			     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Giá tiền</span>
                            <input type="text" class="form-control c-square" value="" placeholder="Giá tiền tối thiểu" name="min">

                        </div>
                    </div>
			    
			     <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Giá tiền</span>
                            <input type="text" class="form-control c-square" value="" placeholder="Giá tiền tối đa" name="max">

                        </div>
                    </div>
			    
			   
			       <?php if($get['thongtin_1'] != null){ ?>
			        <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon"><?=$thongtin1[0];?></span>
                            <select style="" class="form-control c-square" name="thongtin1">
                                 <option value="">Chọn <?=$thongtin1[0];?></option>
			             <?php
			         for($i = 1; $i < $count_info1; $i++){
			            echo '<option value="'.$thongtin1[$i].'">'.$thongtin1[0].' '.$thongtin1[$i].'</option>';
			           
			              } ?>
			      </select>
                        </div>
                    </div>
			       <?php } ?>
			            <?php if($get['thongtin_2'] != null){ ?>
			        <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon"><?=$thongtin2[0];?></span>
                            <select style="" class="form-control c-square" name="thongtin2">
			              <option value="">Chọn <?=$thongtin2[0];?></option>
			             <?php
			         for($i = 1; $i < $count_info2; $i++){
			            echo '<option value="'.$thongtin2[$i].'">'.$thongtin2[0].' '.$thongtin2[$i].'</option>';
			           
			              } ?>
			       </select>
                        </div>
                    </div>
			       <?php } ?>
			       
			            <?php if($get['thongtin_3'] != null){ ?>
			       <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon"><?=$thongtin3[0];?></span>
                            <select style="" class="form-control c-square" name="thongtin3">
                                 <option value="">Chọn <?=$thongtin3[0];?></option>
			             <?php
			             
			         for($i = 1; $i < $count_info3; $i++){
			            echo '<option value="'.$thongtin3[$i].'">'.$thongtin3[0].' '.$thongtin3[$i].'</option>';
			           
			              } ?>
			      </select>
                        </div>
                    </div>
			       <?php } ?>
			       
			            <?php if($get['thongtin_4'] != null){ ?>
			        <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon"><?=$thongtin4[0];?></span>
                            <select style="" class="form-control c-square" name="thongtin4">
                                <option value="">Chọn <?=$thongtin4[0];?></option>
			             <?php
			           
			         for($i = 1; $i < $count_info4; $i++){
			            echo '<option value="'.$thongtin4[$i].'">'.$thongtin4[0].' '.$thongtin4[$i].'</option>';
			           
			              } ?>
			       </select>
                        </div>
                    </div>
			       <?php } ?>
			       
			     <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Sắp xếp</span>
                            <select style="" class="form-control c-square" name="sapxep">

			           <option value="1">Mặc định</option>
			            <option value="2">Giá tăng dần</option>
			             <option value="3">Giá giảm dần</option>
			      </select>
                        </div>
                    </div>
			    <div class="col-md-3 col-sm-4 p-5 no-radius">
                        <button type="submit" class="btn c-square c-theme c-btn-green" name="timkiem">Tìm kiếm</button>
                        <a class="btn c-square m-l-0 btn-danger" href="https://<?=$website;?>/<?php echo ''.xoa_dau($get['ten']).'-'.$id.' '; ?>">Tất cả</a>
                    </div>
			    </form>
			</div></div>
			<?php } ?>
		  <div class="row row-flex  item-list">
			   
<?php			
if(isset($_POST['timkiem'])){
    $searchid = abs(intval($_POST['id']));
    $toithieu = abs(intval($_POST['min']));
    $loc_1 = tmq_boc($_POST['thongtin1']);
    $loc_2 = tmq_boc($_POST['thongtin2']);
    $loc_3 = tmq_boc($_POST['thongtin3']);
    $loc_4 = tmq_boc($_POST['thongtin4']);
    $toida = abs(intval($_POST['max']));
    $sapxep = abs(intval($_POST['sapxep']));
    if($searchid != null){
        $timid = "AND id like '$searchid%' ";
    }else{
        $timid = '';
    }
    if($toithieu != null){
        $giamin = 'AND `giatien` >= '.$toithieu.'  ';
    }else{
        $giamin = '';
    }
    if($toida != null){
        $giamax = 'AND `giatien` <= '. $toida .'  ';
    }else{
        $giamax = '';
    }
    
    if($loc_1 != ""){
     $count_1 = "AND `thongtin_1` = '$loc_1'";
    }else{
        $count_1 = "";
    }
     if($loc_2 != ""){
    $count_2 = "AND `thongtin_2` = '$loc_2'";
    }else{
        $count_2 = "";
    }
     if($loc_3 != ""){
    $count_3 = "AND `thongtin_3` = '$loc_3'";
    }else{
        $count_3 = "";
    }
     if($loc_4 != ""){
    $count_4 = "AND `thongtin_4` = '$loc_4'";
    }else{
        $count_4 = "";
    }
    
    
    if($sapxep == 1){
        $xep = '';
    }elseif($sapxep == 2){
        $xep = 'ORDER BY giatien ASC';
    }elseif($sapxep == 3){
        $xep = 'ORDER BY giatien DESC';
    }else{
        $xep = '';
    }
}
$sotin1trang = 20;

if( isset($_GET["page"]) ){
	$trang = $_GET["page"];
	settype($trang, "int");
}else{
	$trang = 1;	
}
$from = ($trang -1 ) * $sotin1trang;
if(isset($_POST['timkiem'])){
$get_bv = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `trangthai` = '1' AND `loainick` = '$id' $giamin $giamax $timid $count_1 $count_2 $count_3 $count_4 $xep LIMIT $from,$sotin1trang"); //lấy danh sách bài viết theo chuyên mục
}else{
$get_bv = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `trangthai` = '1' AND `loainick` = '$id' LIMIT $from,$sotin1trang"); //lấy danh sách bài viết theo chuyên mục
}
foreach($get_bv as $bv){
$get_img = $db->query("SELECT * FROM `images` WHERE `id_acc` = '".$bv['id']."'")->fetch();
$thumb = explode(PHP_EOL,$bv['img']);


?>
 <div class="col-sm-6 col-md-3">
                            <div class="classWithPad">
                                <div class="image">

                                    <a href="/xem-chi-tiet.html?id=<?=$bv['id'];?>">
                                        <?php if(!empty($bv["img"])){ echo '<img src="'.$thumb[0].'">';}else{ thumb("upload/anhnick/".$bv['id']."/"); } ?>
                                        <span class="ms">MS: <?=$bv['id'];?></span>
                                    </a>

                                </div>
                                <div class="description">
                                  <?=$bv['thongtin'];?>
                                </div>
                                <div class="attribute_info">
                                    <div class="row">
                    <?php if($get['thongtin_1'] != null){?>     
                    <div class="col-xs-6 a_att"><?=$thongtin1[0];?>: <b><?=$bv['thongtin_1'];?></b></div>
                    <?php } ?>
                     <?php if($get['thongtin_2'] != null){?>     
                    <div class="col-xs-6 a_att"><?=$thongtin2[0];?>: <b><?=$bv['thongtin_2'];?></b></div>
                    <?php } ?>
                     <?php if($get['thongtin_3'] != null){?>     
                    <div class="col-xs-6 a_att"><?=$thongtin3[0];?>: <b><?=$bv['thongtin_3'];?></b></div>
                    <?php } ?>
                     <?php if($get['thongtin_4'] != null){?>     
                    <div class="col-xs-6 a_att"><?=$thongtin4[0];?>: <b><?=$bv['thongtin_4'];?></b></div>
                    <?php } ?>
                  
                        
                                                                                                                                                                        </div>
                                    </div>
                                <div class="a-more">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="price_item">
                                                                                                    <?=number_format($bv['giatien']);?>đ
                                                

                                            </div>
                                        </div>
                                        <div class="col-xs-6 ">
                                            <div class="view">
                                                <a href="/xem-chi-tiet.html?id=<?=$bv['id'];?>">Chi tiết</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>

</div>
<div class="col-md-12"> 
<?php 
$tong = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '$id' AND `trangthai` = 1")->rowcount();
$link = ''.xoa_dau($get['ten']).'-'.$id.'-';
if ($tong > $sotin1trang){
echo '<center>' . phantrang($link, $from, $tong, $sotin1trang) . '</center>';
} ?>
</div>	
		</div>
	</div>
	<?php
require('TMQ/end.php');