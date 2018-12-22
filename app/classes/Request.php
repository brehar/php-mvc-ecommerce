<?php

namespace app\classes;

class Request
{
	public static function all($is_array = false)
	{
		$result = [];

		if (\count($_GET) > 0) {
			$result['get'] = $_GET;
		}

		if (\count($_POST) > 0) {
			$result['post'] = $_POST;
		}

		$result['file'] = $_FILES;

		/** @noinspection PhpComposerExtensionStubsInspection */
		return json_decode(json_encode($result), $is_array);
	}

	public static function get($key)
	{
		$data = self::all();

		return $data[$key];
	}

	public static function has($key): bool
	{
		return array_key_exists($key, self::all(true));
	}

	public static function old($key, $value)
	{
		$data = self::all();

		return $data[$key][$value] ?? null;
	}

	public static function refresh(): void
	{
		$_GET = [];
		$_POST = [];
		$_FILES = [];
	}
}
