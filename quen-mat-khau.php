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
            <p class="login-box-msg">Quên mật khẩu</p>

                <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong>
 <?php if(isset($_POST['quenpass'])){
 

$email = tmq_boc($_POST["email"]);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);

$check = $db->query("SELECT * FROM `TMQ_user` WHERE `email` = '$email'");
if($check->fetch()['id'] == null){
    echo  "Email không tồn tại trên hệ thống";
}elseif(empty($email)){
    echo  "Không được để trống";
}else{
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5(2418*2+$email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
//lưu key vào sql
$db->exec("INSERT INTO `TMQ_key` SET
`email` = '$email',
`key` = '$key',
`time` = '$expDate'");

$output='<p>Chào bạn,</p>';
$output.='<p>Để lấy lại mật khẩu, vui lòng nhấp vào liên kết sau.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://'.$website.'/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://'.$website.'/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Hãy chắc chắn sao chép toàn bộ liên kết vào trình duyệt của bạn.
Liên kết sẽ hết hạn sau 1 ngày vì lý do bảo mật.</p>';
$output.='<p>Nếu bạn không yêu cầu email quên mật khẩu này, không có hành động
là cần thiết, mật khẩu của bạn sẽ không được thiết lập lại. Tuy nhiên, bạn có thể muốn đăng nhập vào
tài khoản của bạn và thay đổi mật khẩu bảo mật của bạn như ai đó có thể đã đoán được.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>TMQ</p>';
$body = $output; 
$subject = "Quen mat khau - $website";

$email_to = $email;

sendmail($email_to,$subject,$body);
 
}
}?></strong>
                </span>

            <form action="" method="POST">
                
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" value="" placeholder="Nhập email của bạn vào đây" required>
                </div>

            
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" name="quenpass" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
             <div class="social-auth-links text-center">
                <p style="margin-top: 5px">- HOẶC -</p>
                
                    
                    
                <a href="/login" class="btn  btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
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