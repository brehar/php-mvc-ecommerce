<?php

namespace app\classes;

class Redirect
{
	public static function to($page): void
	{
		header("Location: $page");
	}

	public static function back(): void
	{
		$uri = $_SERVER['REQUEST_URI'];

		header("Location: $uri");
	}
}
