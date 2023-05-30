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
                                    
                                    <li class="active">Lịch sử giao dịch</li>
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
                                <strong class="card-title">Danh sách giao dịch</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>Người bán</th>
                                            <th>Người mua</th>
                                            <th>Thông tin nick</th>
                                            <th>Loại nick</th>
                                            <th>Giá tiền</th>
                                           
                                            <th>Ngày đăng</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    if($TMQ['admin'] == 9){
        $get = $db->query("SELECT * FROM `TMQ_lichsu`"); //lấy danh sách bài viết theo chuyên mục
    }elseif($TMQ['admin'] == 1){
$get = $db->query("SELECT * FROM `TMQ_lichsu` WHERE `uid_ban` = '$uid'"); //lấy danh sách bài viết theo chuyên mục
}
while($row = $get->fetch()){
    $loainick = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '".$row['id']."'")->fetch();
    $name_ban = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid_ban']."'")->fetch();
    $name_mua = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid_mua']."'")->fetch();
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$name_ban['name'];?></td>
                                            <td><?=$name_mua['name'];?></td>
                                            <td><?=$row['taikhoan'];?>/<?=$row['matkhau'];?></td>
                                            <td><?=$loainick['ten'];?></td>
                                            <td><?=number_format($row['giatien']);?><sup>đ</sup></td>
                                         
                                            <td><?=$row['date'];?></td>
                                            
                                         
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