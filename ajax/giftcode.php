<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
# Hàm get ID
if(isset($_POST['giftcode'])){$giftcode = addslashes($_POST['giftcode']);} else {$giftcode = NULL;}
if(isset($_GET['id'])){$id = (int)addslashes($_GET['id']);} else{ die('Lỗi hệ thống');}
    # mấy cái biến vớ vẫn blablabla
   
if($giftcode != null){
    
 $query = $db->query("SELECT * FROM `TMQ_giftcode` WHERE `gift` = '$giftcode' and `sd` ='0'");
 $query2 = $db->query("SELECT * FROM `TMQ_giftcode` WHERE `gift` = '$giftcode'");
 
    if($query->fetch() == NULL){
    $arr =  'Giftcode sai hoặc đã được sử dụng';    
    }else{
     // 
     $get_mgg = $query2->fetch();
     $get_gia = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
     $giamoi = $get_gia['giatien']*(100-$get_mgg['sotien'])/100;
    $arr =  'Dùng mã thành công. Giá mới '.number_format($giamoi).' VNĐ';    
    }
    echo $arr;
}

   
    

?>