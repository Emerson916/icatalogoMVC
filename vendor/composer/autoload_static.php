<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit526ff228cca2ec37802f7df01b5c8f8b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit526ff228cca2ec37802f7df01b5c8f8b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit526ff228cca2ec37802f7df01b5c8f8b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit526ff228cca2ec37802f7df01b5c8f8b::$classMap;

        }, null, ClassLoader::class);
    }
}
