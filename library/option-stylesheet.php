<?php 

add_action('template_redirect', 'wp_folio_css');





function wp_folio_css(){
	

    
	global  $settings;
	    
				if (array_key_exists('wp_folio_css', $_REQUEST)){
    				header('Content-Type: text/css');
					?>
		
		body, #content, .title, .nav, .widgettitle { 
			font-family : <?php echo $settings['WPFolio_body_font']; ?> ;
			}
		
		body, .container, .container p, #content, div.notable-post {
			color: #<?php echo $settings['WPFolio_body_color']; ?> ;
			
			}
		
		h1,h2,h3,h4,h5,h6 {
			font-family: <?php echo $settings['WPFolio_headline_font']; ?>;
			}
		h1 { 
			font-size: <?php echo $settings['WPFolio_headline_size']; ?>;
			}
			
		h1,h2,h3, .headertext h1 a, a:link, a:active, a:hover, .sf-menu li:hover, .sf-menu li.sfHover, .sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active, 			  div.notable-post h3 a, link, 	div.notable-post a:hover, #links, #links h1, #links h2, #links a:hover, div.prevnext a:hover {
			
			color: #<?php echo $settings['WPFolio_highlight_color']; ?>; 
			
			}
			
		h4, .sf-menu a, .sf-menu a:visited, div.notable-post a, #sidebar h2.widgettitle, #links ul, #links ul li, #links ul li ul, links a {
			
			color: #<?php echo $settings['WPFolio_second_color']; ?>;
			
			}
		.headertext {
			
			visibility:<?php echo $settings['WPFolio_visible']; ?>; 
			
			}
		.container, .sf-menu li a, .sf-menu li li, .sf-menu li li li{
			
			background-color: #<?php echo $settings['WPFolio_foreground_color']; ?>;
			
			}
		.nav, .widgettitle, div.prevnext{
			
			text-transform:<?php echo $settings['WPFolio_text_transform']; ?>;
			
			}
		div.footer {
		
		background-color: #<?php echo $settings['WPFolio_foreground_color']; ?>;
		
		border-top: solid 1px #<?php echo get_theme_mod( 'background_color' ); ?>;
		
		}
		.sf-menu li li, .sf-menu li li li {
	
		border-top: solid 1px #<?php echo get_theme_mod( 'background_color' ); ?>;
	
		border-left: solid 1px #<?php echo get_theme_mod( 'background_color' ); ?>;
		
		}
	
	<?php
        
		exit;  //This stops WP from loading any further
    }
}

?>