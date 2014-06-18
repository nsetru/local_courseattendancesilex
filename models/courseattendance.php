<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nivedita
 * Date: 17/06/14
 * Time: 22:46
 * To change this template use File | Settings | File Templates.
 */
defined('MOODLE_INTERNAL')||die;

class courseattendance{
    public function __construct(){

    }
    public function get_enrolled_courses(){
        global $USER, $DB;

        $sql = "SELECT c.fullname,c.startdate
                FROM {course} c
                INNER JOIN {context} ctx ON c.id=ctx.instanceid
                INNER JOIN {role_assignments} ra ON ctx.id=ra.contextid
                INNER JOIN {role} r ON ra.roleid=r.id
                WHERE ra.userid=? and (r.shortname='teacher' or r.shortname='editingteacher')";
        //$courses = $DB->get_records_sql($sql, array($USER->id));
        return $DB->get_records_sql($sql, array($USER->id));
    }
}