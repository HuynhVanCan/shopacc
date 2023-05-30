<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////


include $_SERVER['DOCUMENT_ROOT'].'/TMQ/config.php';

function ban($ban){
 if($ban == 1){
 echo "Khoá";
 }else{
 echo "Hoạt động";
 }}
 //loại chuyên mục
function loaicm($cm)
    {
    if ($cm == 1) {
        echo    $name = "Thường";
    } elseif ($cm == 2){
        echo     $name = "Random";
    }else{
        echo "";
    }
   
}
//xóa file
function xoa_file($dir){
    if (is_dir($dir))
    {
        $structure = glob(rtrim($dir, "/").'/*');
        if (is_array($structure)) {
            foreach($structure as $file) {
                if (is_dir($file)) recursiveRemove($file);
                else if (is_file($file)) @unlink($file);
            }
        }
    }
}
function thumb($path){
    // Kiểm tra thư mục có tồn tại hay không
    if(file_exists($path) && is_dir($path)){
        // Quét tất cả các file trong thư mục
        $result = scandir($path);
        
        // Lọc ra các thư mục hiện tại (.) và các thư mục cha (..)
        $files = array_diff($result, array('.', '..'));
        
        if(count($files) > 0){
            // Lặp qua mảng đã trả lại
          
            foreach($files as $key => $file){
               
                if(is_file("$path/$file")){
                    // Hiển thị tên File
                   // echo $file . "<br>";
                   if($key == 5){
                    echo '<img src="'.$path.$file.'" alt=""/>';
                   }
                } else if(is_dir("$path/$file")){
                    // Gọi đệ quy hàm nếu tìm thấy thư mục
                    thumb("$path/$file");
                }
            }
        } else{
            echo "ERROR: Không có file nào trong thư mục.";
        }
    } else {
        echo "ERROR: Thư mục không tồn tại.";
    }   
}
//get ảnh
function get_img($path){
    // Kiểm tra thư mục có tồn tại hay không
    if(file_exists($path) && is_dir($path)){
        // Quét tất cả các file trong thư mục
        $result = scandir($path);
        
        // Lọc ra các thư mục hiện tại (.) và các thư mục cha (..)
        $files = array_diff($result, array('.', '..'));
        
        if(count($files) > 0){
            // Lặp qua mảng đã trả lại
            foreach($files as $file){
                if(is_file("$path/$file")){
                    // Hiển thị tên File
                   // echo $file . "<br>";
                    echo '<img src="'.$path.$file.'" alt=""/>';
                } else if(is_dir("$path/$file")){
                    // Gọi đệ quy hàm nếu tìm thấy thư mục
                    get_img("$path/$file");
                }
            }
        } else{
            echo "ERROR: Không có file nào trong thư mục.";
        }
    } else {
        echo "ERROR: Thư mục không tồn tại.";
    }
}
//sendmail
function sendmail($email,$chu_de,$body){
    $fromserver = "@gmail.com"; 
require("../PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "@gmail.com";
$mail->Password = "tmquang";
$mail->SetFrom("@gmail.com");
$mail->Subject = "$chu_de";
$mail->Body = "$body";
$mail->AddAddress("$email");

 if(!$mail->Send()) {
  //  echo "Mailer Error: " . $mail->ErrorInfo;
  echo "Gửi thất bại.";
 } else {
    echo "Thư đã được gửi. Vui lòng kiểm tra Email";
 }
 
}
//bọc dữ liệu 
function tmq_boc($var){
$dulieu = trim(addslashes(htmlspecialchars($var)));
return $dulieu;    
}
//list bank
function string_bank($bank)
    {
    switch ($bank) {
        case 1:
            $name = "Techcombank";
            break;
        case 2:
             $name = "Vietcombank";
            break;
        case 3:
             $name = "Vietinbank";
            break;
        case 4:
             $name = "Bidv";
            break;
        case 5:
             $name = "Mbbank";
            break;
        case 6:
            $name = "Sacombank";
            break;
        case 7:
             $name = "Seabank";
            break;
         case 8:
             $name = "tkcr(tkcr.vn)";
            break;
         case 9:
             $name = "Tcsr(Thecaosieure)";
            break;
         case 10:
             $name = "TKCR";
            break; 
        case 11:
             $name = "azpro";
            break; 
        case 12:
             $name = "Momo";
            break; 
           
      
    }
   
    return $name;
}

function TaoChuoiRandom($sokitu){
	$mang = array("a", "b", "c", "A", "B", "C", 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9);	
	$kq = "";
	for($i=1; $i<=$sokitu; $i++){
		$kq = $kq . $mang[rand(0, count($mang)-1)];
	}
	return $kq;
}
//get url
$link = $_SERVER["REQUEST_URI"]; 
//phân trang web
function phantrang($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '«');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '»');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}

//lấy dữ liệu cài đặt
function caidat($text){
     global $db;
     $cd = $db->query("SELECT * FROM `TMQ_setting` WHERE `key` = '$text'")->fetch();
     return html_entity_decode($cd['text']);
}

//tạo chuỗi ngẫu nhiên
function taochuoi($length){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";;
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}


//xóa dấu tiếng việt
function xoa_dau ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','-',$str);
 
return $str;
 
}