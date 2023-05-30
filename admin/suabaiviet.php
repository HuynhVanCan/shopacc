<?php
require('../TMQ/function.php');
$id = intval($_GET['id']);
$info = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
if($info['uid'] != $uid){
    header('Location: /admin');
    exit;
}
require('head.php'); 

?>
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="">Bài viết</li>
                                    <li class="active">Sửa bài viết</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <div class="content">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                        <p id="result"></p>
                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Đăng bài viết</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Tài khoản</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="hidden" name="id" id="id" value="<?=$id;?>">
                                        <input class="form-control" name="taikhoan" id="taikhoan" value="<?=$info['taikhoan'];?>">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-compass"></i></div>
                                        <input class="form-control" name="matkhau" id="matkhau" value="<?=$info['matkhau'];?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="giatien" type="number" id="giatien" value="<?=$info['giatien'];?>">
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                         <label class=" form-control-label">Loại nick</label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        
                                            <select name="loainick" id="loainick" class="form-control">
                                    <option value="">Chọn Loại Nick</option>            
                                                <?php $get_cm = $db->query("SELECT * FROM `TMQ_chuyenmuc`"); ?>
                                                <?php foreach($get_cm as $get){ ?>
                                              
                                                <option <?php //if ($info['loainick'] == $get['id']) {echo' selected';} ?> value="<?php echo $get['id']; ?>"><?=$get['ten'];?></option>
                                              <?php } ?>
                                            </select>
                                        
                                    </div>
                                    </div>
                                    <div class="block-load-info">
                    </div>
									 <div class="form-group">
                                    <label class=" form-control-label">Thông tin</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <textarea name="thongtin" id="thongtin" rows="9" placeholder="Bắt buộc" class="form-control"><?=$info['thongtin'];?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Hình ảnh minh họa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                       <textarea name="img" id="img" rows="9" placeholder="Mỗi link ảnh để trên 1 dòng" class="form-control"><?$info['img'];?></textarea>
                                    </div>
                                  
                                </div>
                            
                        <button type="submit" class="btn btn-outline-success" name="suasanpham" id="suasanpham">Sửa</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>

     <script>
        $(document).ready(function () {
 

            $('#loainick').on('change', function (e) {

                var loainick = this.value;
                if (loainick != "") {
                    $.get('assets/dulieu.php?id=' + loainick,

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

<?php
require('end.php');
?>