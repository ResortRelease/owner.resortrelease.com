<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf21881014c84bedb1f1fe835298ee848
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Mautic\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Mautic\\' => 
        array (
            0 => __DIR__ . '/..' . '/mautic/api-library/lib',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf21881014c84bedb1f1fe835298ee848::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf21881014c84bedb1f1fe835298ee848::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf21881014c84bedb1f1fe835298ee848::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
