<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = function() {
    $dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
    $dotenv->load();

    Phpfastcache\CacheManager::setDefaultConfig(new Phpfastcache\Config\ConfigurationOption([
        'path' => FCPATH . 'database/cache',
    ]));

};

// compress output
$hook['display_override'][] = array(
    'class' => '',
    'function' => 'compress',
    'filename' => 'Compress.php',
    'filepath' => 'hooks'
);
