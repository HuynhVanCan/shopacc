<?php
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
    
}
require('head.php'); 
?>
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
                                    
                                    <li class="active">Quản lý rút tiền</li>
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
                <div class="col-lg-12">
<?php

if(isset($_GET['ok'])){
    
    $id = intval($_GET['ok']);
    
    $db->exec("UPDATE `TMQ_ruttien` SET `trangthai` = 'Hoàn thành lúc ". date('H:i:s d-m-Y') ."' WHERE `id` = '$id'");
    
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Duyệt đơn rút tiền ID #'.$id.' thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

elseif(isset($_GET['huy'])){
    
    $id = intval($_GET['huy']);
    
    $get = $db->query("SELECT * FROM `TMQ_ruttien` WHERE `id` = '$id'")->fetch();

    
    if($get['trangthai'] == 'Chờ GD'){
        
    $db->exec("UPDATE `TMQ_ruttien` SET `trangthai` = 'Hủy GD lúc ". date('H:i:s d-m-Y') ."' WHERE `id` = '$id'");
    
    $db->exec("update `TMQ_user` set `cash` = `cash` + '". $get['amount'] ."' where `uid` = '". $get['uid'] ."'");
    
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                    Hủy đơn rút tiền ID #'.$id.' thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
     echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Đơn rút tiền ID #'.$id.' đã bị hủy trước đó.                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
    
    
}

?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Người rút</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Ngân hàng</th>
                                        <th scope="col">Chủ tài khoản</th>
                                        <th scope="col">Số tài khoản</th>
                                        <th scope="col">Chi nhánh</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `TMQ_ruttien`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $rt){
    $name_rut = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '". $rt['uid'] ."' ")->fetch();
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$rt['id'];?></th>
                                        <td><?=$name_rut['name'];?></td>
                                        <td><?=number_format($rt['amount']);?></td>
                                        <td><?=$rt['bank'];?></td>
                                        <td><?=$rt['ctk'];?></td>
                                        <td><?=$rt['stk'];?></td>
                                        <td><?=$rt['chinhanh'];?></td>
                                        <td><?=$rt['trangthai'];?></td>
                                        <td><a style="color: green;" href="?ok=<?=$rt['id'];?>">[DUYỆT]</a>
                                            <a style="color: red;"href="?huy=<?=$rt['id'];?>">[HỦY]</a></td>
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



<?php
require('end.php');
?>