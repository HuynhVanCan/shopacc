<?php
    # Import Hệ thống
  
    require('TMQ/function.php');
    if (!empty($uid)){
        header('Location: /');
    }
    $headtitle = 'Lấy lại mật khẩu';
    require('TMQ/head.php');
?>

<div class="c-layout-page">
	<!-- BEGIN: PAGE CONTENT -->
	    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập vào hệ thống</p>

                <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong>
                           
<?php
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");

$check = $db->query("SELECT * FROM `TMQ_key` WHERE `key` = '$key'")->fetch();
if($check['key'] == null){
    echo "Liên kết không tồn tại.";
}elseif($check['time'] >= $curDate){


?>


 </strong>
                </span>

            	<form method="post" action="" name="update">
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="email" value="<?php echo $email;?>"/>            
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="pass" value="" placeholder="Nhập mật khẩu" required>
                </div>
                
                 <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="re-pass" value="" placeholder="Nhập lại mật khẩu" required>
                </div>

             

 <div class="row">
                    <div class="col-xs-6">
                        <div class="checkbox icheck">
                            <label style="color: #666">
                               
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                  
                    <!-- /.col -->
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" id="reset" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Cập nhật mật khẩu</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
<?php }else{ ?>
Lỗi!
<?php } }

if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){

$pass = tmq_boc($_POST["pass"]);
$re_pass = tmq_boc($_POST["re-pass"]);
$email = tmq_boc($_POST['email']);

if(empty($pass) || empty($re_pass)){
    echo "Vui lòng nhập đủ dữ liệu.";
}elseif($pass != $re_pass){
    echo "2 mật khẩu không trùng nhau.";
}else{
    $db->exec("UPDATE `TMQ_user` SET `matkhau` = '".md5($pass)."' WHERE `email` = '".$email."' ");
    $db->exec("DELETE FROM `TMQ_key` WHERE `email` = '".$email."' ");
    echo "Cập nhật mật khẩu thành công, vui lòng đăng nhập.";
} }?>
    </div>
    <!-- /.login-box -->

    <style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            border: 1px solid #cccccc;
            padding: 20px;;
        }

        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;;
        }
    </style>
			<!-- END: PAGE CONTENT -->
</div>
<?php
    require('TMQ/end.php');

?>