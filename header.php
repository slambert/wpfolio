<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">   
<head profile="http://gmpg.org/xfn/11">  

 
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />    

<title>
<?php bloginfo('name'); ?>  <?php if ( is_single() ) { ?> &raquo; Archive <?php } ?>  <?php wp_title(); ?>
</title>  
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
 <style type="text/css" media="all">
 /* CSS inserted by theme options */
	body { 
		font-family : <?php echo $WPFolio_body_font; ?>;
		background-color: #<?php echo $WPFolio_body_backgroundcolor; ?>;
		color: #<?php echo $WPFolio_body_color; ?>;}
	h1 { 
		font-family: <?php echo $WPFolio_headline_font; ?>;
		font-size: <?php echo $WPFolio_headline_size; ?>;}
	h2 {
		color: #<?php $WPFolio_highlight_color; ?>; }
	h3 {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	h4 {
		color: #<?php echo $WPFolio_second_color; ?>;}
	.header h4 {
		font-family: <?php echo $WPFolio_headline_font; ?>;}
	.headertext {
		visibility:<?php echo$WPFolio_visible; ?>; }
	.headertext h1 a {
		color: #<?php echo $WPFolio_highlight_color;?>; }
	.container {
		background-color: #<?php echo $WPFolio_foreground_color; ?>;
		color: #<?php echo $WPFolio_body_color; ?>;}
	.container p {
		color: #<?php echo $WPFolio_body_color; ?>; }
	a:active  {
		color: #<?php echo $WPFolio_highlight_color; ?>; }
	a:hover  {
		color: #<?php echo $WPFolio_highlight_color; ?>; }
	.pages {
		font-family : <?php echo $WPFolio_body_font; ?>; }
	.title {
		font-family : <?php echo $WPFolio_body_font; ?>;}
	.nav, .widgettitle {
		font-family : <?php echo $WPFolio_headline_font ?>;
		text-transform:<?php echo $WPFolio_text_transform ?>;}
	.nav a:active {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	.nav a:hover {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	div.container h2 {
		color: #<?php echo $WPFolio_highlight_color; ?>; }
	.notable-post {
		color: #<?php echo $WPFolio_body_color; ?>;}
	.notable-post h3 a, link {
		color: #<?php echo $WPFolio_highlight_color; ?>; }
	.notable-post a {
		color: #<?php echo $WPFolio_second_color; ?>;}
	.notable-post a:hover {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	.pages h2 {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	.pages {
		color: #<?php echo $WPFolio_body_color; ?>; }
	#links{
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	#links h1, h2 {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	#links ul {
		color: #<?php echo $WPFolio_second_color; ?>;}
	#links ul li {
		color: #<?php echo $WPFolio_second_color; ?>;}
	#links ul li ul {
		color: #<?php echo $WPFolio_second_color; ?>;}
	#links a {
		color: #<?php echo $WPFolio_second_color; ?>;}
	#links a:hover {
		color: #<?php echo $WPFolio_highlight_color; ?>;}
	.prevnext{
		text-transform:<?php echo $WPFolio_text_transform ?>;}
	.prevnext a:hover {
		background-color: #<?php echo $WPFolio_highlight_color; ?>;}
	.footer {
	background-color: #<?php echo $WPFolio_body_backgroundcolor; ?>;}
	}
 </style>

<?php wp_head(); ?> 

</head>   

<body>   
<div class="container">  
<div class="header">  
<div class="headertext">   
<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1> 		 
<h4><?php bloginfo('description'); ?></h4>  
</div><!-- .headertext -->
</div><!-- .header -->

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