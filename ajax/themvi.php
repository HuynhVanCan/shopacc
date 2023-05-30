<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
$bank_id = trim(addslashes(htmlspecialchars($_POST['bank_id1'])));
$account_vi = trim(addslashes(htmlspecialchars($_POST['account_vi'])));
$account_vi_confirmation = trim(addslashes(htmlspecialchars($_POST['account_vi_confirmation'])));

$check = $db->query("SELECT * FROM `TMQ_bank` WHERE `bank` = '$bank_id' AND `stk` = '$account_vi'");
if(empty($bank_id) || empty($account_vi) || empty($account_vi_confirmation)){
    echo'Vui lòng nhập đủ thông tin.';
}elseif($account_vi != $account_vi_confirmation){
    echo'Nhập lại tài khoản ví không trùng khớp.';
}elseif($check->fetch()['id'] != null){
    echo'Thông tin đã tồn tại trên hệ thống.';
}else{
    $db->exec("INSERT INTO `TMQ_bank` SET
    `uid` = '$uid',
    `bank` = '".string_bank($bank_id)."',
    `stk` = '$account_vi',
    `bank_type` = '1'
    ");
    echo 'Thành công.';
}