<?php
require('../TMQ/function.php');

$id = tmq_boc($_POST['id']);
$noidung = tmq_boc($_POST['noidung']);

$check = $db->query("SELECT * FROM `TMQ_inbox` WHERE `uid` = '$id' AND `noidung` = '$noidung'");
$check_user = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$id' ");

if($check->fetch()['id'] != null)
{

    echo'
    
     <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                Inbox này đã tồn tại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
elseif($check_user->fetch()['id'] == null){
    echo'
     <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                 Người dùng không tồn tại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
    ';
}    
else
{
    $db->exec("INSERT INTO `TMQ_inbox` SET 
    `uid_gui` = '$uid',
    `uid` = '$id', 
    `noidung` = '$noidung',
    `time` = '". date('H:i:s d-m-Y') ."'
    ");
 echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                 Đã gửi cho người dùng #'.$id.'
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';   
}
?>