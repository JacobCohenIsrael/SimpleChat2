<?php
use diwip\Base\Config\ArrayConfig;
use diwip\Base\ServiceManager\ServiceManager;
use diwip\Base\Event\EventDispatcher;
use diwip\Base\Http\ControllerResolver;
use diwip\Base\Http\Listener\RoutingListener;
use diwip\Base\Http\HttpApplication;
use diwip\Base\Http\Request;
use diwip\Base\Http\Listener\ActionListener;

date_default_timezone_set('UTC');
define('DIWIP_PROJECT_PATH' ,   realpath(__DIR__ . '/../'));
define('DIWIP_VIEWS_PATH'   ,    realpath(DIWIP_PROJECT_PATH . '/app/Chat/views'));
require DIWIP_PROJECT_PATH . '/vendor/autoload.php';

$configuration      = new ArrayConfig(include DIWIP_PROJECT_PATH . '/app/Chat/config/config.php');
$serviceManager     = new ServiceManager($configuration->get('servicemanager'));
$eventDispatcer     = new EventDispatcher();
$controllerResolver = new ControllerResolver();

$serviceManager->setAppConfiguration($configuration);
$serviceManager->set('EventDispatcher',     $eventDispatcer);
$serviceManager->set('ControllerResolver',  $controllerResolver);

$eventDispatcer->addSubscribers([
    new RoutingListener($configuration->get('routes')),
    new ActionListener(),
]);

$application = new HttpApplication($serviceManager);
echo $application->run(Request::create());
