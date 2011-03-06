<?php


//...BEGIN THEME OPTIONS...

$themename = "WPFolio";
$shortname = "WPFolio";








$options = array (

//Headline Font
   array( "name" => "Headline Font",
           "id" => $shortname."_headline_font",
           "type" => "select",
           "std" =>"Helvetica",
           "options" => array( // wordpress bug filed: http://core.trac.wordpress.org/ticket/14220 when fixed, put fonts with more than one word in name in quotes.
           "Arial, Helvetica Neue, Helvetica, sans-serif", 
           "Arial Black, sans-serif", 
           "Baskerville, Times, Times New Roman, serif", 
           "Courier New, Courier, monospace, Georgia, Times, Times New Roman, serif", 
           "Gill Sans, Trebuchet MS, Calibri, sans-serif", 
           "Helvetica, Helvetica Neue, Arial, sans-serif", 
           "Impact, Haettenschweiler, Arial Narrow Bold, sans-serif", 
           "Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif", 
           "Palatino, Palatino Linotype, Hoefler Text, Times, Times New Roman, serif", 
           "Times, Times New Roman, Georgia, serif", 
           "Verdana, Tahoma, Geneva, sans-serif"
           )),
           
// font stack reccomendations from: http://unitinteractive.com/blog/2008/06/26/better-css-font-stacks/

//Headline Font Size
	array( "name" => "Headline Font Size",
			"id" => $shortname."_headline_size",
            "std" => "28px",
            "type" => "text"),

//Body Font
	array(  "name" => "Body Font",
            "id" => $shortname."_body_font",
            "type" => "select",
            "std" => "Helvetica",
            "options" => array(
            "Arial, Helvetica Neue, Helvetica, sans-serif", 
            "Courier New, Courier, monospace",
            "Georgia, Palatino, Palatino Linotype, Times, Times New Roman, serif",
            "Gill Sans, Calibri, Trebuchet MS, sans-serif", 
            "Helvetica Neue, Arial, Helvetica, sans-serif", 
            "Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif", 
            "Palatino, Palatino Linotype, Georgia, Times, Times New Roman, serif", 
            "Times, Times New Roman, Georgia, serif", 
            "Verdana, Geneva, Tahoma, sans-serif"  
            )),

// font stack reccomendations from: http://unitinteractive.com/blog/2008/06/26/better-css-font-stacks/

//Body Container Color            
	array(	"name" => "Page Container Color",
            "id" => $shortname."_foreground_color",
            "std" => "ffffff",
			"type" => "color"),        
                     
//Font Color
	array(	"name" => "Font Color",
            "id" => $shortname."_body_color",
            "std" => "000000",
            "type" => "color" ),

//Highlight Font Color
	array(	"name" => "Highlight Font Color",
			"id" => $shortname."_highlight_color",
			"std" => "666666",
			"type" => "color" ),

//Secondary Font Color
   array( "name" => "Secondary Font Color",
           "id" => $shortname."_second_color",
           "std" => "ABABAB",
           "type" => "color"), 

//Blog Title Visibility (replace for image based headers)  
   array(  "name" => "Blog Title Visibility",
            "id" => $shortname."_visible",
            "type" => "select",
            "std" => "visible",
            "options" => array("visible", "hidden")),

//Text Transform (uppercase, lowercase, or capitalize)
   array( "name" => "Text Transform",
           "id" => $shortname."_text_transform",
           "type" => "select",
           "std" =>"none", 
           "options" => array("none", "uppercase", "lowercase", "capitalize" )),

);
//...END THEME OPTIONS...//




/**
 * Gets the value for a setting
 *
 * @param $setting
 * @param $cache
 * @return Mixed
 */
function wpfolio_getSetting ($setting, $cache = TRUE ) {
	global $shortname;
	
	static $_settings = NULL;

	if ( ! $cache ) {
		$_settings = NULL;
	}
	
	if ( $_settings === NULL ) {
		$_settings = get_option ( $shortname, NULL );
	}
	
	if ($_settings === NULL ){
		$return = NULL;
	} else {
		$return = $_settings[$setting];
	}
	return $return;
}



add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting('wpfolio', 'WPFolio', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}



#die;


/**
 * Create arrays for our select and radio options
 */
