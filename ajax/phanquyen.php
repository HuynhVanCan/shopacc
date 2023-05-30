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
$chucvu = intval($_POST['chucvu']);
$pass = tmq_boc($_POST['pass']);

$check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$getuid'")->fetch();


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
  
    $db->exec("UPDATE `TMQ_user` SET `admin` = '$chucvu',`pass` = '". md5($pass) ."' WHERE `uid` = '$getuid'");

 
        echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                   Đã phân quyền cho cho #'.$getuid.' thành công,pass là '.$pass.'.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}