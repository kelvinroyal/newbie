<?php
include_once "class.smtp.php";
include_once "class.phpmailer.php"; 
if(isset($_POST['btn_submit'])){
    
    $nFrom = $_POST['ten_kh'];    //mail duoc gui tu dau
    $mFrom = $_POST['mail'];  //dia chi email cua ban 
    $mPass = $_POST['mat_khau'];       //mat khau email cua ban ??? 
    $nTo = 'CEO Việt Hoàng'; //Ten nguoi nhan
    $mTo = 'kelvinroyal96@gmail.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $_POST['message'];   // Noi dung email
    $title = $_POST['title'];   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP thông tin debug
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "tls";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 587;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($_POST['mail'], 'Trả lời khách hàng'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Gửi mail không thành công!';
         
    } else {
         
        echo 'Mail của bạn đã được gửi thành công, xin chờ phản hồi. ';
    }
}
?>
