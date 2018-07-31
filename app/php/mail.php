<?php

	$project_name = "project_name"; // Название вашего сайта
	$admin_email  = "admin_email";  // Почта на какую придет письмо
	$form_subject = "form_subject"; // Тема письма

	$method = $_SERVER['REQUEST_METHOD'];

	if ( $method === 'POST' ) {

		$email = $_POST['email'];

		$message = "<table border='1' width='100%'>
					<caption>Сообщение</caption>
						<tr>
							<th>Email</th>
						</tr>
						<tr>
							<td>. $email .</td>
						</tr>
					</table>";
		
		function adopt($text) {
			return '=?UTF-8?B?'.Base64_encode($text).'?=';
		}

		$headers = "MIME-Version: 1.0" . PHP_EOL .
				   "Content-Type: text/html; charset=utf-8" . PHP_EOL .
				   'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
				   'Reply-To: '.$admin_email.'' . PHP_EOL;

		mail($admin_email, adopt($form_subject), $message, $headers );

	}

	header( 'Location: /', true, 307 );