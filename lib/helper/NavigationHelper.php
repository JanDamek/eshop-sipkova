<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavigationHelper
 *
 * @author damek
 */
class NavigationHelper {

    //put your code here
            private static
            $instance = null,
            $page = null,
            $setting = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new NavigationHelper;
        }
        return self::$instance;
    }

    public static function getSetting() {
        if (self::$setting) {
            return self::$setting;
        } else {
            self::$setting = Doctrine::getTable('Setting')->findOneById(1);
            return self::$setting;
        }
    }

}