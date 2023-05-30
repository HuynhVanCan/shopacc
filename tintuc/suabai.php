<?php 
require('../TMQ/function.php');
require('../TMQ/head.php');
$id = isset($_GET['id']) ? (int)$_GET['id'] : NULL;
$get = $db->query("SELECT * FROM `TMQ_tintuc` WHERE `id` = '$id'")->fetch();
?>
<script src="https://ckeditor.com/latest/ckeditor.js"></script>
<link href="style.css" rel="stylesheet">

<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				
					<h2>Sửa bài viết #<?=$id;?></h2>
				
				</div> 
			</div>
			
			<div class="container">
			<div class="row animate-box">
<?php if(isset($_POST['submit'])){
    $title = trim(addslashes(htmlspecialchars($_POST['title'])));
    $noidung = trim(addslashes(htmlspecialchars($_POST['noidung'])));
    $img = trim(addslashes(htmlspecialchars($_POST['img'])));
    $db->exec("UPDATE `TMQ_tintuc` SET 
    `title` = '$title', 
    `noidung` = '$noidung',
    `img` = '$img', 
    `date` = '".date('d-m-Y')."',
    `name` = '".$TMQ['name']."'
    WHERE `id` = '$id'");
    echo '<script>alert("Sửa bài thành công");</script>';
}			    
?>
	<form method="post">
	
		<p>
			Title:<br>
			<input type="text" name="title" value="<?php echo $get['title']; ?>"></p>
		<p>
		    <p>
			Ảnh đại diện:<br>
			<input type="text" name="img" value="<?php echo $get['img']; ?>"></p>
		<p>
		Nội dung:<br>
			<textarea name="noidung" style="height: 200px">
	<?php echo $get['noidung']; ?>
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