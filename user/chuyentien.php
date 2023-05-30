<?php require('../TMQ/function.php'); ?>
<?php
if(empty($uid)){
header('Location: /login');
}    
?>
<?php require('../TMQ/head.php'); ?>
<div class="c-layout-page">
    
                <div class="container">
    <div class="col-md-12">
<?php

if(isset($_POST['chuyentien']) && $_SESSION["token"]==$_POST["_token"]){
$username = trim(addslashes(htmlspecialchars($_POST['username'])));
$amount = trim(addslashes(htmlspecialchars($_POST['amount'])));
$noidung =trim(addslashes(htmlspecialchars($_POST['noidung'])));
$phigd = $amount*0.01;
$tong = $amount + $phigd;
$saugd = $TMQ['cash'] - $tong;
$check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$username'");
$nguoinhan = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$username'")->fetch();
$saugd_nhan = $nguoinhan['cash'] + $amount;
if($check->fetch()['uid'] == null){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Tài khoản không tồn tại.</div>
            </div>';
    
}elseif ($amount < 20000){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Số tiền tối thiểu là 20k.</div>
            </div>';
}elseif ($username == $uid){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
               Bạn không thể chuyển cho chính mình.</div>
            </div>';            
}elseif($TMQ['cash'] < $tong){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    Bạn không đủ số dư để chuyển tiền.Vui lòng kiểm tra lại
                </div>
            </div>';

}elseif($_POST['captcha'] != $_SESSION['security_code']){
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    Captcha không chính xác.Vui lòng kiểm tra lại
                </div>
            </div>';
}else{
    //biến đổi số dư người chuyển
  $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Chuyển tiền cho #$username, số tiền ".number_format($amount)." <sup>đ</sup>, phí GD $phigd<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    //biến đổi số dư người nhận
    $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$username',
    `noidung` = 'Nhận tiền từ #$username, số tiền ".number_format($amount)." <sup>đ</sup>',
    `truocgd` = '".$nguoinhan['cash']."',
    `saugd` = '$saugd_nhan',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    //trừ tiền người chuyển
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - $tong where `uid` = '$uid'");
    //cộng tiền người nhận
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + $amount where `uid` = '$username'");
    //lưu dữ liệu
    $db->exec("INSERT INTO `TMQ_chuyentien` SET
    `uid_chuyen` = '$uid',
    `uid_nhan` = '$username',
    `sotien` = '$amount',
    `noidung` = '$noidung',
    `time` = '". date('H:i:s d-m-Y') ."'");
    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Thành công, đã chuyển '.number_format($amount).' cho #'.$username.', phí '.$phigd.' <sup>đ</sup> </div>
            </div>';

    
    
    
}
    
    
    
}
$salt = "Iui8*&@IJsad".date("Y-m-d H:i:s");
$token = md5($salt.TaoChuoiRandom(20)); // nhớ viết hàm random riêng
$_SESSION["token"] = $token;
?>
</div></div>
<?php require('head.php'); ?>

<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Chuyển tiền</h3>
					<div class="c-line-left"></div>
				</div>
				

 <div class="text-center">
                    <center>

                        <h2 class="c-font-bold c-font-28">UID: <?=$uid?></h2>
                        <h2 class="c-font-22">Thành viên</h2>
                        <h2 class="c-font-22"></h2>
                        <h2 class="c-font-22 c-font-red"><?=number_format($TMQ['cash']);?>đ</h2>
                    </center>

                </div>
                
                <form class="form-horizontal"  method="POST">

                    <input type="hidden" name="_token" value="<?php echo $token ?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tài khoản/ID người nhận:</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme" name="username" type="text" placeholder="Tài khoản người nhận" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Số tiền:</label>
                        <div class="col-md-6">
                           <input class="form-control c-square c-theme " type="text" id="amount" name="amount"value="" onkeyup="show_result()"/>
                        </div>
                    </div>
                  <script language="javascript">
      // Hàm show kết quả
      function show_result()
      {
        // Lấy hai thẻ HTML
       	var input = document.getElementById("amount");
        var div = document.getElementById("demo");
        
        // Gán nội dung ô input vào thẻ div
        div.innerHTML = input.value*0.01;
      }
    </script>
    
   
        <div class="form-group">
            <label class="col-md-3 control-label">Phí giao dịch:</label>
            <div class="col-md-6">
                <p class="form-control c-square c-theme price" id="demo"></p>
            </div>
        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nội dung chuyển tiền:</label>
                        <div class="col-md-6">
                            <input class="form-control c-square c-theme" name="noidung" type="text" placeholder="Nhập nội dung chuyển khoản nếu cần thiết">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px;">
                                        <img src="/captcha.php" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://demo2.tmquang.xyz/tmq.php?'+Math.random();document.getElementById('captcha').focus();">
                                    </span>
                                <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="5" autocomplete="off" required="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                            <button name="chuyentien"  class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block btn-confirm">Thực hiện</button>
                        </div>
                    </div>
                </form>

  <table id="charge_recent" class="table table-striped table-custom-res">

                    <tbody><tr>
                        <th>Thời gian</th>
                        <th>Giao dịch</th>
                        <th>Tài khoản/ID người nhận</th>
                        <th>Số tiền</th>
                        <th>Nội dung</th>
                       
                    </tr>
                    </tbody><tbody>  
<?php 
$dulieu = $db->query("SELECT * FROM `TMQ_chuyentien` WHERE `uid_chuyen` = '$uid' ");
foreach($dulieu as $dl){
?><tr>
                    <td><?=$dl['time'];?></td>
                    <td><?=$dl['id'];?></td>
                    <td><?=$dl['uid_nhan'];?></td>
                    <td><?=number_format($dl['sotien']);?><sup>đ</sup></td>
                    <td><?=$dl['noidung'];?></td>
                   
                 </tr>       
                                        
<?php } ?></tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php require('../TMQ/end.php'); ?>