<?php

namespace app\classes;

use RuntimeException;

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

	private static function checkFileExtension($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}

	public function move($tempPath, $folder, $file, $newFilename)
	{
		$ds = DIRECTORY_SEPARATOR;

		$this->setFilename($file, $newFilename);

		$filename = $this->getFilename();

		if (!is_dir($folder) && !mkdir($folder, 0775, true) && !is_dir($folder)) {
			throw new RuntimeException("Directory $folder was not created successfully.");
		}

		$this->setPath("{$folder}{$ds}{$filename}");

		$absolutePath = BASE_PATH . "{$ds}public{$ds}" . $this->getPath();

		if (move_uploaded_file($tempPath, $absolutePath)) {
			return $this->getPath();
		}

		return null;
	}

	private function getFilename()
	{
		return $this->filename;
	}

	private function getPath()
	{
		return $this->path;
	}

	private function setFilename($file, $name = null): void
	{
		if (!isset($name) || $name === '') {
			$name = pathinfo($file, PATHINFO_FILENAME);
		}

		$name = strtolower(str_replace(['-', ' '], '_', $name));
		$hash = md5(microtime());
		$ext = self::checkFileExtension($file);

		$this->filename = "{$name}-{$hash}.{$ext}";
	}

	private function setPath($path): void
	{
		$this->path = $path;
	}
}
