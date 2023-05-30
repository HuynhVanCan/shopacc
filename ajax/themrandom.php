<?php
require("../TMQ/function.php");


    $info = addslashes($_POST['info']);
    $info = explode("\n", $info);
    $loai = tmq_boc($_POST['loainick']);
    $sever = tmq_boc($_POST['server']);
    $giatien = tmq_boc($_POST['giatien']);
    $i = 0;
        foreach($info as $key){
            $cc = explode("|", $info[$i]);
            $check = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `taikhoan` = '".$cc[0]."' AND `matkhau` = '".$cc[1]."'");
            if($check->fetch()['id'] != null){
               echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Tài khoản '.$cc[0].' đã tồn tại trên hệ thống, vui lòng kiểm tra lại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
            }else{
            $db->exec("INSERT INTO `TMQ_baiviet` SET
            `uid` = '$uid',
            `taikhoan` = '".$cc[0]."',
            `matkhau` = '".$cc[1]."',
            `thongtin` = '$sever',
            `giatien` = '$giatien',
            `trangthai` = '0',
            `time` = '".date('H:i:s d-m-Y')."'");
            $i++;
             echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                       Tài khoản '.$cc[0].' đã được đăng thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
        } }
       