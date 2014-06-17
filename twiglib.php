<?php

/* 
 * Contains all essential moodle functions that could be used within twig templates
 */

defined('MOODLE_INTERNAL') || die;

//wrapper around printing moodle header: $OUTPUT->header()
$function = new Twig_SimpleFunction('header', function(){
    global $PAGE, $OUTPUT;
    $PAGE->set_context(context_system::instance());
    return $OUTPUT->header();
});
$app['twig']->addfunction($function);

//wrapper aroung printing moodle footer: $OUTPUT->footer()
$function = new Twig_SimpleFunction('footer', function(){
    global $OUTPUT;
    return $OUTPUT->footer();
});
$app['twig']->addfunction($function);

//wrapper around print language strings: get_string()
$function = new Twig_SimpleFunction('lang',
    function($identifier, $component= '',$a = null){
        return s(get_string($identifier, $component, $a));
});
$app['twig']->addfunction($function);

