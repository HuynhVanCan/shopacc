 <?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); 

    $thongtin1 = "";
    $thongtin2 = "";
    $thongtin3 = "";
    $thongtin4 = "";

    $taikhoan = trim(addslashes(htmlspecialchars($_POST['taikhoan'])));
    $matkhau = trim(addslashes(htmlspecialchars($_POST['matkhau'])));
    $loainick = trim(addslashes(htmlspecialchars($_POST['loainick'])));
    $giatien = abs(intval($_POST['giatien']));
    $thongtin1 = tmq_boc($_POST['thongtin1']);
    $thongtin2 = tmq_boc($_POST['thongtin2']);
    $thongtin3 = tmq_boc($_POST['thongtin3']);
    $thongtin4 = tmq_boc($_POST['thongtin4']);
    $thongtin = trim(addslashes(htmlspecialchars($_POST['thongtin'])));
    $img = tmq_boc($_POST['img']);
     $check = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `taikhoan` = '$taikhoan' AND `matkhau` = '$matkhau'");
if(empty($taikhoan) || empty($matkhau) ||empty($giatien) ||empty($thongtin) ||empty($img))    {
    echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Vui lòng nhập đủ thông tin cần thiết.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                    echo $img;
}elseif($check->fetch()['id'] != NULL){
     echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Tài khoản đã tồn tại trên hệ thống, vui lòng kiểm tra lại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
    $db->exec("INSERT INTO `TMQ_baiviet` SET
    `uid` = '$uid',
    `taikhoan` = '$taikhoan',
    `matkhau` = '$matkhau',
    `loainick` = '$loainick',
    `giatien` = '$giatien',
    `thongtin_1` = '$thongtin1',
    `thongtin_2` = '$thongtin2', 
    `thongtin_3` = '$thongtin3',
    `thongtin_4` = '$thongtin4',
    `thongtin` = '$thongtin',
    `img` = '$img',
    `trangthai` = '1',
    `time` = '". date('H:i:s d-m-Y') ."'
    ");
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                       Tài khoản đã được đăng thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

