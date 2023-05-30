<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php

    $soluong = trim(addslashes(htmlspecialchars(intval($_POST['soluong']))));
    $chietkhau = trim(addslashes(htmlspecialchars(intval($_POST['chietkhau']))));
    for($i = 0; $i <= $soluong;$i++){
   
 $db->exec("INSERT INTO `TMQ_giftcode` SET
 `uid` = '$uid',
 `name` = '".$TMQ['name']."',
 `gift` = '".taochuoi(6)."',
 `sotien` = '$chietkhau',
 
 `date` = '".date('h:s:i d-m-Y')."'");   
  echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                      Mã '.taochuoi(6).' đã được thêm thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

