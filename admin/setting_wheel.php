<?php 
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
}
require('head.php'); 
$TMQ_ketqua = "";
if(isset($_POST['update20k'])){
    $tyle201s = tmq_boc($_POST["tyle201"]);
    $tyle202s = tmq_boc($_POST["tyle201"]);
    $tyle203s = tmq_boc($_POST["tyle201"]);
    $tyle204s = tmq_boc($_POST["tyle201"]);
    $tyle205s = tmq_boc($_POST["tyle201"]);
    $tyle206s = tmq_boc($_POST["tyle201"]);
    $tyle207s = tmq_boc($_POST["tyle201"]);
    $tyle208s = tmq_boc($_POST["tyle201"]);
    $tyle209s = tmq_boc($_POST["tyle201"]);
    $tyle2010s = tmq_boc($_POST["tyle201"]);
    
    if(empty($tyle201s) || empty($tyle202s) || empty($tyle203s) || empty($tyle204s) || empty($tyle205s) || empty($tyle206s) || empty($tyle207s) || empty($tyle208s) || empty($tyle209s) || empty($tyle2010s)){
        $TMQ_ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
<span class="badge badge-pill badge-danger">Cảnh Báo</span>
Vui lòng nhập đủ thông tin.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
    }
}
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
                                   
                                    <li class="active">Cài đặt vòng quay</li>
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
<?php echo $TMQ_ketqua ;?>                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Chỉnh sửa tỷ lệ vòng quay 20k</strong>
                            </div>
                         <div class="card-body card-block">
                             <p>1. Vòng quay 20k (Bắt buộc 1 phần quà phải ở 100% - Nếu không sẽ bị lỗi quay thưởng)</p>
                             <p>2. Nếu muốn phần thưởng nào không quay trúng đặt tỉ lệ là 0</p>
                         </div>
                          
                            <div class="card-body card-block">
                                <form method="POST">
                                <div class="row form-group">
<div class="col col-md-2"><label>20 Triệu Vàng</label><input type="text" name="tyle201" class="form-control" value="<?=$tyle201;?>"></div>
<div class="col col-md-2"><label>Sơ Sinh Có Đệ</label><input type="text" name="tyle202" class="form-control" value="<?=$tyle202;?>"></div>
<div class="col col-md-2"><label>Sơ Sinh Có Đệ</label><input type="text" name="tyle203" class="form-control" value="<?=$tyle203;?>"></div>
<div class="col col-md-2"><label>Sơ Sinh Có Đệ</label><input type="text" name="tyle204" class="form-control" value="<?=$tyle204;?>"></div>
<div class="col col-md-2"><label>Nick Vip 300k</label><input type="text" name="tyle205" class="form-control" value="<?=$tyle205;?>"></div>
<div class="col col-md-2"><label>x1 Ngọc 2 Sao</label><input type="text" name="tyle206" class="form-control" value="<?=$tyle206;?>"></div>
</div>
 <div class="row form-group">
<div class="col col-md-2"><label>Nick Vip 300k</label><input type="text" name="tyle207" class="form-control" value="<?=$tyle207;?>"></div>
<div class="col col-md-2"><label>50 Triệu Vàng</label><input type="text" name="tyle208" class="form-control" value="<?=$tyle208;?>"></div>
<div class="col col-md-2"><label>10 Triệu Vàng</label><input type="text" name="tyle209" class="form-control" value="<?=$tyle209;?>"></div>
<div class="col col-md-2"><label>20 Triệu Vàng</label><input type="text" name="tyle2010" class="form-control" value="<?=$tyle2010;?>"></div>
</div>
                       <button type="button" class="btn btn-primary" name="update20k">Cập nhật</button>
                        </form>
                            </div>
                            </div>
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php require('end.php'); ?>





