<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Required meta tags -->
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/favicon.svg" />

	<title><?php echo wp_get_document_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>