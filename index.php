<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('TMQ/function.php'); ?>
<?php require('TMQ/head.php'); ?>
 
 
 
 <!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box">
		<div id="slider" class="owl-theme section section-cate slideshow_full_width ">
			<div id="slide_banner" class="owl-carousel">
			    <?php $smtp = $db->query("SELECT * FROM `TMQ_banner`");
			    foreach($smtp as $row){
			    ?> 
			    
									<div class="item">
						<a href="<?=$row['url'];?>" alt="<?=$row['title'];?>">
							<img src="<?=$row['image'];?>" alt="<?=$row['title'];?>">
						</a>
					</div>
    
<?php } ?>					
							</div>
		</div>
	</div>
    <div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Dịch vụ nổi bật</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-items="2" data-slide-speed="5000" data-rtl="false">

				                    						
                        <div class="item">
                            <a href="/vong-quay-may-man" ><img src="/TMQ_giaodien/storage/images/8cD6ILHy6J_1563280208.jpg" alt="vòng quay may mắn"/></a>
                        </div>
                    						
                        <div class="item">
                            <a href="/user/profile" ><img src="/TMQ_giaodien/storage/images/CTEwKvCcMo_1563282928.jpg" alt="trang cá nhân"/></a>
                        </div>
                    						
                        <div class="item">
                            <a href="/mua-the" ><img src="/TMQ_giaodien/storage/images/7plMumMqV4_1563278119.jpg" alt="Mua thẻ cào"/></a>
                        </div>
                    						
                        <div class="item">
                            <a href="/dich-vu" ><img src="/TMQ_giaodien/storage/images/YnkpvkaF9w_1563279201.jpg" alt="dịch vụ"/></a>
                        </div>
                    						
                        <div class="item">
                            <a href="/mua-ban-nick-game-random" ><img src="/TMQ_giaodien/storage/images/wYL5VqM2MX_1563276937.jpg" alt="random"/></a>
                        </div>
                                    			</div>
			<!-- End-->
		</div>
		<!-- End-->
	</div>
</div>    
<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Danh mục game</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="row row-flex-safari game-list">
							<?php
		$get_cm = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE  `loaicm` = '2' AND `trangthai` = 'on'"); //lấy danh sách chuyên mục
foreach($get_cm as $cm){ //Chạy vòng lặp. Cái này giống while(....)
$tongsoacc = $db->query('SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '.$cm['id'].' ')->rowcount();
$daban = $db->query('SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '.$cm['id'].' AND `trangthai` = 0 ')->rowcount();
?>			
						<div class="col-sm-3 col-xs-6 p-5">
							<div class="classWithPad">
								<div class="news_image">
																			<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>" class=""><img src="<?=$cm['img'];?>" alt="<?=$cm['ten'];?>"></a>
									

								</div>
								<div class="news_title">
									<h2>
																					<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>"><?=$cm['ten'];?></a>
																			</h2>


								</div>
								<div class="news_description">
									<p>
										Số tài khoản: <?=number_format($tongsoacc);?>
									</p>
									<p>
										Đã bán: <?=number_format($daban);?>
									</p>
								
								</div>
								<div class="a-more">
									<div class="row">

										<div class="col-xs-12">
											<div class="view">
																									<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>">Xem tất cả</a>
												

											</div>
										</div>

									</div>
								</div>


							</div>
						</div>
						<?php } ?>
					<!-- End-->
		</div>
		<!-- End-->
	</div>
</div>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Danh mục game random</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="row row-flex-safari game-list">
							<?php
		$get_cm = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `loaicm` = '2' AND `trangthai` = 'on'"); //lấy danh sách chuyên mục
foreach($get_cm as $cm){ //Chạy vòng lặp. Cái này giống while(....)
$tongsoacc = $db->query('SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '.$cm['id'].' ')->rowcount();
$daban = $db->query('SELECT * FROM `TMQ_baiviet` WHERE `loainick` = '.$cm['id'].' AND `trangthai` = 0 ')->rowcount();
?>			
						<div class="col-sm-3 col-xs-6 p-5">
							<div class="classWithPad">
								<div class="news_image">
																			<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>" class=""><img src="<?=$cm['img'];?>" alt="<?=$cm['ten'];?>"></a>
									

								</div>
								<div class="news_title">
									<h2>
																					<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>"><?=$cm['ten'];?></a>
																			</h2>


								</div>
								<div class="news_description">
									<p>
										Số tài khoản: <?=number_format($tongsoacc);?>
									</p>
									<p>
										Đã bán: <?=number_format($daban);?>
									</p>
								
								</div>
								<div class="a-more">
									<div class="row">

										<div class="col-xs-12">
											<div class="view">
																									<a href="/<?php echo ''.xoa_dau($cm['ten']).'-'.$cm['id'].' '; ?>" title="<?=$cm['ten'];?>">Xem tất cả</a>
												

											</div>
										</div>

									</div>
								</div>


							</div>
						</div>
						<?php } ?>
					<!-- End-->
		</div>
		<!-- End-->
	</div>
</div>

<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Danh mục vòng quay</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="row row-flex-safari game-list">
				
						<div class="col-sm-3 col-xs-6 p-5">
							<div class="classWithPad">
								<div class="news_image">
																			<a href="/quay20k.html" title="Vòng Quay 20k" class=""><img src="https://vongquay.tmquang.xyz/upload/pro01_1.jpg" alt="Vòng Quay 20k"></a>
									

								</div>
								<div class="news_title">
									<h2>
																					<a href="/quay20k.html" title="quay 20k">Vòng Quay Ngọc Rồng 20k</a>
																			</h2>


								</div>
								<div class="news_description">
									
								
								</div>
								<div class="a-more">
									<div class="row">

										<div class="col-xs-12">
											<div class="view">
																									<a href="/quay20k.html" title="<?=$cm['ten'];?>">Quay Ngay</a>
												

											</div>
										</div>

									</div>
								</div>


							</div>
						</div>
					
					<!-- End-->
		</div>
		<!-- End-->
	</div>
</div>




 
    

        <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                    </div>

                    <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                        <p style="text-align:center">Cập nhật rất nhiều acc game mới</p>

<p style="text-align:center"><strong>Cập nhật c&aacute;c dịch vụ game, thẻ c&agrave;o&nbsp; game</strong></p>

<p style="text-align:center">Ưu ti&ecirc;n ae d&ugrave;ng thẻ Viettel - ATM/V&iacute; để giao dịch</p>

<p style="text-align:center">Web đang&nbsp;cập nhật th&ecirc;m acc game v&agrave; nhiều thể loại game mới.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <script>

            $(document).ready(function(){
                if ($.cookie('noticeModal') != '1') {

                    $('#noticeModal').modal('show')
                    //show popup here

                    var date = new Date();
                    var minutes = 60*12;
                    date.setTime(date.getTime() + (minutes * 60 * 1000));
                    $.cookie('noticeModal', '1', { expires: date}); }
            });
        </script>
    




<!-- END: PAGE CONTENT -->
</div>

<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="assets/frontend/images/loader.gif"
                                                            style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
           <?=caidat('thongbao');?>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="assets/frontend/images/loader.gif"
                                                            style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>

<?php require('TMQ/end.php'); ?>
	