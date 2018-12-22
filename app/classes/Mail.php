<?php

namespace app\classes;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use RuntimeException;

class Mail
{
	protected $mail;

	public function __construct()
	{
		$this->mail = new PHPMailer();
		$this->setup();
	}

	public function setup(): void
	{
		$this->mail->isSMTP();
		$this->mail->isHTML();

		$this->mail->Mailer = 'smtp';
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = 'tls';
		$this->mail->SingleTo = true;

		if (getenv('APP_ENV') !== 'production') {
			$this->mail->SMTPDebug = '';
		}

		$this->mail->Host = getenv('SMTP_HOST');
		$this->mail->Port = getenv('SMTP_PORT');
		$this->mail->Username = getenv('EMAIL_USERNAME');
		$this->mail->Password = getenv('EMAIL_PASSWORD');
		$this->mail->From = getenv('ADMIN_EMAIL');
		$this->mail->FromName = getenv('APP_NAME');
	}

	public function send($data): bool
	{
		$this->mail->addAddress($data['to'], $data['name']);
		$this->mail->Subject = $data['subject'];
		$this->mail->Body = make($data['view'], ['data' => $data['body']]);

		try {
			return $this->mail->send();
		} catch (Exception $e) {
			throw new RuntimeException($e);
		}
	}
}
