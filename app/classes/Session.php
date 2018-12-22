<?php

namespace app\classes;

use InvalidArgumentException;

class Session
{
	public static function add($name, $value)
	{
		if ($name !== '' && !empty($name) && $value !== '' && !empty($value)) {
			return $_SESSION[$name] = $value;
		}

		throw new InvalidArgumentException('Arguments $name and $value must be passed to add() session.');
	}

	public static function get($name)
	{
		return $_SESSION[$name];
	}

	public static function has($name): bool
	{
		if ($name !== '' && !empty($name)) {
			return isset($_SESSION[$name]) ? true : false;
		}

		throw new InvalidArgumentException('Argument $name must be passed to has() session.');
	}

	public static function remove($name): void
	{
		if (self::has($name)) {
			unset($_SESSION[$name]);
		}
	}
}
