<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit818efbe6aaee239768175cd0717af62c
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'site\\' => 5,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'site\\' => 
        array (
            0 => __DIR__ . '/..' . '/site/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit818efbe6aaee239768175cd0717af62c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit818efbe6aaee239768175cd0717af62c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
