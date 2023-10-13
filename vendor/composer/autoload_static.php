<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e2963c5e1d1f722efbc889b69442ad0
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Reborn\\LaravelSpeech\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Reborn\\LaravelSpeech\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e2963c5e1d1f722efbc889b69442ad0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e2963c5e1d1f722efbc889b69442ad0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1e2963c5e1d1f722efbc889b69442ad0::$classMap;

        }, null, ClassLoader::class);
    }
}