<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ad18ccd8ea9c097a6bcc56e1b3463fd
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mpdf\\QrCode\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mpdf\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/qrcode/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ad18ccd8ea9c097a6bcc56e1b3463fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ad18ccd8ea9c097a6bcc56e1b3463fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ad18ccd8ea9c097a6bcc56e1b3463fd::$classMap;

        }, null, ClassLoader::class);
    }
}