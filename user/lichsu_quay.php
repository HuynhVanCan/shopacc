<?php require('../TMQ/function.php'); ?>
<?php
if(empty($uid)){
header('Location: /login');
}    
?>
<?php require('../TMQ/head.php'); ?>
<div class="c-layout-page">
<?php require('head.php'); ?>
<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Lịch sử mua nick</h3>
					<div class="c-line-left"></div>
				</div>









<?php
$batdau = "";
$ketthuc = "";
if(isset($_POST['timkiem'])){
 $batdau = trim(addslashes(htmlspecialchars($_POST['batdau'])));
 $ketthuc = trim(addslashes(htmlspecialchars($_POST['ketthuc'])));
if($batdau != NULL){
$start = "AND `time` >= '".strtotime($batdau)."' ";
}else{
    $start = "";
}
if($ketthuc != null){
    $end = "AND `time` <= '".strtotime($ketthuc)."'";
}else{
    $end = "";
}}
?>
	
				
					<form method="post" class="form-horizontal form-find m-b-20">
				
				<div class="col-md-4">
					<div class="input-group m-b-10 c-square">
						<span class="input-group-btn">
        <button class="btn default c-btn-square p-l-10 p-r-10" type="button">Từ ngày</button></span>	
        <input type="date" class="form-control" name="batdau" value="<?=$batdau;?>"></div>
							</div>
						<div class="col-md-4">
					<div class="input-group m-b-10 c-square">
						<span class="input-group-btn">
        <button class="btn default c-btn-square p-l-10 p-r-10" type="button">Đến ngày</button></span>	
        <input type="date" class="form-control" name="ketthuc" value="<?=$ketthuc;?>"></div>
							</div>
					<input type="submit" value="Tìm Kiếm" name="timkiem" class="btn btn-primary">
					</form>
					<table class="table cart-table">
			<thead>
                            <tr>
					<th>ID</th>
					<th>Tài khoản</th>
					<th>Mật khẩu</th>
					<th>Số tiền</th>
					<th>Loại nick</th>
					<th>Người bán</th>
					<th>Thời gian</th>
					
			 </thead>
                        <tbody>
                            
<?php
$sotin1trang = 20;
if(isset($_GET['page'])){
 $page = intval($_GET['page']);
 }else{
 $page = 1;
 }
 $from = ($page - 1)* $sotin1trang;
if(isset($_POST['timkiem'])){
$get = $db->query("SELECT * FROM `TMQ_lichsu` WHERE `uid_mua` = '$uid' $start $end LIMIT $from,$sotin1trang");
}else{
$get = $db->query("SELECT * FROM `TMQ_lichsu` WHERE `uid_mua` = '$uid' LIMIT $from,$sotin1trang");
}

foreach($get as $ls){
    $ln = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '".$ls['loainick']."'")->fetch();
    $nb = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$ls['uid_ban']."'")->fetch();
?>			<tr>
<td><?=$ls['id'];?></td>
<td><?=$ls['taikhoan'];?></td>
<td><?=$ls['matkhau'];?></td>
<td><?=number_format($ls['giatien']);?></td>
<td><?=$ln['ten'];?></td>
<td><?=$nb['name'];?></td>
<td><?=$ls['date'];?></td></tr>
<?php } ?>
				</tbody>
				</table>
		<?php 
$tong = $db->query("SELECT * FROM `TMQ_lichsu` WHERE `uid_mua` = '$uid'")->rowcount();

if ($tong > $sotin1trang){
echo '<center>' . phantrang('/profile/tai-khoan-da-mua.html?', $from, $tong, $sotin1trang) . '</center>';
} ?>	</div></div></div></div>
<?php require('../TMQ/end.php'); ?>