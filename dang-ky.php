<?php
  $avatar = "";
  
    # Import Hệ thống
    require('TMQ/function.php');
    if (@$uid){
        header('Location: /');
    }
    
    $headtitle = 'Đăng ký tài khoản mới';
    require('TMQ/head.php');
    ?>
    <?php
    $error = "";
if(isset($_POST['dangky'])){
 
  $name = tmq_boc($_POST['name']);
  $username = tmq_boc($_POST['username']);
  $email = tmq_boc($_POST['email']);
  $password = tmq_boc($_POST['password']);
  $password2 = tmq_boc($_POST['password_confirmation']);
  
  $check_user = $db->query("SELECT COUNT(*) FROM `TMQ_user` WHERE `uid` = '$username' LIMIT 1")->fetchColumn();
  $check_mail = $db->query("SELECT COUNT(*) FROM `TMQ_user` WHERE `email` = '$email' LIMIT 1")->fetchColumn();

if(empty($name) || empty($username) || empty($email) || empty($password) || empty($password2)){
    $error = 'Vui lòng nhập đủ thông tin.';
}elseif($password != $password2){
    $error = 'Password nhập lại chưa trùng nhau.';   
}elseif($check_user != 0 || $check_mail != 0){
    $error = 'Tài khoản hoặc email đã tồn tại trên hệ thống';
}else{
        //thêm vào data
        $db->exec("INSERT INTO TMQ_user (uid,name,email,matkhau,admin,cash,date,avatar) VALUES ('".$username."','".$name."','".$email."','".md5($password)."','0','0','".date('d-m-Y')."','".$avatar."')");
        $error = 'Đăng ký thành công !';
}
    
}




?>

<div class="c-layout-page">
	<!-- BEGIN: PAGE CONTENT -->
	    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Đăng ký thành viên</p>

                <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong><?php echo $error;?></strong>
                </span>

            <form action="" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" minlength="6" value="" placeholder="Tên hiển thị" required>

                </div>
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" minlength="6"  value="" placeholder="Tài khoản" required>

                </div>

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" minlength="6" value="" placeholder="Email" required>
                </div>


                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" minlength="6" placeholder="Mật khẩu" required>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Xác nhận mật khẩu" required>
                </div>


                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" name="dangky"  class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng ký</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
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