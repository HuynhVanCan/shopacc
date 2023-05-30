<?php require('../TMQ/function.php'); ?>
<?php
if(empty($uid)){
header('Location: /login');
}    
?>
<?php require('../TMQ/head.php'); ?>
<style>
    
    .badge-danger {
    color: #fff;
    background-color: #dc3545;
}
.badge {
display: inline-block;
    padding: .25em .4em;
    font-size: 90%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="c-layout-page">
    
                <div class="container">
    <div class="col-md-12">
        <?php 
if(isset($_POST['btn-confirm'])  && $_SESSION["token"]==$_POST["_token"]){
$bank = intval($_POST['bank_account_id']);
$amount = intval(abs($_POST['amount']));
$noidung = trim(addslashes(htmlspecialchars($_POST['description'])));
$captcha = trim(addslashes(htmlspecialchars($_POST['captcha'])));

$saugd = $TMQ['cash'] - $amount;


$get = $db->query("SELECT * FROM `TMQ_bank` WHERE `uid` = '$uid' AND `id` = '$bank'")->fetch();
if($_POST['captcha'] != $_SESSION['security_code']){
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    Captcha không chính xác.Vui lòng kiểm tra lại
                </div>
            </div>';
}elseif($amount < 100000){
    	echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Số tiền tối thiểu là 100.000<sup>đ</sup>
                </div>
            </div>';
}elseif($TMQ['cash'] < $amount){
    	echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Số tiền của bạn không đủ để thực hiện giao dịch này
                </div>
            </div>';
}else{            

$db->exec("INSERT INTO `TMQ_ruttien` SET
    `uid` = '$uid',
    `bank` = '$bank',
    `ctk` = '". $get['ctk'] ."',
    `stk` = '".$get['stk']."',
    `chinhanh` = '". $get['chinhanh'] ."',
    `amount` = '$amount',
    `noidung` = '$noidung',
    `trangthai` = 'Chờ GD',
    `time` = '". date("H:i:s d-m-Y") ."'
    ");
 
 $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Thực hiện lệnh rút với số tiền ".number_format($amount)." <sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - $amount WHERE `uid` = '". $uid ."'");
    
     echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Đặt lệnh rút tiền thành công.</div>
            </div>';
}

}
$salt = "Iui8*&@IJsad".date("Y-m-d H:i:s");
$token = md5($salt.TaoChuoiRandom(20)); // nhớ viết hàm random riêng
$_SESSION["token"] = $token;



if(isset($_GET['huy'])){
    $id = intval($_GET['huy']);
    $get = $db->query("SELECT * FROM `TMQ_ruttien` WHERE `id` = '$id'")->fetch();
    $saugd = $TMQ['cash'] + $get['amount'];
    if($get['uid'] != $uid){
        echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                ID này không thuộc về bạn.</div>
            </div>';
    }elseif($get['trangthai'] != 'Chờ GD'){
        echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                Đơn này đã được duyệt.</div>
            </div>';
    }elseif($get['id'] == null){
        echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                ID không tồn tại</div>
            </div>';
    }else{
        
    $db->exec("DELETE FROM `TMQ_ruttien` WHERE `id` = '$id'");
    
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '". $get['amount'] ."' where `uid` = '".$get['uid']."'");
    
     $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Hủy lệnh rút với số tiền ".number_format($get['amount'])." <sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                Hủy rút tiền thành công.</div>
            </div>';
    }
    
}
?>
        
        
</div></div>
<?php require('head.php'); ?>

<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Rút tiền</h3>
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
                
               <form class="form-horizontal" method="POST">
                    <input type="hidden" name="_token" value="<?=$token;?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ngân hàng:</label>
                        <div class="col-md-6">
                            <div class="input-group c-square">
                                <select class="form-control  c-square c-theme" name="bank_account_id" id="bank_account_id">
                                    <option value="">Chọn tài khoản ngân hàng nhận tiền</option>
<?php $get = $db->query("SELECT * FROM `TMQ_bank` WHERE `uid` = '$uid'");
                foreach($get as $bank){     
                ?>
    <option value="<?=$bank['id'];?>"><?=$bank['stk'];?> - <?=$bank['bank'];?></option>
                                <?PHP } ?>                                                                            </select>
                                <span class="input-group-btn">
                                <button class="btn btn-success c-font-dark load-modal" rel="/profile/bank/add">Thêm mới</button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="block-load-info">

                    </div>
                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" id="btn-confirm" name="btn-confirm" disabled class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Thực hiện</button>
                        </div>
                    </div>
                </form>
                <div class="" style="margin: 35px 0px;border: 1px solid #cccccc;padding: 15px">
                    
                </div>



                <table id="charge_recent" class="table table-striped table-custom-res">

                    <tbody>
                    <tr>
                        <th>Thời gian</th>
                        <th>ID</th>
                        <th>Chủ tài khoản</th>
                        <th>Số tài khoản/Tài khoản ví</th>
                        <th>Ngân hàng/Ví</th>
                        <th>Số tiền</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </tbody>
<tbody>  
<?php 
$dulieu = $db->query("SELECT * FROM `TMQ_ruttien` WHERE `uid` = '$uid' ");
foreach($dulieu as $dl){
?><tr>
                    <td><?=$dl['time'];?></td>
                    <td><?=$dl['id'];?></td>
                    <td><?=$dl['ctk'];?></td>
                    <td><?=$dl['stk'];?></td>
                    <td><?=$string_bank[$dl['bank']];?></td>
                    <td><?=number_format($dl['amount']);?><sup>đ</sup></td>
                    <td><?=$dl['noidung'];?></td>
                    <td><?=$dl['trangthai'];?></td>
                    <td><a href="?huy=<?=$dl['id'];?>" class="badge badge-danger">Hủy</a></td>
                   
         </tr>               
                                        
<?php } ?></tbody>
                </table>

                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    
                </div>
            </div>
        </div>
    </div>
    
  <script>
        $(document).ready(function () {
 

            $('#bank_account_id').on('change', function (e) {

                var bank_account_id = this.value;
                if (bank_account_id != "") {
                    $.get('/withdraw-load-info?id=' + bank_account_id,

                        function (data) {

                            $('.block-load-info').html(data);
                            $('#btn-confirm').prop("disabled", false); // Element(s) are now enabled.

                        })
                        .done(function () {
                        })
                        .fail(function () {
                            alert('Không tìm thấy thông tin tài khoản đã lưu');
                        })
                }
                else {
                    $('.block-load-info').html("");
                    $('#btn-confirm').prop("disabled", true); // Element(s) are now enabled.
                }

            });


            //delete button
            $('.delete_toggle').each(function (index, elem) {
                $(elem).click(function (e) {

                    e.preventDefault();
                    $('#deleteModal .id').attr('value', $(elem).attr('rel'));
                    $('#deleteModal').modal('toggle');
                });
            });


        });


    </script>
<?php require('../TMQ/end.php'); ?>