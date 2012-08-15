<?php
// cli-config.php

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Tools\Setup;

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

//require_once('Doctrine/Common/ClassLoader.php');

$classLoader = new ClassLoader('Doctrine', realpath(APPLICATION_PATH . '/../library'));
$classLoader->register();
$classLoader = new ClassLoader('Oglasnik', realpath(APPLICATION_PATH . '/../library'));
$classLoader->register();
$classLoader = new ClassLoader('Zend', realpath(APPLICATION_PATH . '/../library'));
$classLoader->register();

$isDevMode = true;

$config = new Zend_Config_Ini( APPLICATION_PATH . '/../application/configs/application.ini','development');

$connectionOptions = $config->resources->doctrine->toArray();

$proxies = APPLICATION_PATH . '/../library/Oglasnik/Proxies';

$config = Setup::createAnnotationMetadataConfiguration(array(realpath(APPLICATION_PATH . '/../library/Oglasnik/Entities')), $isDevMode, realpath($proxies) );

$em = EntityManager::create($connectionOptions, $config); 


$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));