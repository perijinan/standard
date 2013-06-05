<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use dayax\core\ExceptionFactory;
use dayax\core\Message;
use dayax\core\Translator;

$loader = require __DIR__.'/../vendor/autoload.php';

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

ExceptionFactory::addPackage('SIP');
ExceptionFactory::register();

Message::addCatalog('SIP',__DIR__.'/../src/SIP/Core/Resources/messages');
Message::addCatalog('SIP',__DIR__.'/../src/SIP/Admin/Resources/messages');
$cacheDir = __DIR__.'/cache/dayax/messages';
if(!is_dir($cacheDir)){
    mkdir($cacheDir,0777,TRUE);
}
Translator::getInstance()->setCacheDir($cacheDir);
//Message::addCatalog('SIP\\Admin',__DIR__.'/src/SIP/Admin/Resources/messages');



return $loader;
