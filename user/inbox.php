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
					<h3 class="c-font-uppercase c-font-bold">Thông báo</h3>
					<div class="c-line-left"></div>
				</div>

				
				
					<table class="table cart-table">
			<thead>
                            <tr>
					<th>ID</th>
					<th>Nội dung</th>
			
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

$get = $db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '$uid' LIMIT $from,$sotin1trang");


foreach($get as $ls){
?>			<tr>
<td><?=$ls['id'];?></td>
<td><?=$ls['noidung'];?></td>
<td><?=$ls['time'];?></td></tr>
<?php } ?>
				</tbody>
				</table>
		<?php 
$tong = $db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '$uid'")->rowcount();

if ($tong > $sotin1trang){
echo '<center>' . phantrang('/inbox?', $from, $tong, $sotin1trang) . '</center>';
} ?>	</div></div></div></div>
<?php require('../TMQ/end.php'); ?>