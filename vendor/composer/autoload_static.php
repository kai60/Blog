<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8be0f7dda473077df501c1f8d8ac39ea
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JasonGrimes' => 
            array (
                0 => __DIR__ . '/..' . '/jasongrimes/paginator/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit8be0f7dda473077df501c1f8d8ac39ea::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}