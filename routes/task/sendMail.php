<?php
error_reporting(0); 
require '../public/phpMailer/PHPMailerAutoload.php';

//邮件发送  
function send_mail($title,$body,$fromMail,$toMail) { 
	date_default_timezone_set("Asia/Shanghai");//设定时区东八区   
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	$mail->CharSet='utf-8'; //编码 

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.qq.com';                          // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = '254264446@qq.com';                 // SMTP username
	$mail->Password = 'xyang2013hz';                      // SMTP password
	$mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	if(empty($fromMail)){  
	   $fromMail='254264446@qq.com';
	    //$fromMail='yangxiaoxu@baidu.com';
	} 
	$mail->From = $fromMail;                               // 发信人  
	$mail->FromName = '梨花寨';                            // 发信人别名  

	if(empty($toMail)){  
		$toMail='lihuazhai_com@163.com';

         //$toMail='yangxiaoxu@baidu.com';
	}
	$mail->AddAddress($toMail);                             // Add a recipient 
	//$mail->addReplyTo('info@example.com', 'Information'); 

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                    // Set email format to HTML

	$mail->Subject  = $title;                               // 邮件标题  
	$mail->Body     = $body;                                // 邮件内空 
	$mail->AltBody = '请使用HTML方式查看邮件。';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent succeed';
	} 
} 



send_mail('FE团队工作周报',$_POST['body']);

?>