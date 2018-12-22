<?php

namespace app\classes;

class UploadImage
{
	private static $maxFilesize = 2097152;
	private static $allowedImgExts = ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'tif', 'tiff'];

	private $filename;
	private $path;

	public static function validFilesize($file): bool
	{
		return filesize($file) < self::$maxFilesize;
	}

	public static function isImage($file): bool
	{
		$ext = self::checkFileExtension($file);

		if (!\in_array(strtolower($ext), self::$allowedImgExts, true)) {
			return false;
		}

		return true;
	}

	public function getFilename()
	{
		return $this->filename;
	}

	public function getPath()
	{
		return $this->path;
	}

	private static function checkFileExtension($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}

	private function setName($file, $name = null): void
	{
		if (!isset($name) || $name === '') {
			$name = pathinfo($file, PATHINFO_FILENAME);
		}

		$name = strtolower(str_replace(['-', ' '], '_', $name));
		$hash = md5(microtime());
		$ext = self::checkFileExtension($file);

		$this->filename = "{$name}-{$hash}.{$ext}";
	}
}
