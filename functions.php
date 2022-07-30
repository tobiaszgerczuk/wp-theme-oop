<?php
/**
 * WLC Starter
 *
 * @package WLC-theme
 * @author  Mateusz Major
 * @link    https://WLC.pl/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

require_once __DIR__ . '/inc/core/autoloader.php';
require_once __DIR__ . '/inc/core/helpers.php';

$setup = new WLC\Core\Theme();
$setup->hooks();
$setup->class_loader(
	array(
		'WLC\Blocks\Content_columns',
		'WLC\Blocks\Page_Header',
		'WLC\Blocks\Facts',
		'WLC\Blocks\Call_To_Action',
		'WLC\Blocks\Team',
		'WLC\Blocks\Courses_Overview',
		'WLC\Blocks\Featured_Courses',
		'WLC\Blocks\Card_Grid',
		'WLC\Blocks\Faq',
		'WLC\Blocks\Popup',
		'WLC\Blocks\Section',
		'WLC\Blocks\Submenu',
		'WLC\Blocks\Content_Image_Video',
		'WLC\Blocks\Form',
		'WLC\Blocks\Map',
		'WLC\Blocks\Quotes',
		'WLC\Blocks\Jobs',
		'WLC\Blocks\Maats_Overview',
		'WLC\Components\Header',
		'WLC\Components\Footer',
		'WLC\Components\Loop_Posts',
		'WLC\Views\Blog',
		'WLC\Views\Single_Post',
		'WLC\Views\Home_Page',
	)
);
