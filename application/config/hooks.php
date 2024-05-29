<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'] = array(
    'class'    => 'AccessControl',
    'function' => 'checkAccess',
    'filename' => 'AccessControl.php',
    'filepath' => 'hooks',
);