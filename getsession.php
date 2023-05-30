<?php 
include 'TMQ/function.php';
if(isset($_GET['uid']) && isset($_GET['name']) && isset($_GET['email'])){
    $fb_ID = $_GET['uid'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $_SESSION['uid'] = $fb_ID;
$check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$fb_ID'");
$check_number = $check->rowcount();

if($check_number == 0){
//Lưu tài khoản vào Database rồi đăng nhập
$db->exec("INSERT INTO TMQ_user SET uid = '$fb_ID',name = '".addslashes($name)."',email = '$email',cash = '0',admin = '0',ban ='0',date = '".date("d-m-Y")."'  ");

//Tiến hành đăng nhập khi đã lưu data
    }else{
        $db->exec("UPDATE TMQ_user SET name = '".addslashes($name)."',email = '$email' WHERE `uid` = '$fb_ID'");
    }
    header("Location: /index.php");
}
?>