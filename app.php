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

//3. Define required Twig library functions
require dirname(__FILE__) . '/twiglib.php';

//4. -- Implement all actions --//
//unrestricted route showing all courses
$app->get('/', function() use ($app){
    //return 'Hello';
    global $PAGE;
    $PAGE->set_context(context_system::instance());
    $PAGE->set_pagelayout('standard');
    $PAGE->set_url($app['url_generator']->generate('enrolledcourses'));
    $output = '<h3>hello<h3>';
    return $output;
})->bind('enrolledcourses');

return $app;
