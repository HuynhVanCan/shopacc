<?php require('../TMQ/function.php');

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

    $matkhau = trim(addslashes(htmlspecialchars($_POST['password'])));
    $passmoi = trim(addslashes(htmlspecialchars($_POST['passmoi'])));
    $hinhthuc = tmq_boc($_POST["hinhthuc"]);
  if(empty($matkhau) && empty($passmoi)){
    if(!isset($uid)){
     echo'Vui lòng đăng nhập ngoài trang chủ trước.';  
    }else{
        $db->exec("UPDATE `TMQ_user` SET `hinhthuc_ad` = '$hinhthuc' WHERE `uid` = '$uid'");
        echo'Thành công.';
      
    }
  }else{
       if(!isset($uid)){
     echo'Vui lòng đăng nhập ngoài trang chủ trước.';   
    }elseif(md5($matkhau) != $TMQ['pass']){
        echo'Mật khẩu cũ không chính xác.';
    }elseif(md5($passmoi) == $TMQ['matkhau']){
        echo"Mật khẩu admin không được trùng với mật khẩu shop.";
    }elseif(md5($matkhau) == md5($passmoi)){
        echo'Mật khẩu mới không được trùng mật khẩu cũ.';
    }else{
        $_SESSION['pass2'] =  $passmoi;
        $db->exec("UPDATE `TMQ_user` SET `pass` = '".md5($passmoi)."',`hinhthuc_ad` = '$hinhthuc' WHERE `uid` = '$uid'");
        echo'Thành công.';
      
    }
  }
}

?></center>
                    <form method="POST">

                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                       <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" name="passmoi" class="form-control" placeholder="Password">
                        </div>
                         <div class="form-group">
                            <label>Hình thức đăng nhập</label>
                           <select class="form-control" name="hinhthuc">
                               <option value="1">Mật khẩu cấp 2</option>
                               <option value="2">Mã ODP</option>
                           </select>
                        </div>
                        <button name="login" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đổi ngay</button>
                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
