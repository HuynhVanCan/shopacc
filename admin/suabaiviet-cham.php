<?php
require('../TMQ/function.php');
$id = intval($_GET['id']);
$info = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
if($info['uid'] != $uid){
    header('Location: /admin');
    exit;
}
if($info["img"] != null){
    header("Location: /admin");
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
                                    <li><a href="#">Chuyên mục</a></li>
                                    <li class="active">Sửa bài viết (chậm)</li>
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
<font color="red">Lưu Ý: nếu bạn chọn file ảnh khác, ảnh cũ sẽ bị xóa!</font>
                    <div class="col-xs-12 col-sm-12">
<?php
if(isset($_POST['edit'])){
    $taikhoan = tmq_boc($_POST['taikhoan']);
    $matkhau = tmq_boc($_POST['matkhau']);
    $giatien = tmq_boc(abs(intval($_POST['giatien'])));
    $loainick = tmq_boc($_POST['loainick']);
    $thongtin1 = tmq_boc($_POST['thongtin1']);
    $thongtin2 = tmq_boc($_POST['thongtin2']);
    $thongtin3 = tmq_boc($_POST['thongtin3']);
    $thongtin4 = tmq_boc($_POST['thongtin4']);
    $thongtin = tmq_boc($_POST['thongtin']);
    $countfiles = count($_FILES['files']['name']);
   //xóa ảnh
  // $db->exec("DELETE FROM `images` WHERE `id_acc` = '$id'");
    if(empty($taikhoan) || empty($matkhau) || empty($giatien) || empty($loainick) || empty($thongtin)){
        echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Vui lòng nhập đủ thông tin cần thiết.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                 
    }else{
        if($countfiles != 0){
            
             xoa_file("../upload/anhnick/$id");
             mkdir("../upload/anhnick/$id",0755);
			for($i=0;$i<$countfiles;$i++){
				// File name
			   $filename = $_FILES['files']['name'][$i];
               $name = explode(".",$filename);
               $name_file = $name[0].'-'.$id.'.'.$name[1];
               
			   	// Get extension
          		$ext = end(explode(".", $filename));

          		// Valid image extension
          		$valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG");

          		if(in_array($ext, $valid_ext)){
          			// Upload file
				   	if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../upload/anhnick/'.$id.'/'.$name_file)){
         //   $link_img = "https://$website/upload/anhnick/$name_file";
		//	$db->exec("INSERT INTO `images`(`name`, `image`, `id_acc`) VALUES ('$link_img','','$id')");
					}
					
          		}
			   	
			}
        }
	
	
	//thay đổi thông tin nick
	$db->exec("UPDATE `TMQ_baiviet` SET
    `uid` = '$uid',
    `taikhoan` = '$taikhoan',
    `matkhau` = '$matkhau',
    `loainick` = '$loainick',
    `giatien` = '$giatien',
    `thongtin_1` = '$thongtin1',
    `thongtin_2` = '$thongtin2', 
    `thongtin_3` = '$thongtin3',
    `thongtin_4` = '$thongtin4',
    `thongtin` = '$thongtin',
    `trangthai` = '1',
    `time` = '". date('H:i:s d-m-Y') ."'
    WHERE `id` = '$id'
    ");
			echo ' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                   Thêm tài khoản thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
		}
}


?>
                        <div class="card">
                            <div class="card-header">
                                <strong>Đăng bài viết</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class=" form-control-label">Tài khoản</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" name="taikhoan" id="taikhoan" value="<?=$info["taikhoan"];?>">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-compass"></i></div>
                                        <input class="form-control" name="matkhau" id="matkhau" value="<?=$info["matkhau"];?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="giatien" type="number" id="giatien" value="<?=$info["giatien"];?>">
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
                                        <textarea name="thongtin" id="thongtin" rows="9" placeholder="Bắt buộc" class="form-control"><?=$info["thongtin"];?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Hình ảnh minh họa</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-image"></i></div>
                                     <input type="file" name="files[]" id="files[]" multiple >
                                  
                                </div>
                            
                        <button type="submit" class="btn btn-outline-success" name="edit" id="edit">Sửa</button>
                        </form>
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
    
<?php require('end.php'); ?>