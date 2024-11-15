<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88884181b7247b3180aca3f606584bfb
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88884181b7247b3180aca3f606584bfb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88884181b7247b3180aca3f606584bfb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88884181b7247b3180aca3f606584bfb::$classMap;

        }, null, ClassLoader::class);
    }
}
