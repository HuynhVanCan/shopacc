<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
 

    session_start();
    session_unset();
 
    if (isset($_SESSION['uid'])){
        unset($_SESSION['uid']);
    }
    header("Location: /index.php"); 
?>