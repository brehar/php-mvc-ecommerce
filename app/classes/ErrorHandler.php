<?php

namespace app\classes;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
	public function handleErrors($error_number, $error_message, $error_file, $error_line): void
	{
		$error = "[{$error_number}] An error occurred in {$error_file} at {$error_line}: {$error_message}";

		if (getenv('APP_ENV') !== 'production') {
			$whoops = new Run();

			$whoops->pushHandler(new PrettyPageHandler());
			$whoops->register();
		} else {
			$data = [
				'to' => getenv('ADMIN_EMAIL'),
				'subject' => 'Internal Server Error',
				'view' => 'errors',
				'name' => getenv('APP_NAME') . 'Admin',
				'body' => $error
			];

			self::emailAdmin($data)->outputFriendlyError();
		}
	}

	public function outputFriendlyError(): void
	{
		ob_end_clean();
		view('errors/generic');
		exit();
	}

	public static function emailAdmin($data): ErrorHandler
	{
		$mail = new Mail();

		$mail->send($data);

		return new static();
	}
}
