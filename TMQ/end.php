<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
   <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="/TMQ_giaodien/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
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
                    curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/TMQ_giaodien/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                    curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
                });
            });
        });
    </script>

<!-- END: PAGE CONTAINER -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
    <div class="c-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="c-container c-first">
                        <!-- <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold c-font-white">Về <span class="c-theme-font">Nick.vn</span>

                                <a target="_blank"  href="//www.dmca.com/Protection/Status.aspx?ID=6766daa6-8986-40c5-b282-a9c9e6a883de" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/_dmca_premi_badge_1.png?ID=6766daa6-8986-40c5-b282-a9c9e6a883de"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>

                            </h3>
                            <div class="c-line-left hide"></div>
                            <p class="c-text">
                                Chuyên mua bán nick các game... an toàn. Tin cậy nhanh chóng. Giao dịch tự động 24/24</p>
                        </div>
                        <ul class="c-links">
                            <li><a href="/gioi-thieu">Giới thiệu</a></li>
                            <li><a href="/huong-dan-mua-tai-khoan">Hướng Dẫn Mua Tài Khoản</a></li>
                            <li><a href="/huong-dan-nick-mua-tra-gop">Hướng Dẫn Mua Nick Trả Góp</a></li>
                            <li><a href="/tuyen-dai-ly-cung-cap-nick-tai-nickvn">Tuyển Đại Lý cung cấp nick tại Nick.vn</a></li>
                            <li><a href="/lien-he-gop-y"> Liên hệ/góp ý</a></li>
                        </ul> -->
                        <p><span style="color:#ffffff"><span style="font-size:22px"><strong>VỀ </strong></span></span><span style="color:#16a085"><span style="font-size:22px"><strong><?=$website;?></strong></span></span>

<p><span style="color:#bdc3c7">Chuyên mua bán nick các game... an toàn. Tin cậy nhanh chóng. Giao dịch tự động 24/24</span></p>

<ul>
	<li><a href="/gioi-thieu">Giới thiệu</a></li>
	<li><a href="/huong-dan-mua-tai-khoan">Hướng Dẫn Mua Tài Khoản</a></li>
	<li><a href="/huong-dan-nick-mua-tra-gop">Hướng Dẫn Mua Nick Trả Góp</a></li>

	<li><a href="/lien-he-gop-y">Liên hệ/góp ý</a></li>
</ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="c-container c-last">
                    <!-- <div class="c-content-title-1">
							<h3 class="c-font-uppercase c-font-bold c-font-white">Chúng tôi ở đây</h3>
							<div class="c-line-left hide"></div>
							<p>Chúng tôi làm việc một cách chuyên nghiệp, uy tín, nhanh chóng và luôn đặt quyền lợi của bạn lên hàng đầu</p>
						</div>
						<ul class="c-socials">
							<li><a href="<?=caidat('facebook')?>" target="_blank"><i class="icon-social-facebook"></i></a></li>
							<li><a href="" target="_blank"><i class="icon-social-youtube"></i></a></li>
						</ul>
						<ul class="c-address"> -->
                        <!--<li><i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills</li>-->
                    <!-- <li><i class="icon-call-end c-theme-font"></i> <a href="tel:0869693000" class="c-font-regular">08.6969.3000</a> (8h-22h)</li>
							<li><i class="icon-envelope c-theme-font"></i> <a href="mailto:" class="c-font-regular"></a></li>
							<li><i class="icon-clock c-theme-font"></i><span class="c-font-regular">8h-11h30 & 13h30-22h</span></li>
						</ul> -->
                        <h2><span style="font-size:22px"><span style="color:#ffffff"><strong>CHÚNG TÔI Ở ĐÂY</strong></span></span></h2>

<h3><span style="color:#bdc3c7"><span style="font-size:16px">Chúng tôi làm việc một cách chuyên nghiệp, uy tín, nhanh chóng và luôn đặt quyền lợi của bạn lên hàng đầu.</span></span></h3>

<p>&nbsp;</p>



<p><i class="fa fa-phone"></i>&nbsp;<strong>Hotline:</strong>&nbsp;<strong><?=caidat('phone');?></strong></p>

<p><i class="fa fa-calendar"></i>&nbsp;<strong>Thời gian làm việc 8h-11h30 & 13h30-22h</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="fb-root"></div>
                    
                            
                            
                                
                            
                            
                            
                            
                        
                    <div class="fb-page"
                         data-href="<?=caidat('facebook')?>"
                         data-tabs="timeline" data-height="270" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?=caidat('facebook')?>"
                                    class="fb-xfbml-parse-ignore"><a
                                    href="<?=caidat('facebook')?>"><?=$website;?></a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-postfooter" style="margin-top: -70px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 c-col">
                    <p class="c-copyright c-font-grey">2019 &copy; Vận hành bởi <a style="color: #32c5d2 !important"
                                                                                   href="https://tmquang.xyz">TMQ</a>
                        <span class="c-font-grey-3"> </span>
                </div>
            </div>
        </div>
    </div>
</footer><!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
    <i class="icon-arrow-up"></i>
</div><!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
<![endif]-->
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/js/scripts/reveal-animate/reveal-animate.js"
        type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="/TMQ_giaodien/assets/frontend/theme/assets/global/plugins/magnific/magnific.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/smooth-scroll/jquery.smooth-scroll.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/js-cookie/js.cookie.js" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="/TMQ_giaodien/assets/frontend/theme/assets/base/js/components.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/base/js/app.js" type="text/javascript"></script>

<script src="/TMQ_giaodien/assets/frontend/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        App.init(); // init core
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $(".menu-main-mobile a").click(function () {

        if ($(this).closest("li").hasClass("c-open")) {
            $(this).closest("li").removeClass("c-open");
        }
        else {
            $(this).closest("li").addClass("c-open");
        }
    });

</script>
<!-- END: THEME SCRIPTS -->
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/moment.min.js" type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-daterangepicker/daterangepicker.min.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/js/scripts/pages/datepicker.js"
        type="text/javascript"></script>
<script src="/TMQ_giaodien/assets/frontend/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"
        type="text/javascript"></script>

<script src="/TMQ_giaodien/assets/frontend/js/common.js" type="text/javascript"></script>





    <!-- END: LAYOUT/BASE/BOTTOM -->


<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v3.3'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


</body>
</html>
