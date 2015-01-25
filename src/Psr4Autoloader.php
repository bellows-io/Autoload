<?php

namespace Autoload;

class Psr4Autoloader implements AutoloaderInterface {

	use SplAutoloaderTrait;

	protected $rootDirectory;
	protected $prefix;

	public function __construct($prefix, $rootDirectory) {

		$this->prefix = $prefix;
		$this->rootDirectory = $rootDirectory;
		$this->splInvokable = function($classPath) {

			$cleanPath = trim($classPath, "\\");
			$startPos = strpos($cleanPath, $this->prefix);

			if ($startPos === 0) {

				$cleanPath = substr($cleanPath, strlen($this->prefix));
				$paths = array_filter(explode("\\", trim($cleanPath)));

				$path = $this->rootDirectory . DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, $paths) . '.php';

				if (file_exists($path)) {
					require_once($path);
				}
			}
		};
	}
}