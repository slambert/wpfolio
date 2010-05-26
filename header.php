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
	<title>
	<?php if ( is_page() ) { ?><?php bloginfo('name'); ?><?php wp_title('|'); ?><?php } ?>
	<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
	<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
	<?php if ( is_year() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php the_time('Y'); ?><?php } ?>
	<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php  single_tag_title("Tag Archive:", true); } } ?>
	</title>  

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />   

<!-- leave this for stats -->   
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />  
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />    

<?php wp_get_archives('type=monthly&format=link'); ?>  
 <?php global $options;
    	foreach ($options as $value) {
   	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
   		?>

<?php //for support of js threaded comments
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
?>

<?php wp_head(); ?> 

</head>   

<body>   
<div class="container">  
	<div id="header">  
		<div class="headertext">   
		<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1> 		 
		<h4><?php bloginfo('description'); ?></h4>  
		</div><!-- .headertext -->
	</div><!-- #header -->

<!-- MENU  --> 
	<div class="nav">
		<ul>

			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('navbar') ) : else : ?> 

				<ul>
				<?php wp_list_categories('exclude=&title_li=&current_category=1,' );?>
				<?php wp_get_archives('type=yearly'); ?> 
				<?php wp_list_pages('exclude=&title_li=' );?>
				</ul>
			<?php endif; ?>
		</ul>

	</div><!-- .nav -->
<!-- END MENU -->  


<!--
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('menubar') ) : else : ?> <?php endif; ?>
-->