<?php
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
    
}
require('head.php'); 
?>  <link rel="stylesheet" href="/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
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
                                    
                                    <li class="active">Chuyên mục</li>
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
                        <?php if(isset($_GET['add'])){ ?>
                           <p id="result"></p>
                        <div class="card">
                            <div class="card-header">
                                <strong>Thêm chuyên mục</strong> 
                            </div>
                           
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Tên Chuyên Mục</label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" name="name" id="name">
                                    </div>
                                    <small class="form-text text-muted">ex. Ngọc rồng Online, Liên minh huyền thoại,...</small>
                                </div>
                                
                                  <div class="form-group">
                                    <label class=" form-control-label">Loại Chuyên mục</label>
                                    <div class="input-group">
                                      
                                 <select name="loaicm" id="loaicm" class="form-control">
                                          <option value=""><----Chọn-----></option>
                                          <option value="1">Nick thường</option>
                                          <option value="2">Nick random</option>
                                      </select>  
                                      
                                    </div>
                                    <small class="form-text text-muted">ex. Ngọc rồng Online, Liên minh huyền thoại,...</small>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class=" form-control-label">Ảnh đại diện</label>
                                    <div class="input-group">
                                    
                                        <input class="form-control" name="img" id="img">
                                    </div>
                                    <small class="form-text text-muted">Xuất hiện tại trang chủ</small>
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông báo game</label>
                                    <div class="input-group">
                                     
                                       <textarea name="thongbao" id="thongbao" rows="9" placeholder="Nội dung thông báo" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 1</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info1" id="info1" rows="9" placeholder="Thông tin 1" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 2</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info2" id="info2" rows="9" placeholder="Thông tin 2" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 3</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info3" id="info3" rows="9" placeholder="Thông tin 3" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                   <div class="form-group">
                                    <label class=" form-control-label">Thông tin 4</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info4" id="info4" rows="9" placeholder="Thông tin 4" class="form-control"></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                
                                
                              <p style="color: red" id="result"></p>
                     <button type="submit" class="btn btn-outline-success" name="themchuyenmuc" id="themchuyenmuc">Thêm</button>
                            </div>
                        </div>
                    </div>

                       
         <?php 
}else{
         if($TMQ['admin'] == 9){
         if(isset($_GET['del'])){ 
          $id = intval($_GET['del']);
          $db->exec("DELETE FROM `TMQ_chuyenmuc` WHERE `id` = '$id' "); ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Chuyên mục đã bị xóa.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                    
         <?php  }
         if(isset($_GET['on'])){
             $id = intval($_GET['on']);
             $db->exec("UPDATE `TMQ_chuyenmuc` SET `trangthai` = 'on' WHERE `id` = '$id'");
             echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Sửa trạng thái Hoạt động cho '.$id.' thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';  
             
         }
         if(isset($_GET['off'])){
              $id = intval($_GET['off']);
             $db->exec("UPDATE `TMQ_chuyenmuc` SET `trangthai` = 'off' WHERE `id` = '$id'");
             echo ' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                    Sửa trạng thái không hoạt động cho '.$id.' thành công .
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
         }
         
         }?>  <div class="card">
                            <div class="card-header">
                                <strong>Danh sách chuyên mục - <a style="color:red;" href="?add">Thêm Chuyên Mục</a></strong> 
                            </div>
                           
                        
    
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên chuyên mục</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$get = $db->query("SELECT * FROM `TMQ_chuyenmuc`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $cm){
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$cm['id'];?></th>
                                        <td><?=$cm['ten'];?></td>
                                        <td><?php if($cm['trangthai'] == 'on'){echo'<span class="badge badge-pill badge-success">Hoạt động</span>';}else{echo'<span class="badge badge-pill badge-danger">Bảo trì</span>';}?></td>
                                        <td><?=loaicm($cm['loaicm']);?></td>
                                        <td><?=$cm['img'];?> <br>
                                      <center> <img style="width: 250;height: 100;" src="<?=$cm['img'];?>" alt="<?=$cm['ten'];?>">
                                         </center></td>
                                        <td><a href="/admin/sua-chuyen-muc.html?id=<?=$cm['id'];?>"><li class="fa fa-edit"></li></a>
                                            <a href="?del=<?=$cm['id'];?>"><i class="ti-close"></i></a>
                                            <?php if($cm['trangthai'] == 'on'){ ?>
                                             <a style="color:red;" href="?off=<?=$cm['id'];?>"><i class="fa fa-power-off"></i>
                                        <?php    }else{ ?>
                                         <a  style="color:green;" href="?on=<?=$cm['id'];?>"><i class="fa fa-power-off"></i>
                                        <?php } ?>
                                            </td>
                                    </tr>
                                    
                                  <?php } ?> 
                                </tbody>
                            </table>
                        </div></div></div>

<?php } ?></div>
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>



<?php
require('end.php');
?>