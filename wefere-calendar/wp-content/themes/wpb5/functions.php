<?php
define('WPB5_ASSETS', get_template_directory_uri().'/assets');
define('WPB5_COLOR', '#2b2b40');

require_once 'core/wpb5_bootstrap_navwalker.php';

include 'core/wpb5_acf.php';
include 'core/wpb5_ajax.php';
include 'core/wpb5_inits.php';
include 'core/wpb5_enqueues.php';
include 'core/wpb5_helpers.php';
include 'core/wpb5_shortcodes.php';
include 'core/wpb5_cpt_managment.php';
