<?php
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
    
}
require('head.php'); 
?>  <link rel="stylesheet" href="/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
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
                 <?php if(isset($_GET['add'])){ ?>    
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="/admin/quan-ly-banner.html">Quản Lý Banner</a></li>
                                    <li class="active">Thêm Banner</li>
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
                    <div class="col-md-12">
                       
<?php
		if(isset($_POST['submit'])){

			// Count total files
			$countfiles = count($_FILES['files']['name']);
		    $rowCount = $db->query("SELECT * FROM `TMQ_banner`")->rowCount();
            $rowCount = $rowCount + 1;
			// Loop all files
			for($i=0;$i<$countfiles;$i++){

				// File name
			   $filename = $_FILES['files']['name'][$i];
			   $url = tmq_boc($_POST['url']);
			   $title = tmq_boc($_POST['title']);
               $name = explode(".",$filename);
               $name_file = $name[0].'-'.$rowCount.'.'.$name[1];

			   	// Get extension
          		$ext = explode(".", $filename);
          		$ext = end($ext);

          		// Valid image extension
          		$valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG");

          		if(in_array($ext, $valid_ext)){
          			// Upload file
				   	if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'../upload/'.$name_file)){
            $link_img = "https://$website/upload/$name_file";
			$db->exec("INSERT INTO `TMQ_banner`(`image`, `url`, `title`) VALUES ('$link_img','$url','$title')");
					}
					
          		}
			   	
			}
			
			echo ' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                   Thêm banner thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
		}
		?>
                        <div class="card">
                            <div class="card-header">
                                <strong>Thêm banner</strong> 
                            </div>
                         <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Link Hình Ảnh</label>
                                    <div class="input-group">
                                        <input type="file" name="files[]" id="files[]" multiple >
                                       
                                    </div>
                                  </div>
                                </div>
                               <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Chuyển hướng</label>
                                    <div class="input-group">
                                        <input type="text" name="url" class="form-control">
                                       
                                    </div>
                                    <small class="form-text text-muted">Chuyển hướng hình ảnh</small>
                                </div>  </div>
                                 <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Title</label>
                                    <div class="input-group">
                                        <input type="text" name="title" class="form-control">
                                       
                                    </div>
                                    <small class="form-text text-muted">Chuyển hướng hình ảnh</small>
                                </div>
                                
              </div>
                             <div class="card-body card-block">
                                <div class="form-group">
                              
                     <button type="submit" class="btn btn-outline-success" name="submit">Thêm</button>
                            </div>
                        </div>
                    

</form>
               </div>
                        </div>          
         <?php 
}else{
    ?>
     <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    
                                    <li class="active">Banner</li>
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
                    <div class="col-md-12">
                    <?php    
         if($TMQ['admin'] == 9){
         if(isset($_GET['del'])){ 
          $id = intval($_GET['del']);
          $db->exec("DELETE FROM `TMQ_banner` WHERE `id` = '$id' "); ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                      Banner đã bị xóa.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                    
         <?php  } } ?>  <div class="card">
                            <div class="card-header">
                                <strong>Danh sách banner - <a style="color:red;" href="?add">Thêm Banner</a></strong> 
                            </div>
                           
                        
    
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Title</th>
                                       
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$get = $db->query("SELECT * FROM `TMQ_banner`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $row){
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$row['id'];?></th>
                                        <td><img style="width: 250;height: 100;" src="<?=$row['image'];?>" alt="<?=$row['image'];?>"></td>
                                      
                                        <td><?=$row['url'];?></td>
                                        <td><?=$row['title'];?> <br>
                                     </td>
                                        <td>
                                            <a href="?del=<?=$row['id'];?>"><i class="ti-close"></i></a>
                                            
                                            </td>
                                    </tr>
                                    
                                  <?php } ?> 
                                </tbody>
                            </table>
                        </div></div></div>

<?php } ?></div>
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>



<?php
require('end.php');
?>