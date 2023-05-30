<?php 
require('../TMQ/function.php');
if($TMQ['admin'] == 0){
    header('Location: /');
    exit;
}
require('head.php');?>
    <link rel="stylesheet" href="/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
 
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

        <!-- Header-->
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    
                                    <li class="active">Danh sách bài viết</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách tài khoản</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>Tài khoản</th>
                                            <th>Loại nick</th>
                                            <th>Giá tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày đăng</th>
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
 if($TMQ['admin'] == 9){ 
$get = $db->query("SELECT * FROM `TMQ_baiviet`"); //lấy danh sách bài viết theo chuyên mục
}elseif($TMQ['admin'] == 1){
    $get = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `uid` = '$uid'"); //lấy danh sách bài viết theo chuyên mục
}
$tt = array('Đã bán','Chưa bán');

while($row = $get->fetch()){
    $loainick = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '".$row['loainick']."'")->fetch();
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$row['taikhoan'];?>/<?php if($TMQ['admin']==9 or $row['uid'] == $TMQ['uid']){echo $row['matkhau'];}?></td>
                                            <td><?=$loainick['ten'];?></td>
                                            <td><?=number_format($row['giatien']);?><sup>đ</sup></td>
                                            <td><?=$tt[$row['trangthai']];?></td>
                                            <td><?=$row['time'];?></td>
                                            <td>
                    <?php 
                if($uid == $row["uid"]){ 
                    if(!empty($row["img"])){ ?>
                        <a href="/admin/sua-bai-viet.html?id=<?=$row['id'];?>"><li class="fa fa-edit"></li></a>
                    <?php }else{ ?> <a href="/admin/sua-bai-viet-cham.html?id=<?=$row['id'];?>"><li class="fa fa-edit"></li></a>
                    <?php  }} ?>
                                            <a href="?del=<?=$row['id'];?>"><i class="ti-close"></i></a></td>
                                         
                                        </tr>
                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
<?php require('end.php'); ?>