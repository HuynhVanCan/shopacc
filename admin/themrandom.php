<?php require('../TMQ/function.php'); require('head.php'); ?>


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
                                    <li><a href="#">Chuyên mục</a></li>
                                    <li class="active">Đăng bài viết (random)</li>
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
                                <strong>Đăng bài viết</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                       
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="giatien" type="number" id="giatien">
                                    </div>
                                    
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Server</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="server" type="number" id="server">
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                         <label class=" form-control-label">Loại nick</label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        
                                            <select name="loainick" id="loainick" class="form-control">
                                                <?php $get_cm = $db->query("SELECT * FROM `TMQ_chuyenmuc`"); ?>
                                                <?php foreach($get_cm as $get){ ?>
                                                <option name="loainick" id="loainick" value="<?=$get['id'];?>"><?=$get['ten'];?></option>
                                              <?php } ?>
                                            </select>
                                        
                                    </div>
                                    </div>
									 <div class="form-group">
                                    <label class=" form-control-label">Thông tin đăng nhập</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <textarea name="info" id="info" rows="9" placeholder="Bắt buộc" class="form-control"></textarea>
                                    </div>
                                    
                                </div>
                              
                            
                        <button type="submit" class="btn btn-outline-success" name="themrandom" id="themrandom">Thêm</button>
                            </div>
                            </div>
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>
<?php require('end.php'); ?>