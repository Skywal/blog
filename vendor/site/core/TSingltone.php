<?php

namespace site;

/**
 * невеличкий кусок коду котрий можна копіпастити
 * Trait TSingltone
 * @package site
 */
trait TSingltone
{
    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}