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
                                   
                                    <li class="active">Cài đặt shop</li>
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
                                <strong>Chỉnh sửa thông tin</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Logo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-bookmark"></i></div>
                                        <input class="form-control" name="logo" id="logo" value="<?=caidat('logo');?>">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tiêu đề</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-bookmark"></i></div>
                                        <input class="form-control" name="title" id="title" value="<?=caidat('title');?>">
                                    </div>
                                  
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-facebook"></i></div>
                                        <input class="form-control" name="facebook" id="facebook" value="<?=caidat('facebook');?>">
                                    </div>
                                  
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Số điện thoại</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" name="phone" id="phone" value="<?=caidat('phone');?>">
                                    </div>
                                  
                                </div>
                                  <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu admin</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                                        <input type="number" class="form-control" name="percent" id="percent" value="<?=caidat('ck_ctv');?>">
                                    </div>
                                  
                                </div>
                                	 <div class="form-group">
                                    <label class=" form-control-label">Thông báo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <textarea name="thongbao" id="thongbao" rows="9" placeholder="" class="form-control"><?=caidat('thongbao');?></textarea>
                                    </div>
                                    
                                </div>
                                	
                                    <label class=" form-control-label"><b>Bảo mật ODP</b></label>
                                   
                                   <div class="form-group">
                                    <label class=" form-control-label">Mua nick</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-shield"></i></div>
                                        <select class="form-control" name="odp_muanick" id="odp_muanick">
                                            <option <?php if(caidat('odp_muanick') == 0){ ?>selected<?php } ?>  value="0">Tắt</option>
                                            <option <?php if(caidat('odp_muanick') == 1){ ?>selected<?php } ?>  value="1">Mở</option>
                                        </select>
                                    </div>
                               
                                    
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Bảo trì</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-shield"></i></div>
                                        <select class="form-control" name="baotri" id="baotri">
                                            <option <?php if(caidat('baotri') == 0){ ?>selected<?php } ?>  value="0">Hoạt động</option>
                                            <option <?php if(caidat('baotri') == 1){ ?>selected<?php } ?>  value="1">Bảo trì</option>
                                        </select>
                                    </div>
                                  
                                </div>
                               
                            
                        <button type="submit" class="btn btn-outline-success" name="setting" id="setting">Thêm</button>
                            </div>
                            </div>
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php require('end.php'); ?>





