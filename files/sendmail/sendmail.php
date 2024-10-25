<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('en', 'phpmailer/language/');
	$mail->IsHTML(true);

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     //SMTP username
	$mail->Password   = 'secret';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	//Від кого лист
	if (!empty($_POST['form']['email'])) {
		$userEmail = htmlspecialchars(trim($_POST['form']['email']));
		$mail->setFrom($userEmail, 'Form Submission'); // Отправитель — пользователь
  } else {
		$mail->setFrom('hello@amshaadvisory.com', 'Amsha Advisory'); // Email по умолчанию
  }
	//Кому відправити
	$mail->addAddress('hello@amshaadvisory.com'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Contact Form Submission from Amsha Advisory';

	//Тіло листа
	$body = '<h1>New Contact Form Submission</h1>';

	//if(trim(!empty($_POST['email']))){
		//$body.=$_POST['email'];
	//}	
	
	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	if (!empty($_POST['form']['name'])) {
		$body .= '<p><strong>Company Name:</strong> ' . htmlspecialchars(trim($_POST['form']['name'])) . '</p>';
  }
  if (!empty($_POST['form']['activity'])) {
		$body .= '<p><strong>Field of Activity:</strong> ' . htmlspecialchars(trim($_POST['form']['activity'])) . '</p>';
  }
  if (!empty($_POST['form']['phone'])) {
		$body .= '<p><strong>Phone:</strong> ' . htmlspecialchars(trim($_POST['form']['phone'])) . '</p>';
  }
  if (!empty($_POST['form']['email'])) {
		$body .= '<p><strong>Email:</strong> ' . htmlspecialchars(trim($_POST['form']['email'])) . '</p>';
  }

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Data sent!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>