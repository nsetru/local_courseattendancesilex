<?php

// use the Request/Response classes
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// bootstrap Moodle
require_once dirname(dirname(dirname(__FILE__))) . '/config.php';
global $CFG;

require_once $CFG->dirroot . '/vendor/autoload.php';
$app = new Silex\Application();
//Silex - set debugging to minimal
$app['debug'] = debugging('', DEBUG_MINIMAL);

//register for silex services 
//1. UrlGeneratorServiceProvider
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//2. TwigServiceProvider
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    // Twig - path to where twig templates are stored
    'twig.path' => dirname(__FILE__) . '/templates',
    'twig.options' => array(
        'cache' => empty($CFG->disable_twig_cache) ? "{$CFG->dataroot}/twig_cache" : false,
        'auto_reload' => debugging('', DEBUG_MINIMAL) // Twig - set debugging to minimal
    )
));

//3. require Twig library functions
require dirname(__FILE__) . '/twiglib.php';
require_once dirname(__FILE__) . '/models/courseattendance.php';

//4. -- Implement all actions --//
//unrestricted route showing all courses
$app->get('/', function() use ($app){
    //return 'Hello';
    global $PAGE, $OUTPUT;
    $PAGE->set_context(context_system::instance());
    $PAGE->set_pagelayout('standard');
    $PAGE->set_url($app['url_generator']->generate('enrolledcourses'));
    require_login();

    /*echo $OUTPUT->header();
    $outputtmp = '<h3>hello<h3>';
    echo $OUTPUT->footer();
    return $outputtmp;*/
    //model to get enrolled courses for current user
    $model = new courseattendance();
    $courses = $model->get_enrolled_courses();

    return $app['twig']->render('enrolled_courses.twig');
})->bind('enrolledcourses');

return $app;
