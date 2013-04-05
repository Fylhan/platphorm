<?php

namespace MyVendor;

use Composer\Script\Event;

class MyClass {
	public static function postInstall(Event $event) {
		$composer = $event->getComposer();
		// I am here to fake the installation of this "platphorm"
		// I am only creating a file: THIS_IS_IT_I_AM_INSTALLED, that's all!
		file_put_contents("THIS_IS_IT_I_AM_INSTALLED", "If you can read these lines, that means that this app has been successfully installed.");
	}

	public static function postUpdate(Event $event) {
		$composer = $event->getComposer();
		// I am here to fake the update of this "platphorm"
		// I am only creating a file: THIS_IS_IT_I_AM_UPDATED, that's all!
		file_put_contents("THIS_IS_IT_I_AM_UPDATED", "If you can read these lines, that means that this app has been successfully updated.");
	}
}
