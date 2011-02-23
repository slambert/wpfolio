<?php  


// Shortcode to add wide margins to a post page - works as is, but is applied in post lists

function wide_margins_shortcode ($atts, $content = null) {
	return '<div class="widemargins">' . do_shortcode($content) . '</div>';
}
add_shortcode("wide", "wide_margins_shortcode");

// Importing extra objects

// Path constants
define('THEMELIB', get_template_directory() . '/library');

// Load widgets
require_once(THEMELIB . '/widgets.php');

// Load registered sidebars
require_once(THEMELIB . '/sidebars.php');

// Load options stylesheet
require_once(THEMELIB . '/option-stylesheet.php');

// Done importing

////////////
// IMAGES //
////////////

// This sets the Large image size to 900px

if ( ! isset( $content_width ) ) 
	$content_width = 900;

// Remove inline styles on gallery shortcode

function wpfolio_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
	}
add_filter( 'gallery_style', 'wpfolio_remove_gallery_css' );

// END - Remove inline styles on gallery shortcode


// Thumbnail Function - this creates a default thumbnail if one is specified
function get_thumb ($post_ID){
    $thumbargs = array(
    'post_type' => 'attachment',
    'numberposts' => 1,
    'post_status' => null,
    'post_parent' => $post_ID
    );
    $thumb = get_posts($thumbargs);
    if ($thumb) {
        return wp_get_attachment_image($thumb[0]->ID);
    }
} 

// This adds support for post thumbnails of 150px square
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150,true );

// END - Thumbnail Function



/////////////////////
// ADDING FEATURES //
/////////////////////


// Adding some WP 3.0 features

// This theme uses wp_nav_menu()
add_theme_support( 'menus' );

register_nav_menus( array(
	'navbar' => __( 'Top Navigation Bar', 'navbar' ),
) );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// This theme allows users to set a custom background
add_custom_background();

// END wp 3.0 features


// enqueue jQuery
//if you have a script that need jquery ... you don't need to call'it. You just have to put it in your dependancies.
//wp_enqueue_script('jquery');

wp_enqueue_script('hoverIntent', get_template_directory_uri().'/js/hoverIntent.js',array('jquery'));
wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js',array('hoverIntent'));
wp_enqueue_script('supersubs', get_template_directory_uri().'/js/supersubs.js',array('superfish'));
wp_enqueue_script('wpfolio', get_template_directory_uri().'/js/wpfolio.js',array('supersubs'));



// enable threaded comments

function wpfolio_enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'wpfolio_enable_threaded_comments');


///////////////////////
// ADDING A TAXONOMY //
///////////////////////

// We don't use this to it's full extent yet, but we could (will?)

// enabling a taxonomy for Medium

function wpfolio_create_taxonomies() {
register_taxonomy('medium', 'post', array( 
	'label' => 'Medium',
	'hierarchical' => false,  
	'query_var' => true, 
	'rewrite' => true,
	'public' => true,
	'show_ui' => true,
	'show_tagcloud' => true,
	'show_in_nav_menus' => true,));
} add_action('init', 'wpfolio_create_taxonomies', 0);
	
	
	
	
	
/////////////////////////////////////
// ADMIN & THEME OPTIONS INTERFACE //
/////////////////////////////////////

// customize admin footer text to add wpfolio to links
function wpfolio_admin_footer() {
	echo 'Thank you for creating with <a href="http://wordpress.org/" target="_blank">WordPress</a>. | <a href="http://codex.wordpress.org/" target="_blank">Documentation</a> | <a href="http://wordpress.org/support/forum/4" target="_blank">Feedback</a> | <a href="http://wpfolio.visitsteve.com/">Theme by WPFolio</a>';
} 
add_filter('admin_footer_text', 'wpfolio_admin_footer');


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




// BEGIN Theme Admin Interface

