<?php 
require('../TMQ/function.php');
require('../TMQ/head.php');
?>
<script src="https://ckeditor.com/latest/ckeditor.js"></script>
<link href="style.css" rel="stylesheet">

<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				
					<h2>Đăng bài</h2>
				
				</div> 
			</div>
			
			<div class="container">
			<div class="row animate-box">
<?php if(isset($_POST['submit'])){
    $title = trim(addslashes(htmlspecialchars($_POST['title'])));
    $noidung = trim(addslashes(htmlspecialchars($_POST['noidung'])));
    $img = trim(addslashes(htmlspecialchars($_POST['img'])));
    $db->exec("INSERT INTO `TMQ_tintuc`(`title`, `noidung`,`img`, `date`,`name`) VALUES ('$title','$noidung','$img','".date('d-m-Y')."','".$TMQ['name']."')");
    echo '<script>alert("Đăng bài thành công");</script>';
}			    
?>
	<form method="post">
	
		<p>
			Title:<br>
			<input type="text" name="title" value="<?php if(!empty($title)){ echo $title; }else{ echo'Tiêu đề bài viết'; } ?>"></p>
		<p>
		    <p>
			Ảnh đại diện:<br>
			<input type="text" name="img" value="<?php if(!empty($img)){ echo $img; }else{ echo'Đặt link ảnh ở đây'; } ?>"></p>
		<p>
		Nội dung:<br>
			<textarea name="noidung" style="height: 200px">
		<?php if(!empty($noidung)){ echo $noidung; }else{ echo'Nội dung bài viết'; } ?>
			</textarea>
		</p>
		<p>
			<input type="submit" name="submit" value="Submit">
		</p>
	</form>
                                </div>
                            </div>
                        </div>
                    </div>
	<script>
		CKEDITOR.inline( 'noidung' );
	</script>
<?php require('../TMQ/end.php'); ?>