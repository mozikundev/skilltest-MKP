<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit540ad2d44bd03335fb4d16e98212dd72
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit540ad2d44bd03335fb4d16e98212dd72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit540ad2d44bd03335fb4d16e98212dd72::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit540ad2d44bd03335fb4d16e98212dd72::$classMap;

        }, null, ClassLoader::class);
    }
}
