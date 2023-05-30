<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('TMQ/function.php'); ?>
<?php 
$id = isset($_GET['id']) ? (int)$_GET['id'] : NULL  ;
$dulieu = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
$cm = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '". $dulieu['loainick'] ."'")->fetch();
$thumb = explode(PHP_EOL,$dulieu['img']);
?>
<script>
    function giftcode_check(){

         
                $.ajax({
                    url : "/ajax/giftcode.php?id=<?=$id?>",
                    type : "post",
                    dataType:"text",
                    data : {
              
                        giftcode : $('#giftcode').val()
                    },
                    success : function (result){
                        $('#tra_ve').html('<div style="text-align:center;" id="tra_ve" class="text-danger">'+result+'.</div>');
                        
                    }
                });
            }
 function mua(id){

         
                $.ajax({
                    url : "/ajax/buy.php?id=<?=$id?>",
                    type : "post",
                    dataType:"text",
                    data : {
              
                        giftcode : $('#giftcode').val(),
                        code : $('#code').val()
                    },
                    success : function (result){
                         $('#result').html('<b id="result" class="text-danger">'+result+'.</b> ');
                        
                    }
                });
            }
$("#send_odp").on("click", function(){
 $('#result').html("Vui lòng chờ");
		 $.ajax({
                    url : "/ajax/send_odp.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        email : $('#email').val() //Đọc tài khoản
                
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Xác nhận mua tài khoản</h4>
</div>

<div class="modal-body">
    <div class="c-content-tab-4 c-opt-3" role="tabpanel">
        <ul class="nav nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a>
            </li>
            <li role="presentation">
                <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="payment">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <table class="table table-striped">
                            <tbody><tr>
                                <th colspan="2">Thông tin tài khoản #<?=$id;?></th>
                            </tr>
                            </tbody><tbody>
                            
                            <tr>
                                <td>Tên game:</td>
                                <th><?=$cm['ten'];?></th>
                            </tr>
                            <tr>
                                <td>Giá tiền:</td>
                                <th class="text-info"><?=number_format($dulieu['giatien']);?>đ</th>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="info">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th colspan="2">Chi tiết tài khoản #<?=$id;?></th>
                            </tr>

                  
                                                                    <tr>
                                        
                                                                        <td style="width:50%">Thông tin:</td>
                                                        <td class="text-danger" style="font-weight: 700"><?=$dulieu['thongtin'];?></td>
                                                                                                                                                                  </tr>



                                                                                        </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
    <div id="tra_ve"></div>
    <form method="POST">
    <div class="form-group ">
        <label class="col-md-3 form-control-label">Mã giảm giá:</label>
        <div class="col-md-6">
             <div class="input-group">
            <input type="text" class="form-control c-square c-theme " name="giftcode" id="giftcode" placeholder="Mã giảm giá" value=""> 
              <span class="input-group-addon" style="padding: 0px;">
            <button type="button" class="btn btn-primary" onclick="giftcode_check();">Kiểm Tra</button>
            </div>
        </div>
            </div>
             <span class="help-block">Nhập mã giảm giá nếu có để nhận ưu đãi</span>
         <?php if(caidat("odp_muanick") == 1){ ?>
            <div class="form-group">
                      <label class="col-md-3 form-control-label">ODP :</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                   <input type="hidden" name="email" id="email" value="<?=$TMQ['email'];?>">
                                <input type="text" class="form-control c-square" id="code" name="code" placeholder="" maxlength="4" autocomplete="off" required="">
                                 <span class="input-group-addon" style="padding: 0px;">
                                     

    <button name="send_odp" id="send_odp" type="button" class="btn btn-primary" >Gửi ODP</button>
                                    </span>
                            </div>
                        </div>
                    </div>
        <?php } ?>



    
                        

    <div class="form-group ">
                                    <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
                  <div id="result"></div>
                </label>

                    
    </div>

    <div style="clear: both"></div>
</div>
<div class="modal-footer">
	<a onClick="mua(<?=$id;?>);">

    <button type="button" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" >Mua</button></a>
                       </form>
            <a class="btn c-bg-green-4 c-font-white c-btn-square c-btn-uppercase c-btn-bold load-modal" data-dismiss="modal" rel="/atm" data-dismiss="modal">Nạp từ ATM - Ví điện tử</a>
            
    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

</div>
</form>

<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"TMQ_giaodien/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>