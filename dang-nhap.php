<?php
    # Import Hệ thống
  
    require('TMQ/function.php');
    if (!empty($uid)){
        header('Location: /');
    }
    $headtitle = 'Đăng nhập vào hệ thống';
    require('TMQ/head.php');
$error = "";
if($_POST){
  if(!empty($_POST['username']) && !empty($_POST['password'])){  

  $username = tmq_boc($_POST['username']);
  $password = tmq_boc($_POST['password']);
  
  if(strlen($password) > 5 && strlen($username)){
    $password = md5($password);
    if($db->query("SELECT COUNT(*) FROM `TMQ_user` WHERE `uid` = '$username' AND `matkhau` = '$password' LIMIT 1")->fetchColumn() != 0){
        $_SESSION['uid'] = $username;
        echo'<meta http-equiv="refresh" content="3;url=/">
        <script type="text/javascript">
            window.location.href = "/"
        </script>';
    }else{
        $error = "Thông tin đăng nhập không chính xác !";}
  }else{
    $error = 'Dữ liệu không hợp lệ !';}
}else{
    $error = 'Vui lòng nhập đầy đủ thông tin !';}
}else{
    $error = '';
}

?>

<div class="c-layout-page">
	<!-- BEGIN: PAGE CONTENT -->
	    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập vào hệ thống</p>

                <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong><?php echo $error;?></strong>
                </span>

            <form action="" method="POST">
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" minlength="6"  value="" placeholder="Tài khoản" required>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" minlength="6" placeholder="Mật khẩu" required>
                </div>

 <div class="row">
                    <div class="col-xs-6">
                        <div class="checkbox icheck">
                            <label style="color: #666">
                               
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6" style="text-align: right">
                        <a href="/quen-mat-khau.php" style="color: #666;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Quên mật khẩu?</a><br>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng nhập</button>
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