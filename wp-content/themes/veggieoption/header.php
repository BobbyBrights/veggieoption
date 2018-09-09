<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( is_front_page() || is_home() ) : ?>

<div class="hfeed site homepage" id="page">

<?php else : ?>
<div class="hfeed site" id="page">

<?php endif; ?>

<nav class="navbar navbar-expand-lg fixed-top">
	<div class="container"> 
<?php if ( ! has_custom_logo() ) { ?>


<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>


<?php } else {
if ( function_exists( 'the_custom_logo' ) ) {

 if ( is_front_page() || is_home() ) : 

	the_custom_logo();
	?>
<?php else : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" rel="home" itemprop="url" target="_self">
		<img width="196" height="35" src="<?php	print_r(get_theme_mod( 'veggieoption_secondary_logo' ));?>" class="img-fluid" alt="Veggie Option" itemprop="logo">
	</a>
	
<?php endif; ?>



<?php
}
} ?><!-- end custom logo -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarSupportedContent',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
</nav>

</div>



	<!-- ******************* The Navbar Area ******************* -->
