<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var $loader ClassLoader
 */
$loader = require __DIR__.'/../vendor/autoload.php';


set_include_path(__DIR__.'/../vendor'.PATH_SEPARATOR.get_include_path());
require_once __DIR__.'/../vendor/Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();
 
//set_include_path(__DIR__.'/../vendor'.PATH_SEPARATOR.get_include_path());
//require_once __DIR__.'/../vendor/Zend/library/Zend/Loader/Autoloader.php';
//zend_loader_Autoloader::getInstance();
//return $loader;

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;

?>