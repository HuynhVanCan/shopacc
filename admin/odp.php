<?php require('../TMQ/function.php');
if($TMQ['admin'] != 9 && $TMQ['admin'] != 1){
    header('Location: /');
}
if(!empty($_SESSION['pass2'])){
    header('Location: /admin');
}
if($TMQ["hinhthuc_ad"] != 2){
    header('Location: login.php');
}
  $email = $TMQ["email"];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  //check thời gian gửi mã
   $date = date("Y-m-d");
   $kiemtra = $db->query("SELECT * FROM `TMQ_key` WHERE `email` = '".$TMQ['email']."' AND `time` = '$date'")->fetch();
 //	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
//	$expDate = date("Y-m-d",$expFormat);
	$key = rand(1000,9999);
	if($kiemtra == null){
//lưu key vào sql
$db->exec("INSERT INTO `TMQ_key` SET
`email` = '".$TMQ['email']."',
`key` = '$key',
`time` = '$date',
`loai` = 'login_admin'");

$output='<p>Chào bạn,</p>';
$output.='<p>Mã kích hoạt của bạn là  '.$key.'.</p>';
$output.='Thời gian sử dụng mã là 1 ngày. Vui lòng không chia sẻ mã này cho ai để bảo mật tài khoản';
$output.='<p>Thanks,</p>';
$output.='<p>TMQ</p>';
$body = $output; 
$subject = "ODP dang nhap admin - $website";
sendmail($email,$subject,$body);
}
?>
<link rel="shortcut icon" href="/admin/images/favicon.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
   <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/admin">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                <center>    
                <?php 

if(isset($_POST['ok'])){

    $code = tmq_boc($_POST['code']);

    $result = $db->query("SELECT * FROM `TMQ_key` WHERE `key` = '$code' AND `email` = '".$TMQ['email']."'")->fetch();
    
    $date_now = date("Y-m-d");
    if($result['key'] == null){
        echo "Mã không tồn tại";
    }elseif($result['time'] < $date_now){
        echo "Mã đã hết hạn, vui lòng kiểm tra lại";
    }else{
        $_SESSION['pass2'] =  $code;
        echo "Thành công";
         echo'<meta http-equiv="refresh" content="3;url=/admin">
        <script type="text/javascript">
            window.location.href = "/admin"
        </script>';
    }

    
}

?></center>
                    <form method="POST">

                        <div class="form-group">
                            <label>Vui lòng nhập mã ODP ngày <?=date("d-m-Y");?></label>
                            <input type="text" name="code" class="form-control" placeholder="Mã kích hoạt">
                        </div>
                      
                        <button name="ok" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
