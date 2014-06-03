<?php

// use the Request/Response classes
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// bootstrap Moodle
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';
global $CFG;

require_once $CFG->dirroot . '/vendor/autoload.php';
$app = new Silex\Application();
//set debugging to minimal
$app['debug'] = debugging('', DEBUG_MINIMAL);

//register for silex services 
//1. UrlGeneratorServiceProvider
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//2. TwigServiceProvider
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => dirname(__FILE__) . '/templates'
));

// require Twig library functions
require dirname(__FILE__) . '/twiglib.php';

//unrestricted route showing all courses
$app->get('/', function() use ($app){
    return 'Hello';
});

return $app;
