<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="vi">
<head>

        <meta charset="utf-8"/>
<title><?=caidat('title');?></title>
<meta name="description" content="TMQ">
<meta name="keywords" content="TMQ">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="canonical" href="https://<?=$website;?>">
<meta content="" name="author"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://<?=$website;?>"/>
<meta property="og:title" content="Web Mua Bán Nick Game, Acc Game, Shop Nick Game - <?=$website;?>"/>
<meta property="og:description" content="Web mua bán nick game,  Acc Game, Shop Nick  Ngọc rồng - nro, ninja school - nso, avatar , Hải Tặc - HTTH, Làng Lá - LLPLK, Liên Quân, Liên Minh - LMHT - LOL , Đột kích - CF, Truy Kích, Army 2, Hiệp Sĩ - HSO, nick vip, giá rẻ , uy tín của <?=$website;?>"/>

<meta property="og:image" content="ảnh hiển thị trên fb"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all'
          rel='stylesheet' type='text/css'>
<link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>
<link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet"
          type="text/css"/>
 <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
<link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
<link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN: BASE PLUGINS  -->
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet"
          type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN: PAGE STYLES -->
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- END: PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/css/components.css" id="style_components" rel="stylesheet"
          type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/css/themes/default.css" rel="stylesheet" id="style_theme"
          type="text/css"/>
    <link href="/TMQ_giaodien/assets/frontend/theme/assets/demos/default/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/TMQ_giaodien/assets/frontend/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/TMQ_giaodien/assets/frontend/plugins/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="/TMQ_giaodien/assets/frontend/plugins/owl-carousel/owl.transitions.css">
    <script src="/TMQ_giaodien/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
    <script src="/TMQ_giaodien/assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/TMQ_giaodien/assets/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="/TMQ_giaodien/assets/frontend/plugins/owl-carousel/slider.js"></script>
    
    <script src="/TMQ_giaodien/assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
    <link href="/TMQ_giaodien/assets/frontend/css/style.css?v=156533932650786" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <style>
    
        .ui-autocomplete {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .input-group-addon {
            background-color: #FAFAFA;
        }

        .input-group .input-group-btn > .btn, .input-group .input-group-addon {
            background-color: #FAFAFA;
        }

        .modal {
            text-align: center;
        }

        @media  screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .c-layout-header-fixed.c-layout-header-topbar .c-layout-page {
                margin-top: 245px;
            }
        }

        @media  screen and (max-width: 767px) {
            .modal-dialog:before {
                margin-top: 75px;
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }

            .modal-dialog {
                width: 100%;

            }

            .modal-content {
                margin-right: 20px;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;

        }

        .mfp-wrap {
            z-index: 20000 !important;
        }

        .c-content-overlay .c-overlay-wrapper {
            z-index: 6;
        }

        .z7 {
            z-index: 7 !important;
        }
    </style>

    <link href="/TMQ_giaodien/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
    <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css'>-->
</head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">

<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light">
        <div class="container">
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-left">
                <ul class="c-icons c-theme-ul">
                    <li>
                        <a href="<?=caidat('facebook')?>"
                           target="_blank">
                            <i class="icon-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank">
                            <i class="icon-social-youtube"></i>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- END: INLINE NAV -->
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-right m-t-10">
                <ul class="c-links c-theme-ul">
                    <li>
                        Hotline: <a
                                href="tel:<?=caidat('phone');?>"><?=caidat('phone');?> </a>
                    </li>

                    <!--                <li class="c-divider">|</li>
                                    <li>
                                        <a href="/contact.html">Liên hệ</a>
                                    </li>
                                    <li class="c-divider">|</li>
                                    <li>
                                        <a href="/faq.html">FAQ</a>
                                    </li>-->
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <h1 style="margin: 0px;display: inline-block">
                        <a href="/" class="c-logo"
                           alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
                            <img height="35px"
                                 src="<?=caidat('logo');?>"
                                 alt="" class="c-desktop-logo">
                            <img height="29px"
                                 src="<?=caidat('logo');?>"
                                 alt="" class="c-desktop-logo-inverse">
                            <img height="35px"
                                 src="<?=caidat('logo');?>"
                                 alt="" class="c-mobile-logo"> </a>
                    </h1>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                    <button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <button class="c-search-toggler" type="button">
                     <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <!--    <button class="c-cart-toggler" type="button">
                            <i class="icon-handbag"></i>
                            <span class="c-cart-number c-theme-bg">2</span>
                        </button>-->
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Tìm kiếm..." value="" class="form-control"
                           autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>
                <!-- END: QUICK SEARCH -->                        <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                <style>
                    .c-menu-type-mega:hover {
                        transition-delay: 1s;
                    }

                    .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:focus > a:not(.btn), .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:active > a:not(.btn), .c-layout-header.c-layout-header-4 .c-navbar .c-mega-menu > .nav.navbar-nav > li:hover > a:not(.btn) {
                        color: #3a3f45;
                        background: #FAFAFA;
                    }
                </style>
            <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold d-none hidden-xs hidden-sm">
	
<ul  class="nav navbar-nav c-theme-nav">
<li class="c-menu-type-classic"><a  rel=""  href="/" class="c-link dropdown-toggle ">Trang chủ</a></li>
<li class="c-menu-type-classic"><a  rel=""  href="#" class="c-link dropdown-toggle ">Nạp tiền<span class="c-arrow c-toggler"></span></a>
<ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left " >
<li class="c-menu-type-classic"><a  rel="" href="/nap-the" class="">Nạp thẻ tự động</a></li>
<li class="c-menu-type-classic"><a  rel="/atm" href="/atm" class="load-modal">Nạp tiền từ ATM/V&iacute; điện tử</a></li></ul>
</li>
<li class="c-menu-type-classic"><a  rel=""  href="/tintuc" class="c-link dropdown-toggle ">Tin tức</a>

</li>  
<?php 
if($TMQ['admin'] == 9 || $TMQ['admin'] == 1){
    echo'<li class="c-menu-type-classic"><a style="color: #e7505a;" rel=""  href="/admin" class="c-link dropdown-toggle ">ADMIN CPANEL</a>

</li>  ';
}
?>
<?php if(empty($uid)){ ?>
<li><a href="/dang-nhap.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
	<i class="icon-user"></i> Đăng nhập</a>
</li>
<li><a href="/dang-ky.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
	<i class="icon-key"></i> Đăng ký</a>
</li>

<?php }else{ ?>
<li><a href="/profile/info.html" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
	<i class="icon-user"></i> <?=$TMQ['name'];?></a>
</li>
<li><a href="/logout.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
	<i class="icon-logout"></i> Đăng xuất</a>
</li>
<?php } ?></ul>


</nav>





<nav class="menu-main-mobile c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold hidden-md hidden-lg">
    
<ul  class="nav navbar-nav c-theme-nav">
<li class="c-menu-type-classic"><a  rel=""  href="/" class="c-link dropdown-toggle ">Trang chủ</a></li>
<li class="c-menu-type-classic"><a  rel=""  href="#" class="c-link dropdown-toggle ">Nạp tiền<span class="c-arrow c-toggler"></span></a>
<ul id="children-of-41" class="dropdown-menu c-menu-type-classic c-pull-left " >
<li class="c-menu-type-classic"><a  rel="" href="/nap-the" class="">Nạp thẻ tự động</a></li><li class="c-menu-type-classic"><a  rel="/atm" href="/atm" class="load-modal">Nạp tiền từ ATM/V&iacute; điện tử</a></li></ul>
</li><li class="c-menu-type-classic"><a  rel=""  href="/tintuc" class="c-link dropdown-toggle ">Tin tức</a>
</li> 
<?php 
if($TMQ['admin'] == 9 || $TMQ['admin'] == 1){
    echo'<li class="c-menu-type-classic"><a style="color: #e7505a;" rel=""  href="/admin" class="c-link dropdown-toggle ">ADMIN CPANEL</a>

</li>  ';
}
?>
<?php if(empty($uid)){ ?>
<li><a href="/dang-nhap.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-user"></i> Đăng nhập</a>
                    </li>
                    <li><a href="/dang-ky.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-key"></i> Đăng ký</a>
                    </li>
                    <?php }else{ ?>
                <li><a href="/profile/info.html" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-user"></i> <?=$TMQ['name'];?></a>
                    </li>
                     <li><a href="/logout.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-logout"></i> Đăng xuất</a>
                    </li>
                    <?php } ?></ul>


</nav>

            <!-- END: MEGA MENU -->
                <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- END: HOR NAV -->
            </div>
            <!-- BEGIN: LAYOUT/HEADERS/QUICK-CART -->
            <!-- BEGIN: CART MENU -->
            <!-- END: CART MENU -->
            <!-- END: LAYOUT/HEADERS/QUICK-CART -->
        </div>
    </div>
</header>
<!-- END: HEADER -->
<!-- END: LAYOUT/HEADERS/HEADER-1 -->