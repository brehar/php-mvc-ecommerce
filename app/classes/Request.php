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
}