$font_options = array(
	'0' => array(
		'value' =>	'"Arial, Helvetica Neue, Helvetica, sans-serif" ',
		'label' => __( '"Arial, Helvetica Neue, Helvetica, sans-serif" ' )
	),
	'1' => array(
		'value' =>	'"Arial Black, sans-serif"',
		'label' => __( '"Arial Black, sans-serif"' )
	),
	'2' => array(
		'value' => '"Baskerville, Times, Times New Roman, serif"',
		'label' => __( '"Baskerville, Times, Times New Roman, serif"' )
	),
	'3' => array(
		'value' => '"Courier New, Courier, monospace, Georgia, Times, Times New Roman, serif"',
		'label' => __( '"Courier New, Courier, monospace, Georgia, Times, Times New Roman, serif"' )
	),
	'4' => array(
		'value' => '"Gill Sans, Trebuchet MS, Calibri, sans-serif"',
		'label' => __( '"Gill Sans, Trebuchet MS, Calibri, sans-serif"' )
	),
	'5' => array(
		'value' => '"Helvetica, Helvetica Neue, Arial, sans-serif"',
		'label' => __( '"Helvetica, Helvetica Neue, Arial, sans-serif"' )
	),
	'6' => array(
		'value' => '"Impact, Haettenschweiler, Arial Narrow Bold, sans-serif"',
		'label' => __( '"Impact, Haettenschweiler, Arial Narrow Bold, sans-serif"' )
	),
	'7' => array(
		'value' => '"Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif"',
		'label' => __( '"Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif"' )
	),
	
	'8' => array(
		'value' => '"Palatino, Palatino Linotype, Hoefler Text, Times, Times New Roman, serif"',
		'label' => __( '"Palatino, Palatino Linotype, Hoefler Text, Times, Times New Roman, serif"' )
	),
	
	'9' => array(
		'value' => '"Times, Times New Roman, Georgia, serif"',
		'label' => __( '"Times, Times New Roman, Georgia, serif"' )
	),
	
	'10' => array(
		'value' => '"Verdana, Tahoma, Geneva, sans-serif"',
		'label' => __( '"Verdana, Tahoma, Geneva, sans-serif"' )
	)
);


$color_option = array(	
		"name" => "Page Container Color",
        "id" => "WPFolio_foreground_color",
        "std" => "ffffff",
		"type" => "color");



/**
 * Create the options page
 */






