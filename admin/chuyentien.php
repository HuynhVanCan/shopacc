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
                                    
                                    <li class="active">Quản lý chuyển tiền</li>
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

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Người chuyển</th>
                                        <th scope="col">Người nhận</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Thời gian</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `TMQ_chuyentien`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $ct){
  
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$ct['id'];?></th>
                                        
                                        <td><?=$ct['uid_chuyen'];?></td>
                                        
                                        <td><?=$ct['uid_nhan'];?></td>
                                        
                                        <td><?=number_format($ct['sotien']);?><sup>đ</sup></td>
                                        
                                        <td><?=$ct['noidung'];?></td>
                                        
                                        <td><?=$ct['time'];?></td>
                                       
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