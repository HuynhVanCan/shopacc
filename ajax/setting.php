<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
$title = trim(addslashes(htmlspecialchars($_POST['title'])));
$facebook = trim(addslashes(htmlspecialchars($_POST['facebook'])));
$phone = trim(addslashes(htmlspecialchars($_POST['phone'])));
$baotri = trim(addslashes(htmlspecialchars($_POST['baotri'])));
$thongbao = trim(addslashes(htmlspecialchars($_POST['thongbao'])));
$logo = trim(addslashes(htmlspecialchars($_POST['logo'])));
$percent = tmq_boc($_POST['percent']);
$odp_muanick = tmq_boc($_POST["odp_muanick"]);
$db->exec("UPDATE `TMQ_setting` SET `text` = '$title' WHERE `key` = 'title'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$facebook' WHERE `key` = 'facebook'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$phone' WHERE `key` = 'phone'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$baotri' WHERE `key` = 'baotri'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$thongbao' WHERE `key` = 'thongbao'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$logo' WHERE `key` = 'logo'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$percent' WHERE `key` = 'ck_ctv'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$odp_muanick' WHERE `key` = 'odp_muanick'");
echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Sửa thông tin shop thành công<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';