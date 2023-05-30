<?php require('../TMQ/function.php'); 
if($TMQ['admin'] == 0){
    header('Location: /admin');
    exit;
}require('head.php'); ?>


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
                                    <li><a href="#">Chuyên mục</a></li>
                                    <li class="active">Đăng bài viết</li>
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
                                        <input class="form-control" name="taikhoan" id="taikhoan">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-compass"></i></div>
                                        <input class="form-control" name="matkhau" id="matkhau">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="giatien" type="number" id="giatien">
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
                                                <option name="loainick" id="loainick" value="<?=$get['id'];?>"><?=$get['ten'];?></option>
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
                                        <textarea name="thongtin" id="thongtin" rows="9" placeholder="Bắt buộc" class="form-control"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Hình ảnh minh họa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-image"></i></div>
                                        <textarea name="img" id="img" rows="9" placeholder="Bắt buộc" class="form-control"></textarea>
                                  
                                </div>
                            
                        <button type="submit" class="btn btn-outline-success" name="themsanpham" id="themsanpham">Thêm</button>
                            </div>
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
    
    
    	<script type="text/javascript">
		CKEDITOR.replace( 'img', {
            height: 300,
            filebrowserUploadUrl: "ckeditor/ajaxfile.php?type=file",
            filebrowserImageUploadUrl: "ckeditor/ajaxfile.php?type=image"
        } );
	</script>
    
<?php require('end.php'); ?>





