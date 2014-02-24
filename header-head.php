<?php
/**
 * Part of the Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="fb-root">
 *
 * @package Flint\Pageroll
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><html <?php language_attributes(); ?> class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $sparks_options = get_option('sparks_options');

if (isset($sparks_options['fb_app_id'])) {
	$fb_app_id = $sparks_options["fb_app_id"];
}
else {
	$fb_app_id = '';
} ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $fb_app_id; ?>";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>