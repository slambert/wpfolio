<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">   
<head profile="http://gmpg.org/xfn/11">  

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!-- calling wp_head -->
<?php wp_head(); ?>
<!-- done calling wp_head -->

<!-- calling monthly archives -->
<?php wp_get_archives('type=monthly&format=link'); ?>  
 <?php global $options;
    	foreach ($options as $value) {
   	if (wpfolio_getSetting( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = wpfolio_getSetting( $value['id'] ); } }
   		?>
<!-- done calling monthly archives -->
  
	<title>
	<?php if ( is_page() ) { ?><?php bloginfo('name'); ?><?php wp_title('|'); ?><?php } ?>
	<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
	<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
	<?php if ( is_year() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php the_time('Y'); ?><?php } ?>
	<?php if ( is_tax() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Media: <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?><?php } ?>
	<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php  single_tag_title("Tag Archive:", true); } } ?>
	</title>  


<!-- Superfish Support -->

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" type="text/css" media="screen"/>

<!--
Add if you want to enable the SuperFish Navbar. It will need styling! 
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish-navbar.css" type="text/css" media="screen"/> -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverIntent.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/superfish.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?php echo bloginfo('template_directory') ?>/js/supersubs.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($) {
$('ul.sf-menu').superfish();
});
/* ]]> */
</script>

<!-- end superfish -->

<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie-sucks.css" type="text/css" media="screen" />
<![endif]-->
<?php if (is_page(array('RESUME','Resume','resume','CV','cv'))) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/resume.css" type="text/css" media="screen" />
<?php } else if (is_page("")) { } ?>

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('url');?>/?wp_folio_css=css" rel="stylesheet" type="text/css" />


</head>   

<body <?php body_class(); ?>>  
<div class="container">  
	<div id="header">  
		<div class="headertext">   
		<h1><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a></h1> 		 
		<h4><?php bloginfo('description'); ?></h4>  
		</div><!-- .headertext -->
	</div><!-- #header -->

<!-- MENU  --> 
	<div class="nav">
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<?php if ( has_nav_menu( 'navbar' ) ) { ?>
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'menu_class' => 'sf-menu sf-navbar', 'theme_location' => 'navbar' ) ); 
		} else { ?>
		<ul class="sf-menu">
		<?php wp_list_pages('exclude=&title_li=' );?>
		</ul> <?php
		} ?>
		
	</div><!-- .nav -->
<!-- END MENU -->  



