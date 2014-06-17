<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nivedita
 * Date: 07/06/14
 * Time: 20:22
 * To change this template use File | Settings | File Templates.
 */

defined('MOODLE_INTERNAL') || die;

/*$page = new admin_externalpage('courseattendance', new lang_string('pluginname','local_courseattendancesilex'), "{$CFG->wwwroot}/local/courseattendancesilex/index.php");
$ADMIN->add('root', $page);*/
if ($hassiteconfig) {
    // Needs this condition or there is error on login page.
    $ADMIN->add('root', new admin_category('local', new lang_string('local')));
    $ADMIN->add('local', new admin_externalpage('courseattendancesilex',get_string('pluginname', 'local_courseattendancesilex'),
                                        new moodle_url('/local/courseattendancesilex/index.php')));
}