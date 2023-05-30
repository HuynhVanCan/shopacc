<?php require('../TMQ/function.php');
if($TMQ['admin'] == 0){
    header('Location: /admin');
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
                                    
                                    <li class="active">Danh sách Cộng tác viên</li>
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
                        <?php
                        if($TMQ['admin'] == 9){
   
if(isset($_GET['ban'])){
    $id = intval($_GET['ban']);
    
    $db->exec("UPDATE `TMQ_user` SET `ban` = '1' WHERE `uid` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        CTV '.$id.' đã bị khóa thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}elseif(isset($_GET['unban'])){
    $id = intval($_GET['unban']);
    
    $db->exec("UPDATE `TMQ_user` SET `ban` = '0' WHERE `uid` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        CTV '.$id.' đã bỏ khóa thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}}
?>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cộng tác viên</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>UID</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Số tiền</th>
                                            <th>Tình trạng</th>
                                            <th>Ngày tham gia</th>
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `TMQ_user` WHERE `admin` = '1'"); //lấy danh sách bài viết theo chuyên mục
while($row = $get->fetch()){
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$row['uid'];?></td>
                                            <td><?=$row['name'];?></td>
                                            <td><?=$row['email'];?></td>
                                            <td><?=number_format($row['cash']);?><sup>đ</sup></td>
                                            <td><?=ban($row['ban']);?></td>
                                            <td><?=$row['date'];?></td>
                                             <td><a  href="/admin/cong-tien.html?uid=<?=$row['uid'];?>"><li class="fa  fa-money"></li></a>
                                            <?php if($row['ban'] == 0){ ?>
                                            <a STYLE="COLOR: RED;" href="?ban=<?=$row['uid'];?>"><i class="fa fa-close"></i></a>
                                            <?php }else{ ?>
                                            <a STYLE="COLOR: GREEN;" href="?unban=<?=$row['uid'];?>"><i class="fa fa-folder-open-o"></i></a>
                                            <?php } ?>
                                          <a href="/admin/phan-quyen-thanh-vien.html?uid=<?=$row['uid'];?>"><i class="fa fa-users"></i></a>
                                             <a href="/admin/inbox.html?id=<?=$row['uid'];?>"><i class="fa fa-inbox"></i></a></td>
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