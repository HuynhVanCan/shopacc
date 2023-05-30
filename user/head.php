
<div class="c-layout-page" style="margin-top: 20px;">
			<div class="container">
				<div class="c-layout-sidebar-menu c-theme ">
	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
			<!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>

			<div class="c-content-ver-nav">
				<ul class="c-menu c-arrow-dot c-square c-theme">
<li><a href="/profile/info.html" class="<?php if($link == '/profile/info.html'){ echo'active';}?>">Thông tin tài khoản</a></li>
					
					
					<li><a href="/profile/inbox" class="p-quantity <?php if($link == '/profile/inbox'){ echo'active';}?>">Hộp thư
							<span id="quantity_noti" class="quantity"><?=$db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '$uid'")->rowCount();?></span>
						</a>
					</li>
					<li><a href="/profile/bien-doi-so-du.html" class="<?php if($link == '/profile/bien-doi-so-du.html'){ echo'active';}?>">Biến đổi số dư</a></li>
				<li><a class="load-modal" href="#" rel="/profile/bank/add">Tài khoản ngân hàng</a></li>
					<li><a href="/profile/withdraw" class="<?php if($link == '/profile/withdraw'){ echo'active';}?>">Rút tiền ra ATM - Ví</a></li>



				</ul>
			</div>
		</div>

		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>
			<div class="c-content-ver-nav m-b-20">
				<ul class="c-menu c-arrow-dot c-square c-theme">
					<li><a href="/profile/nap-the-tu-dong.html" class="<?php if($link == '/profile/nap-the-tu-dong.html'){ echo'active';}?>"><b>Nạp thẻ tự động</b></a></li>
					
				
					<li><a class="load-modal" href="#" rel="/atm">Nạp tiền từ ATM - Ví Điện Tử</a></li>

					<li><a href="/profile/tai-khoan-da-mua.html" class="<?php if($link == '/profile/tai-khoan-da-mua.html'){ echo'active';}?>">Tài khoản đã mua</a></li>
	
					<li><a href="/profile/tranfer" class="<?php if($link == '/profile/tranfer'){ echo'active';}?>">Chuyển tiền</a></li>






		
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>
