<?php

namespace Autoload;

class Psr0Autoloader implements AutoloaderInterface {

	use SplAutoloaderTrait;
	protected $rootDirectory;

	public function __construct($rootDirectory) {

		$this->rootDirectory;

		$this->splInvokable = function($className) {

			$paths = explode("\\", trim($className, "\\"));
			$class = array_pop($paths);

			$path = $this->rootDirectory . DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, $paths) . DIRECTORY_SEPARATOR . str_replace("_", DIRECTORY_SEPARATOR, $class).'.php';

			if (file_exists($path)) {
				require_once($path);
			}

		};
	}
}