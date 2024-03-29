<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

umask(0000);

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

// Use APC for autoloading to improve performance
// Change 'sf2' by the prefix you want in order to prevent key conflict with another application
/*
$loader = new ApcClassLoader('sf2', $loader);
$loader->register(true);
*/

require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

if (strpos($_SERVER['HTTP_HOST'], 'playground') === false) {
    $kernel = new AppKernel('prod', false);
} else {
    $kernel = new AppKernel('dev', true);
}
$kernel->loadClassCache();
if (strpos($_SERVER['HTTP_HOST'], 'playground') === false) {
    $kernel = new AppCache($kernel);
}
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
