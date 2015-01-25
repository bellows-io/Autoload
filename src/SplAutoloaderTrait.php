<?php

namespace Autoload;

trait SplAutoloaderTrait {

	protected $splInvokable;

	public function register() {
		spl_autoload_register($this->invokable);
	}

	public function unregister() {
		spl_autoload_unregister($this->invokable);
	}

}