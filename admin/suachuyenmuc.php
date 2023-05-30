<?php
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
}
require('head.php'); 
$id = intval($_GET['id']);

$get = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '$id'")->fetch();
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
                                    <li class="">Chuyên mục</li>
                                    <li class="active">Sửa chuyên mục</li>
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
                            <strong class="card-title">Chuyên mục</strong>
                        </div>
                        <div class="card-body">
                                    <p id="tra_ve"></p>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Tên Chuyên Mục</label>
                                    <div class="input-group">
                                        <input type="hidden" id="id" name="id" value="<?=$get['id'];?>"/>
                                        <input class="form-control" name="name" id="name" value="<?=$get['ten'];?>">
                                    </div>
                                    <small class="form-text text-muted">ex. Ngọc rồng Online, Liên minh huyền thoại,...</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Ảnh đại diện</label>
                                    <div class="input-group">
                                    
                                        <input class="form-control" name="img" id="img" value="<?=$get['img'];?>">
                                    </div>
                                    <small class="form-text text-muted">Xuất hiện tại trang chủ</small>
                                </div>
                              <div class="form-group">
                                    <label class=" form-control-label">Thông báo game</label>
                                    <div class="input-group">
                                     
                                       <textarea name="thongbao" id="thongbao" rows="9" placeholder="Nội dung thông báo" class="form-control"><?=$get['thongbao'];?></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 1</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info1" id="info1" rows="9" placeholder="Thông tin 1" class="form-control"><?=$get['thongtin_4'];?></textarea>
                                    </div>
                                  
                                </div>
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 2</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info2" id="info2" rows="9" placeholder="Thông tin 2" class="form-control"><?=$get['thongtin_4'];?></textarea>
                                    </div>
                                  
                                </div>
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Thông tin 3</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info3" id="info3" rows="9" placeholder="Thông tin 3" class="form-control"><?=$get['thongtin_4'];?></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                   <div class="form-group">
                                    <label class=" form-control-label">Thông tin 4</label>
                                    <div class="input-group">
                                     
                                       <textarea name="info4" id="info4" rows="9" placeholder="Thông tin 4" class="form-control"><?=$get['thongtin_4'];?></textarea>
                                    </div>
                                  
                                </div>
                                
                                
                                
                                
                                
                                
                            <div class="form-group">
                                    <label class=" form-control-label">Trạng thái</label>
                                    <div class="input-group">
                                    
                                         <select name="trangthai" id="trangthai" class="form-control">
                                            <option value="on">Hoạt động</option>
                                            <option value="off">Tắt</option>
                                        </select>
                                    </div>
                                    <small class="form-text text-muted">Tùy chỉnh hiển thị tại trang chủ</small>
                                </div>
                               <button type="submit" class="btn btn-outline-success" name="suachuyenmuc" id="suachuyenmuc">Sửa</button>
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