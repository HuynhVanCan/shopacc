<?php require('../TMQ/function.php');
if($TMQ['admin'] != 9 && $TMQ['admin'] != 1){
    header('Location: /index.php');
}
if(!empty($_SESSION['pass2'])){
    header('Location: /admin');
}
if($TMQ["hinhthuc_ad"] != 1){
    header('Location: odp.php');
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

if(isset($_POST['login'])){

$matkhau = tmq_boc($_POST['password']);


    if(!isset($uid)){
     echo'Vui lòng đăng nhập ngoài trang chủ trước.';   
    }elseif(md5($matkhau) != $TMQ['pass']){
        echo'Mật khẩu không chính xác.';
    }else{
        $_SESSION['pass2'] =  $matkhau;
     echo'<meta http-equiv="refresh" content="3;url=/admin">
        <script type="text/javascript">
            window.location.href = "/admin"
        </script>';
    }
    
}



?></center>
                    <form method="POST">

                        <div class="form-group">
                            <label>Vui lòng nhập mật khẩu cấp 2</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                      
                        <button name="login" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
