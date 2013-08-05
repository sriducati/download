<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));
date_default_timezone_set("PRC");
ini_set('display_errors', true);
defined('APP_LIB_PATH') || define('APP_LIB_PATH', __DIR__ . '/../vendor');
// check php version
if (version_compare(phpversion(), '5.3.3', '<')) {
    printf('PHP 5.3.3 is required, you have %s', phpversion());
    exit(1);
}
defined('APP_PUBLIC_PATH') || define('APP_PUBLIC_PATH', __DIR__);

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
