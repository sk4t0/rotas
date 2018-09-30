<?php


use League\Flysystem\Filesystem;

$adapter = new \League\Flysystem\AwsS3v3\AwsS3Adapter(new \Aws\S3\S3Client(
    [
        'version'     => 'latest',
        'region'      => env('FS_REGION'),
        'credentials' => [
            'key'    => env('FS_KEY'),
            'secret' => env('FS_SECRET')
        ]
    ]),
    env('FS_BUCKET'),
    ""
);

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */
    'dir' => ['files'],

    /*
    |--------------------------------------------------------------------------
    | Filesystem disks (Flysytem)
    |--------------------------------------------------------------------------
    |
    | Define an array of Filesystem disks, which use Flysystem.
    | You can set extra options, example:
    |
    | 'my-disk' => [
    |        'URL' => url('to/disk'),
    |        'alias' => 'Local storage',
    |    ]
    */
    'disks' => [

//        'local' => [
//            'driver' => 'local',
//            'root' => storage_path('app'),
//        ],
//
//        'public' => [
//            'driver' => 'local',
//            'root' => storage_path('app/public'),
//            'visibility' => 'public',
//        ],
//
        's3' => [
            'driver' => 'Flysystem',
            'adapter' => $adapter,
            'alias' => 'IVE',
            'path' => '/'
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the elFinder routes.
    |
    */

    'route' => [
        'prefix' => 'file-manager',
        'middleware' => null, //Set to null to disable middleware filter
    ],

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots' => [
        [
            'driver' => 'Flysystem',
            'filesystem' => new Filesystem($adapter),
            'alias' => 'Home',
            'path' => 'users'
        ],
        [
            'driver' => 'Flysystem',
            'filesystem' => new Filesystem($adapter),
            'alias' => 'Shared',
            'path' => 'shared'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */

    'options' => array(),
    
    /*
    |--------------------------------------------------------------------------
    | Root Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with every root by default.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1#root-options
    |
    */
    'root_options' => array(

    ),

);
