<?php

namespace app\classes;

class CSRFToken
{
	public static function _token(): string
	{
		if (!Session::has('token')) {
			/** @noinspection PhpUnhandledExceptionInspection */
			$randomToken = bin2hex(random_bytes(32));

			Session::add('token', $randomToken);
		}

		return Session::get('token');
	}

	public static function verifyCSRFToken($requestToken): bool
	{
		if (Session::has('token') && Session::get('token') === $requestToken) {
			Session::remove('token');

			return true;
		}

		return false;
	}
}
