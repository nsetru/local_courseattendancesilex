Course Attendance Silex Plugin

Description:

The plugin uses php microframework- Silex(http://silex.sensiolabs.org/) and templating engine- Twig(http://twig.sensiolabs.org/)

**************** Silex *****************************

Install Silex on Windows
- Download Silex(.zip or .tgz)from here - http://silex.sensiolabs.org/download
- Copy /silex/vendor directory into $CFG->dirroot/
- Edit $CFG->dirroot/composer.json as below,
===============
{"require": {
        "silex/silex": "~1.2",
}}            
===============

***************************************************


************* Twig **********************************
http://twig.sensiolabs.org/doc/installation.html

Install Twig on Windows with XAMPP
- http://twig.sensiolabs.org/doc/installation.html
--- Install using PEAR ----
- Install PEAR
- pear channel-discover pear.twig-project.org
- pear install twig/Twig

--- Install Twig using composer -----
1) Install Composer in your project:
curl -s http://getcomposer.org/installer | php

2) Create a composer.json file in your project root:
{
    "require": {
        "twig/twig": "1.*"
    }
}

3) Install via Composer
php composer.phar install

***************************************************

************ Functionality Description ************
- Site Administration->local->Course Attendance
***************************************************
- index.php : redirects to app.php 
- app.php : contains modular functions to perform different actions
- twiglib.php : 