<?php

namespace Autoload;

trait SplAutoloaderTrait {

	protected $splInvokable;

	public function register() {
		spl_autoload_register($this->splInvokable);
	}

	public function unregister() {
		spl_autoload_unregister($this->splInvokable);
	}

}