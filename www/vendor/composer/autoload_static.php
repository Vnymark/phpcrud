<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit873c2ab1f94f36b2a84716e59127cbdf
{
    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'classes' => 
            array (
                0 => __DIR__ . '/../..' . '/includes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit873c2ab1f94f36b2a84716e59127cbdf::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
