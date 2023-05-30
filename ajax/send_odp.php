<?php
require("../TMQ/function.php");
$email = tmq_boc($_POST["email"]);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
  //check thời gian gửi mã
   $date = date("Y-m-d H:i:s");
 $kiemtra = $db->query("SELECT * FROM `TMQ_key` WHERE `email` = '$email'")->fetch();
 
 if(empty($TMQ)){
     echo "Vui lòng đăng nhập.";
 }elseif($kiemtra['time'] > $date){
        echo "Mã đã được gửi trước đó, vui lòng kiểm tra email.";
    }else{
$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
$expDate = date("Y-m-d H:i:s",$expFormat);
$key = rand(1000,9999);
//lưu key vào sql
$db->exec("INSERT INTO `TMQ_key` SET
`email` = '$email',
`key` = '$key',
`time` = '$expDate',
`loai` = 'buy_acc'");
$output='<p>Chào bạn,</p>';
$output.='<p>Mã giao dịch ngày '.date("d-m-Y").' của bạn là: '.$key.'</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Hãy chắc chắn sao chép toàn bộ liên kết vào trình duyệt của bạn.
Liên kết sẽ hết hạn sau 1 ngày vì lý do bảo mật.</p>';
$output.='<p>Nếu bạn không yêu cầu ODP này, vui lòng bỏ qua email này.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>TMQ</p>';
$body = $output; 
$subject = "Ma kich hoat - $website";
sendmail($email,$subject,$body);
        
    }