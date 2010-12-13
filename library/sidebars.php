<?php

/* Sidebars */
	    
	if ( function_exists('register_sidebar') )
	    register_sidebar(array(
		'name'=>'sidebar'
		));
	    
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer Right',
	'id' => 'footer_right',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '',
	'after_title' => '',
	));
	
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer Left',
	'id' => 'footer_left',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '',
	'after_title' => '',
	));
	
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer Center',
	'id' => 'footer_center',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '',
	'after_title' => '',
	));
	
/* END Sidebars */

?>