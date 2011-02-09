<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'wpfolio_options', 'WPFolio', 'theme_options_validate' );
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
	
	

	$settings = get_option('wpfolio');
	var_dump($settings);


	#var_ump($options);
	
	foreach($options as $value){
		
		#var_dump($value);
		
		print $value['std'] .'<br>';
		
	}
	

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	
	<?php
	
	
	
	
	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>



		<form method="post" action="options.php">
>
			<?php settings_fields( 'wpfolio_options' ); ?>

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
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
			</p>
		</form>
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

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/