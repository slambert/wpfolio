<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">   
<head profile="http://gmpg.org/xfn/11">  
 
<!--
This site is built using Wordpress with
 _       ______  ______      ___     
| |     / / __ \/ ____/___  / (_)___ 
| | /| / / /_/ / /_  / __ \/ / / __ \
| |/ |/ / ____/ __/ / /_/ / / / /_/ /
|__/|__/_/   /_/    \____/_/_/\____/ 
The free Wordpress Theme for Artists
Free Software under the GPLv3 
http://wpfolio.visitsteve.com/wiki
-->   

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!-- calling wp_head -->
<?php wp_head(); ?> 
<!-- done calling wp_head -->
<!-- calling monthly archives -->
<?php wp_get_archives('type=monthly&format=link'); ?>  
 <?php global $options;
    	foreach ($options as $value) {
   	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
   		?>
<!-- done calling monthly archives -->
  
	<title>
	<?php if ( is_page() ) { ?><?php bloginfo('name'); ?><?php wp_title('|'); ?><?php } ?>
	<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
	<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
	<?php if ( is_year() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php the_time('Y'); ?><?php } ?>
	<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php  single_tag_title("Tag Archive:", true); } } ?>
	</title>  

 <style type="text/css" media="all">
 /* CSS inserted by theme options */
	body, #content, .title, .nav, .widgettitle { 
		font-family : <?php echo $WPFolio_body_font; ?>;
		}
	body, .container, .container p, #content, div.notable-post {
		color: #<?php echo $WPFolio_body_color; ?>;
		}
	h1,h2,h3,h4,h5,h6 {
		font-family: <?php echo $WPFolio_headline_font; ?>;}
	h1 { 
		font-size: <?php echo $WPFolio_headline_size; ?>;}
	h1,h2,h3, .headertext h1 a, a:link, a:active, a:hover, .sf-menu li:hover, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active, div.notable-post h3 a, link, 	div.notable-post a:hover, #links, #links h1, #links h2, #links a:hover, div.prevnext a:hover {
		color: #<?php echo $WPFolio_highlight_color; ?>; }
	h4, .sf-menu a, .sf-menu a:visited, div.notable-post a, #sidebar h2.widgettitle, #links ul, #links ul li, #links ul li ul, links a {
		color: #<?php echo $WPFolio_second_color; ?>;}
	.headertext {
		visibility:<?php echo$WPFolio_visible; ?>; }
	.container, .sf-menu li {
		background-color: #<?php echo $WPFolio_foreground_color; ?>;}
	.nav, .widgettitle, div.prevnext{
		text-transform:<?php echo $WPFolio_text_transform ?>;}
	div.footer {
	background-color: #<?php echo $WPFolio_foreground_color; ?>;
	border-top: solid 1px #<?php echo get_theme_mod( 'background_color' ); ?>;}
	.sf-menu { #<?php echo get_theme_mod( 'background_color' ); ?>;}
 </style>

<!-- Superfish Support -->

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" type="text/css" media="screen"/>
<!--
Add if you want to enable the SuperFish Navbar. It will need styling! 
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish-navbar.css" type="text/css" media="screen"/> -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverIntent.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/superfish.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?php echo bloginfo('template_directory') ?>/js/supersubs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('ul.sf-menu').superfish();
});
</script>

<!-- end superfish -->



</head>   

<body <?php body_class(); ?>>  
<div class="container">  
	<div id="header">  
		<div class="headertext">   
		<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1> 		 
		<h4><?php bloginfo('description'); ?></h4>  
		</div><!-- .headertext -->
	</div><!-- #header -->

<!-- MENU  --> 
	<div class="nav">
		<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
		<?php if ( has_nav_menu( 'navbar' ) ) { ?>
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'menu_class' => 'sf-menu sf-navbar', 'theme_location' => 'navbar' ) ); 
		} else { ?>
		<?php wp_page_menu( 'depth=1&show_home=Home&menu_class=default-navbar' );
		} ?>
		
	</div><!-- .nav -->
<!-- END MENU -->  

