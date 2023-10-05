<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit540ad2d44bd03335fb4d16e98212dd72
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit540ad2d44bd03335fb4d16e98212dd72', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit540ad2d44bd03335fb4d16e98212dd72', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit540ad2d44bd03335fb4d16e98212dd72::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}