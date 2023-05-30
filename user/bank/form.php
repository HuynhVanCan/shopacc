<?php

require('../../TMQ/function.php');
$id = intval($_GET['id']);

$get = $db->query("SELECT * FROM `TMQ_bank` WHERE `uid` = '$uid' AND `id` = '$id'")->fetch();

if($get['bank_type'] == 0){ 
?>

 <div id="info_bank_area" style="">

        <div class="form-group">
            <label class="col-md-3 control-label">Ngân hàng:</label>
            <div class="col-md-6">
                <p id="bank" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['bank'];?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Chủ tài khoản:</label>
            <div class="col-md-6">
                <p id="ttk" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['ctk'];?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Số tài khoản:</label>
            <div class="col-md-6">
                <p id="stk" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['stk'];?></p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Chi nhánh:</label>
            <div class="col-md-6">
                <p id="brand" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['chinhanh'];?></p>
            </div>
        </div>


    </div>



<div class="form-group">
    <label class="col-md-3 control-label">Số tiền cần rút:</label>
    <div class="col-md-6">
        <input id="money" class="form-control c-square c-theme" name="amount" type="text" placeholder="" autofocus required="">
        <span class="help-block">Số tiền rút từ 100,000đ đến 10,000,000đ</span>

                    <span class="help-block">Phí rút tiền: 0đ (Không trừ vào số tiền rút)</span>
        

    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Nội dung rút tiền:</label>
    <div class="col-md-6">
        <input class="form-control c-square c-theme" name="description" type="text" placeholder="Nhập nội dung rút tiền nếu cần thiết">
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon" style="padding: 0px;">
                <img src="https://demo2.tmquang.xyz/tmq.php" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://demo2.tmquang.xyz/tmq.php?'+Math.random();document.getElementById('captcha').focus();">
            </span>
            <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="5" autocomplete="off" required="">
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function () {

        $('.price').mask('000,000,000,000,000', {reverse: true});
        $('.price').focus();
    });

</script>
<?php }elseif($get['bank_type'] == 1){ ?>

 <div class="form-group">
        <label class="col-md-3 control-label">Ví điện tử:</label>
        <div class="col-md-6">
            <p id="bank" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['bank'];?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Tài khoản ví:</label>
        <div class="col-md-6">
            <p id="stk" class="form-control c-square c-theme c-theme-static m-b-0"><?=$get['stk'];?></p>
        </div>
    </div>





<div class="form-group">
    <label class="col-md-3 control-label">Số tiền cần rút:</label>
    <div class="col-md-6">
        <input id="money" class="form-control c-square c-theme" name="amount" type="text" placeholder="" autofocus required="">
        <span class="help-block">Số tiền rút từ 100,000đ đến 10,000,000đ</span>

                    <span class="help-block">Phí rút tiền: 0đ (Không trừ vào số tiền rút)</span>
        

    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Nội dung rút tiền:</label>
    <div class="col-md-6">
        <input class="form-control c-square c-theme" name="description" type="text" placeholder="Nhập nội dung rút tiền nếu cần thiết">
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon" style="padding: 0px;">
                <img src="https://demo2.tmquang.xyz/tmq.php" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://demo2.tmquang.xyz/tmq.php?'+Math.random();document.getElementById('captcha').focus();">
            </span>
            <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="5" autocomplete="off" required="">
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function () {

        $('.price').mask('000,000,000,000,000', {reverse: true});
        $('.price').focus();
    });

</script>
<?php } ?>