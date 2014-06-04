Course Attendance Silex Plugin

Description:

The plugin uses php microframework- Silex(http://silex.sensiolabs.org/) and templating engine- Twig(http://twig.sensiolabs.org/)

Install Silex on Windows
- Download Silex(.zip or .tgz)from here - http://silex.sensiolabs.org/download
- Copy /silex/vendor directory into $CFG->dirroot/
- Edit $CFG->dirroot/composer.json as below,
===============
{"require": {
        "silex/silex": "~1.2",
}}            
===============

Install Twig on Windows with XAMPP
- 
- index.php : redirects to app.php 
- app.php : contains modular functions to perform different actions
- twiglib.php : 