<?php
if(!isset($uid)){
header('Location: /');
}
if($TMQ['admin'] != 1 && $TMQ['admin'] != 9){
header('Location: /');
}
if(empty($_SESSION['pass2'])){
    header('Location: /admin/dang-nhap.html');
}

    ?><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Cpanel TMQ</title>
    <meta name="description" content="Admin Cpanel TMQ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/admin/images/favicon.png">
    <link rel="shortcut icon" href="/admin/images/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/scss/mixins/_alert.scss" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="/ckeditor/ckeditor/ckeditor.js" type="text/javascript" ></script>
<script>
$(document).ready(function() {
	// get current URL path and assign 'active' class
	var pathname = window.location.pathname;
	$('.nav navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
})
</script>
</script>
   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Quản lý chuyên mục</li><!-- /.menu-title -->
                    <?php if($TMQ['admin'] == 9){ ?>
                    <li>
                        <a href="/admin/chuyen-muc.html"> <i class="menu-icon fa fa-list-ol"></i>Chuyên mục </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="/admin/them-bai-viet.html"> <i class="menu-icon fa fa-pencil"></i>Đăng sản phẩm</a>
                    </li>
                    <li>
                        <a href="/admin/them-bai-viet-cham.html"> <i class="menu-icon fa fa-pencil"></i>Đăng sản phẩm (chậm)</a>
                    </li>
                    <li>
                        <a href="/admin/danh-sach-bai-viet.html"> <i class="menu-icon  fa  fa-list-alt"></i>Danh sách bài viết</a>
                    </li>   
                    <?php if($TMQ['admin'] == 9){ ?>
                     <li class="menu-title">Quản lý dịch vụ</li><!-- /.menu-title -->
                     <li>
                        <a href="/admin/napthe.php"> <i class="menu-icon fa fa-money"></i>Nạp thẻ</a>
                    </li>
                   <li>
                        <a href="/admin/rut-tien.html"> <i class="menu-icon fa fa-money"></i>Rút tiền</a>
                    </li>
                     <li>
                        <a href="/admin/chuyen-tien.html"> <i class="menu-icon fa fa-money"></i>Chuyển tiền</a>
                    </li>
                    
                    <li class="menu-title">Thành viên</li><!-- /.menu-title -->

                   <li>
                        <a href="/admin/quan-tri-vien.html"> <i class="menu-icon ti-user"></i>Quản trị viên </a>
                    </li>
                    <li>
                        <a href="/admin/cong-tac-vien.html"> <i class="menu-icon fa fa-user-md"></i>Cộng tác viên</a>
                    </li>
                    <li>
                        <a href="/admin/thanh-vien.html"> <i class="menu-icon  fa  fa-users"></i>Thành viên</a>
                    </li>   
                    <li class="menu-title">Lịch sử hoạt động</li><!-- /.menu-title -->
                   
                   <li>
                        <a href="/admin/lich-su.html"> <i class="menu-icon fa fa-history"></i>Lịch sử giao dịch</a>
                    </li>
                 
                    <li>
                        <a href="/admin/bien-doi.html"> <i class="menu-icon fa fa-bar-chart-o"></i>Biến đổi số dư</a>
                    </li>
                     <li class="menu-title">Cài đặt shop</li><!-- /.menu-title -->

                   <li>
                        <a href="/admin/thong-tin.html"> <i class="menu-icon ti-settings"></i>Thông tin shop </a>
                    </li>
                     <li>
                        <a href="/admin/quan-ly-banner.html"> <i class="menu-icon ti-settings"></i>Quản Lý Banner</a>
                    </li>
                    <li>
                        <a href="/admin/quan-ly-giftcode.html"> <i class="menu-icon ti-gift"></i>Quản lý Giftcode</a>
                    </li>
                  <?php } ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img width="25%" src="/admin/images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/admin/images/favicon.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary"><?=$db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '".$TMQ['uid']."'")->rowCount();?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">Bạn có <?=$db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '".$TMQ['uid']."'")->rowCount();?> thư</p>
                        <?php $get = $db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '".$TMQ['uid']."'");
                                
                            foreach($get as $ls){
                            $ng = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$ls['uid_gui']."'")->fetch();?>        
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left">
    <?php if(empty($TMQ['avatar'])){ ?>
    <img alt="avatar" src="https://graph.facebook.com/<?=$ls['uid_gui']?>/picture?width=200&height=200">
    <?php }else{ ?>
    <img alt="avatar" src="<?=$ng['avatar'];?>">
    <?php } ?></span>
                                    <div class="message media-body">
                                        <span class="name float-left"><?=$ng['name']?></span>
                                        <span class="time float-right"><?=$ls['time'];?></span>
                                        <p><?=$ls['noidung'];?></p>
                                    </div>
                                </a>
                                <?php } ?>
                               
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php if(empty($TMQ['avatar'])){ ?>
                            <img class="user-avatar rounded-circle" src="https://graph.facebook.com/<?=$TMQ['uid']?>/picture?width=200&height=200" alt="User Avatar">
                            <?php }else{ ?>
                                   <img class="user-avatar rounded-circle" src="<?=$TMQ['avatar']?>" alt="User Avatar">
                            <?php } ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/profile/info.html"><i class="fa fa- user"></i>My Profile</a>

                         

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="/"><i class="fa fa-power -off"></i>Về Shop</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->