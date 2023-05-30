<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
    $id = intval($_POST['id']);
    $name = trim(addslashes(htmlspecialchars($_POST['name'])));
    $img = trim(addslashes(htmlspecialchars($_POST['img'])));
    $thongbao = tmq_boc($_POST['thongbao']);
    if(empty($name) || empty($img)){
         echo' <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                     Vui lòng nhập đủ thông tin
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
 $db->exec("UPDATE `TMQ_chuyenmuc` SET
 `ten` = '$name',
 `img` = '$img',
 `trangthai` = 'on',
 `thongbao` = '$thongbao',
 `date` = '".date('Y-m-d')."'
 WHERE `id` = '" . $id . "' ");   
  echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                      Chuyên mục '.$name.' đã sửa thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

