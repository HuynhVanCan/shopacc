<?php 

require('../TMQ/function.php'); 
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
}
require('head.php'); 

$id = intval($_GET['id']);



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
                                  
                                    <li class="active">Gửi thông báo cho #<?=$id;?></li>
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
                                <strong>Thông báo cho #<?=$id;?></strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Nội dung thông báo</label>
                                    <div class="input-group">
                                        <input type="hidden" value="<?=$id;?>" id="id" name="id" />
                                     <textarea name="noidung" id="noidung" rows="9" placeholder="Nhập nội dung thông báo ở đây" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                               
                            
                        <button type="submit" class="btn btn-outline-success" name="theminbox" id="theminbox">Thêm</button>
   </div>
                        </div>
                    </div>

                <div class="col-lg-12">
                   
                    <div class="card">
                       
         <?php if(isset($_GET['del'])){ ?>
         <?php $id = intval($_GET['del']); ?>
         <?php $db->exec("DELETE FROM `TMQ_inbox` WHERE `id` = '$id' "); ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     
                                     Inbox đã bị xóa.
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
                                        <th scope="col">Người gửi</th>
                                        <th scope="col">Người nhận</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `TMQ_inbox`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $row){
     $name_gui = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid_gui']."'")->fetch();
     $name_nhan = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid']."'")->fetch();
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$row['id'];?></th>
                                        <td><?=$name_gui['name'];?></td>
                                        <td><?=$name_nhan['name'];?></td>
                                        <td><?=$row['noidung'];?></td>
                                        <td><?=$row['time'];?></td>
                                        <td>
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





