<?php require('../TMQ/function.php'); 
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
}
require('head.php'); 
if(isset($_GET['uid'])){
$id = tmq_boc($_GET['uid']);

}?>  


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
                                 
                                    <li class="active">Phân quyền #<?=$id;?></li>
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
                                <strong>Phân quyền cho cho UID #<?=$id;?></strong>
                            </div>
                        
                          
                            <div class="card-body card-block">
                             <input class="form-control" name="uid" type="hidden" id="uid" value="<?=$id;?>">
                                   <div class="form-group">
                                         <label class=" form-control-label">Chức vụ:</label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-user"></i></div>
                                        
                                            <select name="chucvu" id="chucvu" class="form-control">
                                            <option  value="0">Thành viên</option>
                                             <option  value="1">Cộng tác viên</option>
                                             <option  value="9">Admin</option>
                                            </select>
                                        
                                    </div>
                                    </div>
                                     <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-compass"></i></div>
                                        <input class="form-control" name="pass" type="text" id="pass">
                                    </div>
                                    
                                </div>
                             <button type="submit" class="btn btn-outline-success" name="phanquyen" id="phanquyen">Set quyền</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php require('end.php'); ?>





