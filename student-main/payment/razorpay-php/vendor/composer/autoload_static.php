<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88a756a8aa3dfe2417434cf51af43ccc
{
    public static $files = array (
        'ec6621a96a72a21b0a4d11bef92c2ee9' => __DIR__ . '/..' . '/raveren/kint/Sage.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Razorpay\\Tests\\' => 15,
            'Razorpay\\Api\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Razorpay\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Razorpay\\Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88a756a8aa3dfe2417434cf51af43ccc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88a756a8aa3dfe2417434cf51af43ccc::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit88a756a8aa3dfe2417434cf51af43ccc::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit88a756a8aa3dfe2417434cf51af43ccc::$classMap;

        }, null, ClassLoader::class);
    }
}
