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
                                    
                                    <li class="active">Quản lý giftcode</li>
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

                    <div class="col-xs-12 col-sm-12">
                           <p id="result"></p>
                        <div class="card">
                            <div class="card-header">
                                <strong>Thêm mã giảm giá</strong> 
                            </div>
                           
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Số lượng mã</label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" name="soluong" id="soluong">
                                    </div>
                                 
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu</label>
                                    <div class="input-group">
                                    
                                        <input class="form-control" name="chietkhau" id="chietkhau">
                                    </div>
                                    <small class="form-text text-muted">Giảm theo %</small>
                                </div>
                          
                     <button type="submit" class="btn btn-outline-success" name="themgiftcode" id="themgiftcode">Thêm</button>
                            </div>
                        </div>
                    </div>

                <div class="col-lg-12">
                   
                    <div class="card">
                       
         <?php if(isset($_GET['del'])){ ?>
         <?php $id = intval($_GET['del']); ?>
         <?php $db->exec("DELETE FROM `TMQ_giftcode` WHERE `id` = '$id' "); ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Mã đã bị xóa.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                    
         <?php  } ?>
                        
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mã</th>
                                        <th scope="col">Chiết khấu</th>
                                    <th scope="col">Người tạo</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `TMQ_giftcode`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $gc){
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$gc['id'];?></th>
                                        <td><?=$gc['gift'];?></td>
                                        <td><?=$gc['sotien'];?>%</td>
                                      <td><?=$gc['name'];?></td>
                                        <td>
                                            <a href="?del=<?=$gc['id'];?>"><i class="ti-close"></i></a></td>
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