function wpfolio_add_admin() {
	global $themename, $shortname, $options;
		
	$page=isset($_GET['page'])?$_GET['page']:false;
	$action=isset($_REQUEST['action'])?$_REQUEST['action']:false;
	
	if ( $page == basename(__FILE__) )
	{
		if ( 'save' == $action )
		{
			foreach ($options as $value) {
				wpfolio_updateSetting( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			
			foreach ($options as $value)
			{
				if( isset( $_REQUEST[ $value['id'] ] ) ) { 
					wpfolio_updateSetting( $value['id'], $_REQUEST[ $value['id'] ]  ); 
				}
				else {
					wpfolio_updateSetting( $value['id'],$value['std'] ); 
				} 
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		} 
		else if( 'reset' == $action )
		{
			foreach ($options as $value) {
				wpfolio_updateSetting( $value['id'],$value['std'] );
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
	 }
	}
	add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
global $themename, $shortname, $options;

if ( isset($_GET['saved']) && $_GET['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( isset($_GET['reset']) && $_GET['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';?>


<!-- WPFolio Theme Interface -->

<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jscolor/jscolor.js"></script>
<div class="wrap">

<h2><?php echo $themename; ?> Settings</h2>

<p>Remember to set up <a href="<?php echo site_url(); ?>/wp-admin/widgets.php">widgets</a>. WPFolio includes 4 widget areas and 2 custom widgets for changing your navigation, including licensing information, and adding a link to your RSS feed.  Also, please check the <a href="http://dev.eyebeam.org/projects/wpfolio/wiki/WPFolio" target="_blank"> WPFolio site</a> for theme updates, documentation, and more.</p>

<form method="post">
	<table class="optiontable">
	
	<?php foreach ($options as $value) { 
    if ($value['type'] == "text") { ?>
        <tr valign="top"> 
    		<th scope="row"><?php echo $value['name']; ?>:</th>
    		<td>
        		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( wpfolio_getSetting( $value['id'] ) === NULL ) { echo $value['std']; } else { echo wpfolio_getSetting( $value['id'] );  } ?>" />
    		</td>
		</tr>
	
	<?php } elseif ($value['type'] == "select") { ?>

		<tr valign="top"> 
        	<th scope="row"><?php echo $value['name']; ?>:</th>
        	<td>
            	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
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

				<input type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( wpfolio_getSetting( $value['id'] ) === NULL )  { echo $value['std']; } else { echo wpfolio_getSetting( $value['id'] ); } ?>" class="color {pickerPosition:'right'}" />

        	</td>
    	</tr>

<?php } }?>
</table>

<table>
	<tr valign="top">
		<td>
			<p class="submit">
			<input name="save" type="submit" value="Save changes" />    
			<input type="hidden" name="action" value="save" />
			</p>
		</td>
		</form>

<form method="post">	
		<td>
			<p class="submit">
			<input name="reset" type="submit" value="Reset" />
			<input type="hidden" name="action" value="reset" />
			</p>
		</td>
	</tr>
</table>

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
<p> </p>
<?php
}

add_action('admin_menu', 'wpfolio_add_admin');

/**
 * Gets the value for a setting
 *
 * @param $setting
 * @param $cache
 * @return Mixed
 */
function wpfolio_getSetting ( $setting, $cache = TRUE ) {
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

/**
 * Updates a setting
 *
 * @param $setting
 * @param $value
 */
function wpfolio_updateSetting ( $setting, $value ) {
	global $shortname;
	
	$_settings = get_option ( $shortname );
	$_settings[$setting] = $value;
	update_option ( $shortname, $_settings );
	wpfolio_getSetting ( 'wpfolio_version', FALSE );
}

// Add WPFolio Wiki site as a Dashboard Feed 
// Thanks to bavotasan.com: http://bavotasan.com/tutorials/display-rss-feed-with-php/ 

function custom_dashboard_widget() {

	$rss = new DOMDocument();
	$rss->load('http://wpfolio.visitsteve.com/wiki/feed');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			// 'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5; // change how many posts to display here
	echo '<ul>'; // wrap in a ul
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		// $description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		echo '<li><p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong>';
		echo ' - '.$date.'</p></li>';
		// echo '<p>'.$description.'</p>';
	}
	echo '</ul>';
	echo '<p class="textright"><a href="http://wpfolio.visitsteve.com/wiki/category/news" class="button">View all</a></p>'; // link to site
	
}
	
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'WPFolio News', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');


?>