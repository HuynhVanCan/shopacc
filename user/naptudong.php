<?php require('../TMQ/function.php'); ?>
<?php require('../TMQ/head.php'); ?>
<div class="c-layout-page">
<?php require('head.php'); ?>
<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Nạp thẻ tự động</h3>
					<div class="c-line-left"></div>
				</div>
<?php

if (isset($_POST['submit'])) {
    if (!isset($_POST['telco']) || !isset($_POST['amount']) || !isset($_POST['serial']) || !isset($_POST['code'])) {
        $err = 'Bạn cần nhập đầy đủ thông tin';
    } else {
        $telco = $_POST['telco'];
        $amount = $_POST['amount'];
        $serial = $_POST['serial'];
        $code = $_POST['code'];
        $saugd = $amount + $TMQ['cash'];
        $command = 'charging';  // Nap the

        require_once('thesieure/config.php'); 

        $request_id = rand(100000000, 999999999); /// Order id của bạn, ví dụ này lấy ngẫu nhiên để test

            $dataPost = array();
			$dataPost['partner_id'] = $partner_id;
			$dataPost['request_id'] = $request_id;
			$dataPost['telco'] = $telco;
			$dataPost['amount'] = $amount;
			$dataPost['serial'] = $serial;
			$dataPost['code'] = $code;
			$dataPost['command'] = $command;
			$sign = creatSign($partner_key, $dataPost);
			$dataPost['sign'] = $sign;
			
            $data = http_build_query($dataPost);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);

            if ($obj->status == 99) {
                //Gửi thẻ thành công, đợi duyệt.
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
              
            } elseif($obj->status == 1) {
                //Thành công
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
    
                 $db->exec("INSERT INTO `TMQ_napthe` SET
    `uid` = '$uid',
    `noidung` = 'Nạp thẻ $telco với giá ".number_format($amount)." <sup>đ</sup>'
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
            }elseif($obj->status == 2) {
                //Thành công nhưng sai mệnh giá
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
            }elseif($obj->status == 3) {
                //Thẻ lỗi
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
            }elseif($obj->status == 4) {
                //Bảo trì
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
                
			}else{
				//Lỗi
                echo '<pre>';
                print_r($obj);
                echo '</pre>';
			}
 $db->exec("INSERT INTO `TMQ_napthe`(`uid`, `serial`, `mathe`, `loaithe`, `menhgia`, `trangthai`, `date`) VALUES ('".$TMQ['uid']."','$serial','$code','$telco','$amount','".$obj->message."','".date("H:i:s d-m-Y")."')");
        
    }
}
?>


 <form method="POST" action="">
                <div class="form-group">
                    <label>Loại thẻ:</label>
                    <select class="form-control" name="telco">
                        <option value="">Chọn loại thẻ</option>
                        <option value="VIETTEL">Viettel</option>
                        <option value="VIETTELAUTO">Viettel Auto</option>
                        <option value="MOBIFONE">Mobifone</option>
                        <option value="MOBIFONEAUTO">Mobifone Auto</option>
                        <option value="VINAPHONE">Vinaphone</option>
                        <option value="VINAPHONEAUTO">Vinaphone Auto</option>
                        <option value="GATE">Gate</option>
                        <option value="ZING">Zing</option>
                        <option value="MEGACARD">Megacard</option>
                        <option value="BIT">BIT</option>
                        <option value="GARENA">Garena</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mệnh giá:</label>
                    <select class="form-control" name="amount">
                        <option value="">Chọn mệnh giá</option>
                        <option value="10000">10.000</option>
                        <option value="20000">20.000</option>
                        <option value="30000">30.000</option>
                        <option value="50000">50.000</option>
                        <option value="100000">100.000</option>
                        <option value="200000">200.000</option>
                        <option value="300000">300.000</option>
                        <option value="500000">500.000</option>
                        <option value="1000000">1.000.000</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Số seri:</label>
                    <input type="text" class="form-control" name="serial"/>
                </div>
                <div class="form-group">
                    <label>Mã thẻ:</label>
                    <input type="text" class="form-control" name="code"/>
                </div>
                <div class="form-group">
                    <?php echo (isset($err)) ? '<div class="alert alert-danger" role="alert">' . $err . '</div>' : ''; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block" name="submit">NẠP NGAY</button>
                </div>
            </form>



	<table class="table cart-table">
			<thead>
                            <tr>
					<th>Trạng thái</th>
					<th>Serial</th>
					<th>Mã thẻ</th>
					<th>Loại thẻ</th>
					<th>Mệnh giá</th>
					<th>Thời gian</th>
					 </tr>
				</thead>
				<tbody>
<?php
$sotin1trang = 20;
if(isset($_GET['page'])){
 $page = intval($_GET['page']);
 }else{
 $page = 1;
 }
 $from = ($page - 1)* $sotin1trang;
if(isset($_POST['timkiem'])){
$get = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid' $start $end LIMIT $from,$sotin1trang");
}else{
$get = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid' LIMIT $from,$sotin1trang");
}
foreach($get as $nt){
?>				<tr>
<td><?=$nt['trangthai'];?></td>
<td><?=$nt['serial'];?></td>
<td><?=$nt['mathe'];?></td>
<td><?=$nt['loaithe'];?></td>
<td><?=number_format($nt['menhgia']);?><sup>đ</sup></td>
<td><?=$nt['date'];?></td>
</tr>
<?php } ?>
				</tbody>
				</table>
	<?php 
$tong = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid'")->rowcount();

if ($tong > $sotin1trang){
echo '<center>' . phantrang('/profile/nap-the-tu-dong.html?', $from, $tong, $sotin1trang) . '</center>';
} ?>

</div>	</div></div></div></div>
<?php require('../TMQ/end.php'); ?>