function theme_options_do_page() {
	global $font_options, $radio_options, $options;
	
	

	
	

	

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	
	<?php
	
	
	
	
	?>
	<div class="wrap">
	
		<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jscolor/jscolor.js"></script>
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'wpfolio' ); ?></strong></p></div>
		<?php endif; ?>



		<form method="post" action="options.php">

			<?php settings_fields( 'wpfolio' ); ?>

			<p>Remember to set up <a href="<?php echo site_url(); ?>/wp-admin/widgets.php">widgets</a>. WPFolio includes 4 widget areas and 2 custom widgets for changing your navigation, including licensing information, and adding a link to your RSS feed.  Also, please check the <a href="http://dev.eyebeam.org/projects/wpfolio/wiki/WPFolio" target="_blank"> WPFolio site</a> for theme updates, documentation, and more.</p>


			<table class="optiontable">

				
			<?php foreach ($options as $value) { 
				
				
				
		    if ($value['type'] == "text") { ?>
		        <tr valign="top"> 
		    		<th scope="row"><?php echo $value['name']; ?>:</th>
		    		<td>
		        		<input name="WPFolio[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( wpfolio_getSetting( $value['id'] ) === NULL ) { echo $value['std']; } else { echo wpfolio_getSetting( $value['id'] );  } ?>" />
		    		</td>
				</tr>



			<?php } elseif ($value['type'] == "select") { ?>

				<tr valign="top"> 
		        	<th scope="row"><?php echo $value['name']; ?>:</th>
		        	<td>
		            	<select name="WPFolio[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>">
		                <?php foreach ($value['options'] as $option) { ?>
		                <option<?php if ( wpfolio_getSetting( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
		                <?php } ?>
		            	</select>
		        	</td>
		    	</tr>

			<?php } elseif ($value['type'] == "color") { ?><!--if the option needs a color picker, use js color picker-->
				<!--Code taken from Allan Cole's Autofocus Plus Theme - thanks! -->

				<tr valign="top"> 
		        	<th scope="row"><?php echo $value['name']; ?>:</th>
		        	<td>

						<input type="<?php echo $value['type']; ?>" name="WPFolio[<?php echo $value['id']; ?>]" id="<?php echo $value['id']; ?>" value="<?php if ( wpfolio_getSetting( $value['id'] ) === NULL )  { echo $value['std']; } else { echo wpfolio_getSetting( $value['id'] ); } ?>" class="color {pickerPosition:'right'}" />

		        	</td>
		    	</tr>

		<?php } }?>
		</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wpfolio' ); ?>" />
			</p>
		</form>
		
		
		<h2>WPFolio Community</h2>

		<h3>Support Site</h3>
		<p>If you haven't been already, check out the <a href="http://wpfolio.visitsteve.com">WPFolio Wiki</a> for help.</p>

		<h3>Sign up for email updates</h3>
		<p>Receive emails when new versions of WPFolio are available and other news to help you with updating. Your information will never be shared. Messages will be sent around 1-2 times per month, often less.</p>

			<form action="http://scripts.dreamhost.com/add_list.cgi" method="post"> 
			<input name="list" type="hidden" value="update" />
			<input name="domain" type="hidden" value="http://wpfolio.visitsteve.com" />
			<input name="url" type="hidden" />
			<input name="unsuburl" type="hidden" />
			<input name="alreadyonurl" type="hidden" />
			<input name="notonurl" type="hidden" />
			<input name="invalidurl" type="hidden" />
			<input name="emailconfirmurl" type="hidden" />
			<input name="emailit" type="hidden" value="1" />
			Name: <input name="name" /> 
			E-mail: <input name="email" /> <br />
			<input name="submit" type="submit" value="Join Our Announcement List" />
			<input name="unsub" type="submit" value="Unsubscribe" />
			</form>
		</p>

		<h3>Donate to support WPFolio and Free Software</h3>

		<p>WPFolio is a labor of love. We make it to help you.</p>

		<p>WPFolio took us <em>a lot</em> of time to build, develop, and document. Did our project save you time? Save you the costs of a designer or webmaster? Would you have otherwise needed a tutor? If you met us in person, would you buy us a beer? A dinner? Would you like to see new features implemented? Please consider making a donation based on what you think WPFolio was worth to you. Although we'll likely never make back what we've put into this, we can use your donations to offset costs of production.</p>

		<p>WPFolio is Free Software under the <a href="http://www.gnu.org/licenses/quick-guide-gplv3.html">GPLv3</a>. Our <a href="http://wpfolio.visitsteve.com">WPFolio Wiki</a> includes instructions to help you make the most of the WPFolio theme. You are free to modify, share, and distribute WPFolio however you like. We do all this because we want artists to have great websites using the best, free and open source software available. You can contribute by helping with the <a href="http://github.com/slambert/WPFolio/">development of the theme</a>, or by donating. </p>

		<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" type="hidden" value="_s-xclick" /> <input name="hosted_button_id" type="hidden" value="ZMXNTHG3LHX8Q" /> <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" type="image" /> </form>

		<p>Thanks.</p>
		
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $font_options, $radio_options;

		

	return $input;
}




function check_oldOptions(){
	
	
	$old_options = array();
	
	if(get_option('WPFolio_headline_font')){
		
		$old_options['WPFolio_headline_font'] = get_option('WPFolio_headline_font');
		
		delete_option('WPFolio_headline_font');
		
		
	}
	
	if(get_option('WPFolio_headline_size')){
		
		
		$old_options['WPFolio_headline_size'] = get_option('WPFolio_headline_size');
		
		delete_option('WPFolio_headline_size');
		
	}
	
	if(get_option('WPFolio_body_font')){
		
		$old_options['WPFolio_body_font'] = get_option('WPFolio_body_font');
		
		delete_option('WPFolio_body_font');
	}
	
	if(get_option('WPFolio_foreground_color')){
		
		$old_options['WPFolio_foreground_color'] = get_option('WPFolio_foreground_color');
		
		delete_option('WPFolio_foreground_color');
		
	}
	
	if(get_option('WPFolio_foreground_color')){
		
		$old_options['WPFolio_foreground_color'] = get_option('WPFolio_foreground_color');
		
		delete_option('WPFolio_foreground_color');
	}
	
	if(get_option('WPFolio_highlight_color')){
		
		$old_options['WPFolio_highlight_color'] = get_option('WPFolio_highlight_color');
		
		delete_option('WPFolio_highlight_color');
		
	}
	
	if(get_option('WPFolio_highlight_color')){
		
		$old_options['WPFolio_highlight_color'] = get_option('WPFolio_highlight_color');
		
		delete_option('WPFolio_highlight_color');
		
	}
	
	if(get_option('WPFolio_body_color')){
		
		$old_options['WPFolio_body_color'] = get_option('WPFolio_body_color');
		
		delete_option('WPFolio_body_color');
		
	}
	
	if(get_option('WPFolio_second_color')){
		
		$old_options['WPFolio_second_color'] = get_option('WPFolio_second_color');
		
		delete_option('WPFolio_second_color');
		
	}
	
	if(get_option('WPFolio_visible')){
		
		$old_options['WPFolio_visible'] = get_option('WPFolio_visible');
		
		delete_option('WPFolio_visible');
	}
	
	if(get_option('WPFolio_text_transform')){
		
		$old_options['WPFolio_text_transform'] = get_option('WPFolio_text_transform');
		
		delete_option('WPFolio_text_transform');
		
	}
	
	
	#END THE OLD OPTIONS ARRAY
	

	if(!empty($old_options)){
		
		update_option('wpfolio', $old_options);
		
		
		
	}
	
	
	
	
	
}

add_action('admin_init', 'check_oldOptions');

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/