<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6cc91ca05ad9486689d4191e30d9b9bb
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

        spl_autoload_register(array('ComposerAutoloaderInit6cc91ca05ad9486689d4191e30d9b9bb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6cc91ca05ad9486689d4191e30d9b9bb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6cc91ca05ad9486689d4191e30d9b9bb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
