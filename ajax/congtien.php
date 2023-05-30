<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
$getuid = tmq_boc($_POST['uid']);
$sotien = intval($_POST['sotien']);

$check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$getuid'")->fetch();
$saugd = $check['cash'] + $sotien;
if($check['uid'] == null){
    
    echo'
     <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                      Tài khoản không tồn tại trên hệ thống.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
  ';
}else{
    $name = $check['name'];
    $tien =  number_format($sotien);
    $name_cong = $TMQ['name'];
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '$sotien' WHERE `uid` = '$getuid'");
 $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$getuid',
    `noidung` = '$name được cộng $tien bởi $name_cong',
    `truocgd` = '".$check['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    echo'<meta http-equiv="refresh" content="3;url=/admin">
        <script type="text/javascript">
            window.location.href = "/admin"
        </script>';
        echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                    Đã cộng '.number_format($sotien).' cho #'.$getuid.'.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}