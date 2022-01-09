<?php

/**
 * bilent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bilent
 */
define('BILENT_THEME_URI', get_template_directory_uri());
define('BILENT_THEME_DRI', get_template_directory());
define('BILENT_IMG_URL', BILENT_THEME_URI . '/assets/images/');
define('BILENT_CSS_URL', BILENT_THEME_URI . '/assets/css/');
define('BILENT_JS_URL', BILENT_THEME_URI . '/assets/js/');
define('BILENT_FONTS_URL', BILENT_THEME_URI . '/assets/fonts/');
define('BILENT_FRAMEWORK_DRI', BILENT_THEME_DRI . '/framework/');

require_once BILENT_FRAMEWORK_DRI . 'tgm/class-tgm-plugin-activation.php';
require_once BILENT_FRAMEWORK_DRI . 'tgm/config-tgm.php';
require_once BILENT_FRAMEWORK_DRI . 'helper-actions.php';
require_once BILENT_FRAMEWORK_DRI . 'helper-funtions.php';
require_once BILENT_FRAMEWORK_DRI . 'scripts-loading.php';
require_once BILENT_FRAMEWORK_DRI . 'redux-config.php';
require_once BILENT_FRAMEWORK_DRI . 'breadcrumb.php';
require_once BILENT_FRAMEWORK_DRI . 'woocommerce-functions.php';
