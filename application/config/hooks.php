<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller'][] = array(
    'class'    => 'QueryLogger',
    'function' => 'log_queries',
    'filename' => 'QueryLogger.php',
    'filepath' => 'hooks'
);
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
