<?php require('../TMQ/function.php'); ?>
<?php
if(empty($uid)){
header('Location: /login');
}    
?>
<?php require('../TMQ/head.php'); ?>
<?php $chucvu = array('Thành viên','Cộng tác viên'); ?>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
	<div class="c-layout-page">
		<!-- BEGIN: PAGE CONTENT -->
		<div class="m-t-20 visible-sm visible-xs"></div>

		<center style="max-width:1140px; margin: 0 auto;" class="hidden-xs"><div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url('https://nick.vn/assets/frontend/images/unknown-cover.jpg');background-position: center;width:100%;height: 350px;background-repeat: no-repeat;background-position: center;background-size: cover;">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
			</div>
		</div>
	</div>
</center>
<div class="container c-size-md ">
	<div class="col-md-12">
		<div class="text-center" style="margin-top: -128px;">
			<center>
			    <?php if(empty($TMQ['avatar'])){ ?>
				<img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="https://graph.facebook.com/<?=$TMQ['uid'];?>/picture?width=200&height=200" alt="">
				<?php }else{ ?>
					<img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="<?=$TMQ['avatar'];?>" alt="">
				<?php } ?>
				<h2 class="c-font-bold c-font-28">UID Web: <?=$uid;?></h2>
				<h2 class="c-font-bold c-font-28">
				<?=$TMQ['email'];?>
										
										</h2>
				<h2 class="c-font-22">	<?php 
							if($TMQ['admin'] == 9){
							    echo '<font color="red">ADMIN</font>';
							}elseif($TMQ['admin'] == 1){
							    echo 'Cộng Tác Viên';
							}else{
							    echo'Thành viên';
							}
							?></h2>
				<h2 class="c-font-22"></h2>
				<h2 class="c-font-22 c-font-red"><?=number_format($TMQ['cash']);?>đ</h2>
			</center>

		</div>

	</div>
</div>
<?php require('head.php'); ?>
		<div class="c-layout-sidebar-content ">
					<!-- BEGIN: PAGE CONTENT -->
					<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
					<div class="c-content-title-1">
						<h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
						<div class="c-line-left"></div>
					</div>
					<table class="table table-striped">
						<tbody><tr>
							<th scope="row">UID của bạn:</th>
							<th><span class="c-font-uppercase"><?=$uid;?></span></th>
						</tr>
						<tr>
							<th scope="row">Email:</th>
							<th><?=$TMQ['email'];?></th>
						</tr>
						<tr>
							<th scope="row">Số dư tài khoản:</th>
							<td><b class="text-danger"><?=number_format($TMQ['cash']);?>đ</b></td>
						</tr>
					
					
						<tr>
							<th scope="row">Nhóm tài khoản:</th>
							<td>
							<?php 
							if($TMQ['admin'] == 9){
							    echo '<font color="red">ADMIN</font>';
							}elseif($TMQ['admin'] == 1){
							    echo 'Cộng Tác Viên';
							}else{
							    echo'Thành viên';
							}
							?></td>
						</tr>
						<tr>
							<th scope="row">Ngày tham gia:</th>
							<td>
																	<?=$TMQ['date'];?>
															</td>
						</tr>

					

						</tbody></table>
					<!-- END: PAGE CONTENT -->
				</div>
			</div>
		</div>


		<!-- END: PAGE CONTENT -->
	</div>


<!-- END: PAGE CONTENT -->
</div>

<?php require('../TMQ/end.php'); ?>