<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
$date = date("Y-m-d H:i:s");
$id = intval($_GET['id']);
$code = tmq_boc($_POST['code']);
$check_code = $db->query("SELECT * FROM `TMQ_key` WHERE `email` = '".$TMQ['email']."' AND `time` > '$date' AND `loai` = 'buy_acc'")->fetch();
$get = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
$not = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->rowCount();
$info_ban = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$get['uid']."'")->fetch();

if(isset($_POST['giftcode']) && $_POST['giftcode'] != ""){
    $giftcode = addslashes($_POST['giftcode']);
    $get_mgg = $db->query("SELECT * FROM `TMQ_giftcode` WHERE `gift` = '$giftcode'  ")->fetch();
    $giamoi = $get['giatien']*(100-$get_mgg['sotien'])/100;
} else {$giftcode = null; $giamoi = $get['giatien'] ;}



if(!isset($uid)){
    echo'Vui lòng đăng nhập để thực hiện giao dịch';
}elseif($TMQ['cash'] < $giamoi){
    echo'Số tiền không đủ để thực hiện giao dịch, vui lòng nạp thêm tiền vào tài khoản';
}elseif($get['trangthai'] == 0){
    echo'Tài khoản này đã được mua bởi người khác';
}elseif(empty($code) && caidat('odp_muanick') == 1){
    echo "Vui lòng nhập mã ODP";
}elseif($code != $check_code['key'] && caidat('odp_muanick') == 1){
    echo "Mã ODP không chính xác, vui lòng kiểm tra lại";
}elseif($not == NULL){
    echo'Tài khoản không tồn tại.';
}else{
    
    $giactv = $giamoi * caidat('ck_ctv');
    $saugd = $TMQ['cash'] - $giamoi;
    $ctv_saugd = $info_ban['cash'] + $giactv;
    $db->exec("INSERT INTO `TMQ_lichsu` SET
    `uid_mua` = '$uid',
    `uid_ban` = '".$get['uid']."',
    `taikhoan` = '". $get['taikhoan'] ."',
    `matkhau` = '". $get['matkhau'] ."',
    `giatien` = '". $get['giatien'] ."',
    `loainick` = '". $get['loainick'] ."',
    `id_acc` = '$id',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");
    $db->query("UPDATE `TMQ_user` SET `cash` = `cash` + $giactv WHERE `uid` = '". $get['uid'] ."'");
    $db->query("UPDATE `TMQ_user` SET `cash` = `cash` - $giamoi WHERE `uid` = '". $uid ."'");
    $db->query("UPDATE `TMQ_baiviet` SET `trangthai` = '0' WHERE `id` = '". $id ."'");
    $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Mua tài khoản #$id với giá ".number_format($giamoi)." <sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '".$get['uid']."',
    `noidung` = 'Bán nick #$id, nhận được  ".number_format($giactv)." <sup>đ</sup>',
    `truocgd` = '".$info_ban['cash']."',
    `saugd` = '$ctv_saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    if($code != null){
        $db->query("DELETE FROM `TMQ_key` WHERE `key` = '$code' ");
    }
    if($giftcode != NULL){
        $db->query("DELETE FROM `TMQ_giftcode` WHERE `gift` = '$giftcode' ");
    }
    echo'Tài khoản đã mua thành công';
}