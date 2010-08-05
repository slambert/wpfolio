<?php  

// customize admin footer text
function custom_admin_footer() {
	echo 'Thank you for creating with <a href="http://wordpress.org/" target="_blank">WordPress</a>. | <a href="http://codex.wordpress.org/" target="_blank">Documentation</a> | <a href="http://wordpress.org/support/forum/4" target="_blank">Feedback</a> | <a href="http://wpfolio.visitsteve.com/">Theme by WPFolio</a>';
} 
add_filter('admin_footer_text', 'custom_admin_footer');

// Thumbnail Function
function get_thumb ($post_ID){
    $thumbargs = array(
    'post_type' => 'attachment',
    'numberposts' => 1,
    'post_status' => null,
    'post_parent' => $post_ID
    );
    $thumb = get_posts($thumbargs);
    if ($thumb) {
        return get_attachment_icon($thumb[0]->ID);
    }
} 

$GLOBALS['content_width'] = 900; // This sets the Large image size to 900px

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150,true );

// END - Thumbnail Function

// some wp 3.0 features

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


// Remove inline styles on gallery shortcode

function wpfolio_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
	}
add_filter( 'gallery_style', 'wpfolio_remove_gallery_css' );

// END - Remove inline styles on gallery shortcode

// enqueue jQuery

wp_enqueue_script('jquery');

// enable threaded comments

function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');


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
	
/* Begin License and Name widget.*/

	add_action( 'widgets_init', 'name_date_load_widgets' );

/* Register License and Name widget.*/
	function name_date_load_widgets() {
		register_widget( 'name_date_in_footer' );
	}

class Name_Date_In_Footer extends WP_Widget {
	function name_date_in_footer() {
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'name_date_in_footer', 'description' => 'Add license, name, date and/or text to footer.' );
	
			/* Widget control settings. */
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'name_date_in_footer' );
	
			/* Create the widget. */
			$this->WP_Widget( 'name_date_in_footer', 'License and Name in Footer', $widget_ops, $control_ops );
		}
	
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$start_year = $instance['start_year'];
		$name = $instance['name'];
		$choose_copyright = isset( $instance['choose_copyright'] ) ? $instance['choose_copyright'] : false;
		$show_copyright = isset( $instance['show_copyright'] ) ? $instance['show_copyright'] : false;
		$optional_text = apply_filters( 'widget_text', $instance['optional_text'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		/* Display License */
		if ( $show_copyright ) {
				if ( substr($choose_copyright, 0, 2) === 'by'){
				echo '<a rel="license" href="http://creativecommons.org/licenses/' . $choose_copyright . '/3.0/us/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/' . $choose_copyright . '/3.0/us/80x15.png" /></a> ';
				}
				elseif ($choose_copyright === 'copyright') {
				echo '&copy;';
				}
			}
			
		/* Display year, name, text */	
		if ( $start_year ){
			echo  $start_year . ' - ' . date("Y");}
		if ( $name ) {
			echo ' ' . $name ;}
			if ($optional_text) {
			echo ' ' . $optional_text;
			}

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['start_year'] = strip_tags( $new_instance['start_year'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['choose_copyright'] = $new_instance['choose_copyright'];
		$instance['show_copyright'] = $new_instance['show_copyright'];
		if ( current_user_can('unfiltered_html') )
			$instance['optional_text'] =  $new_instance['optional_text'];
		else
			$instance['optional_text'] = wp_filter_post_kses( $new_instance['optional_text'] );

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$default_name = get_bloginfo('name');
		$defaults = array( 'start_year' => '2001', 'name' => $default_name, 'show_copyright'  => on, 'choose_copyright'  => '', 'optional_text' => 'unless otherwise specified' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$optional_text = format_to_edit($instance['optional_text']);
		?>
		
			<!-- Writing the form for the admin widgets page -->
			<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>">Your Name:</label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'start_year' ); ?>">Add First Year of Artwork Displayed:</label>
			<input id="<?php echo $this->get_field_id( 'start_year' ); ?>" name="<?php echo $this->get_field_name( 'start_year' ); ?>" value="<?php echo $instance['start_year']; ?>" style="width:100%;" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'choose_copyright' ); ?>">Choose License:</label>
			
			<ul>
					<li><strong>Creative Commons Licenses</strong></li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by" <?php if ( $instance['choose_copyright'] == 'by' || $instance['choose_copyright'] == '') echo ' checked'; ?>> CC Attribution</li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by-sa" <?php if ( $instance['choose_copyright'] == 'by-sa' ) echo ' checked'; ?>> CC Attribution-Share Alike</li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by-nd" <?php if ( $instance['choose_copyright'] == 'by-nd' ) echo ' checked'; ?>> CC Attribution-No Derivative Works</li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by-nc" <?php if ( $instance['choose_copyright'] == 'by-nc' ) echo ' checked'; ?>> CC Attribution-Noncommercial</li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by-nc-sa" <?php if ( $instance['choose_copyright'] == 'by-nc-sa' ) echo ' checked'; ?>> CC Attribution-Noncommercial-Share Alike</li>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="by-nc-nd" <?php if ( $instance['choose_copyright'] == 'by-nc-nd' ) echo ' checked'; ?>> CC Attribution-Noncommercial-No Derivative</li>
					<li><a href="http://creativecommons.org/choose/" target='_blank'>Use Creative Commons' tools to choose license.</a></li>
					<hr>
					<li><input type="radio" name="<?php echo $this->get_field_name( 'choose_copyright' ); ?>" value="copyright" <?php if ( $instance['choose_copyright'] == 'copyright' ) echo ' checked'; ?>> Standard Copyright Symbol</li>
			</p>
			<p>&nbsp;</p>	
			<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_copyright'], on ); ?> id="<?php echo $this->get_field_id( 'show_copyright' ); ?>" name="<?php echo $this->get_field_name( 'show_copyright' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_copyright' ); ?>">Display License Symbol?</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'optional_text' ); ?>">Optional Text</label><textarea class="widefat" rows="1" cols="20" id="<?php echo $this->get_field_id('optional_text'); ?>" name="<?php echo $this->get_field_name('optional_text'); ?>"><?php echo $optional_text; ?></textarea>
			</p>
			
		<?php
	}
}

/* End License and Name Widget */




/* Begin RSS and Credits Widget */

	add_action( 'widgets_init', 'rss_credits_load_widgets' );
	
	
	function rss_credits_load_widgets() {
		register_widget( 'rss_credits_in_footer' );
	}


class Rss_Credits_In_Footer extends WP_Widget {
function rss_credits_in_footer() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'rss_credits_in_footer', 'description' => 'Add Credits and/or RSS feeds to footer.' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'rss_credits_in_footer' );

		/* Create the widget. */
		$this->WP_Widget( 'rss_credits_in_footer', 'Add RSS, Credits to Footer', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$show_rss_feed = isset( $instance['show_rss_feed'] ) ? $instance['show_rss_feed'] : false ;
		$show_comment_feed = isset(  $instance['show_comment_feed'] ) ? $instance['show_comment_feed'] : false ;
		$show_credits = isset( $instance['show_credits'] ) ? $instance['show_credits'] : false;
		$optional_text = apply_filters( 'widget_text', $instance['optional_text'] );

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display RSS from widget settings. */
		
		/* Print out chosen fields and text  */
		if ($optional_text) {
			echo $optional_text;
			}
		if ( $show_rss_feed ) {
			echo ' <a href="feed:' . get_bloginfo("rss2_url") . '"><img src="' . get_bloginfo("template_url") . '/images/rss.png" border="0" width="14" alt="RSS Feed" /></a> ';}
		if ( $show_comment_feed ){
			echo   ' <a href="feed:' . get_bloginfo("comments_rss2_url") . '"><img src="' . get_bloginfo("template_url") . '/images/comment.gif" border="0" alt="Comments Feed" ></a> ' ;}
		if ( $show_credits ){
			echo ' &bull; <small>Credits: <a href="http://www.wordpress.org">Wordpress</a> | <a href="http://wpfolio.visitsteve.com">WPFolio</a> | <a href="http://eyebeam.org/">Eyebeam</a></small>' ;}			
			
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
		function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['show_rss_feed'] = $new_instance['show_rss_feed'];
		$instance['show_comment_feed'] =  $new_instance['show_comment_feed'];
		$instance['show_credits'] = $new_instance['show_credits'];
		if ( current_user_can('unfiltered_html') )
			$instance['optional_text'] =  $new_instance['optional_text'];
		else
			$instance['optional_text'] = wp_filter_post_kses( $new_instance['optional_text'] );

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'show_rss_feed' => on, 'show_comment_feed' => off, 'show_credits' => on, 'optional_text' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$optional_text = format_to_edit($instance['optional_text']);
		?>
		
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_rss_feed'], on ); ?> id="<?php echo $this->get_field_id( 'show_rss_feed' ); ?>" name="<?php echo $this->get_field_name( 'show_rss_feed' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_rss_feed' ); ?>">Show RSS Feed Link</label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_comment_feed'], on ); ?> id="<?php echo $this->get_field_id( 'show_comment_feed' ); ?>" name="<?php echo $this->get_field_name( 'show_comment_feed' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_comment_feed' ); ?>">Show Comment Feed Link</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_credits'], on ); ?> id="<?php echo $this->get_field_id( 'show_credits' ); ?>" name="<?php echo $this->get_field_name( 'show_credits' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_credits' ); ?>">Show Credits</label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id( 'optional_text' ); ?>">Optional Text</label><textarea class="widefat" rows="1" cols="20" id="<?php echo $this->get_field_id('optional_text'); ?>" name="<?php echo $this->get_field_name('optional_text'); ?>"><?php echo $optional_text; ?></textarea>
</p>
		
			<?php
	}
}

/* End RSS and Credits Widget */





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
           "Courier New, Courier, monospace", "Georgia, Times, Times New Roman, serif", 
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
            "type" => "color"),

//Highlight Font Color
	array(	"name" => "Highlight Font Color",
			"id" => $shortname."_highlight_color",
			"std" => "666666",
			"type" => "color"),

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
	if ( $_GET['page'] == basename(__FILE__) )
	{
		if ( 'save' == $_REQUEST['action'] )
		{
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			
			foreach ($options as $value)
			{
				if( isset( $_REQUEST[ $value['id'] ] ) ) { 
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
				}
				else {
					delete_option( $value['id'] ); 
				} 
			}
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		} 
		else if( 'reset' == $_REQUEST['action'] )
		{
			foreach ($options as $value) {
				delete_option( $value['id'] ); }
				header("Location: themes.php?page=functions.php&reset=true");
				die;
	 }
	}
	add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
global $themename, $shortname, $options;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';?>


<!-- WPFolio Theme Interface -->

<script language="javascript" type="text/javascript" src="<?php echo bloginfo('template_directory') ?>/js/jscolor/jscolor.js"></script>
<div class="wrap">

<h2><?php echo $themename; ?> Settings</h2>

<p>Remember to set up <a href="<?php bloginfo('wpurl'); ?>/wp-admin/widgets.php">widgets</a>. WPFolio includes 4 widget areas and 2 custom widgets for changing your navigation, including licensing information, and adding a link to your RSS feed.  Also, please check the <a href="http://dev.eyebeam.org/projects/wpfolio/wiki/WPFolio" target="_blank"> WPFolio site</a> for theme updates, documentation, and more.</p>

<form method="post">
	<table class="optiontable">
	
	<?php foreach ($options as $value) { 
    if ($value['type'] == "text") { ?>
        <tr valign="top"> 
    		<th scope="row"><?php echo $value['name']; ?>:</th>
    		<td>
        		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
    		</td>
		</tr>
	
	<?php } elseif ($value['type'] == "select") { ?>

		<tr valign="top"> 
        	<th scope="row"><?php echo $value['name']; ?>:</th>
        	<td>
            	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            	</select>
        	</td>
    	</tr>

	<?php } elseif ($value['type'] == "color") { ?><!--if the option needs a color picker, use js color picker-->
		<!--Code taken from Allan Cole's Autofocus Plus Theme - thanks! -->

		<tr valign="top"> 
        	<th scope="row"><?php echo $value['name']; ?>:</th>
        	<td>

				<input type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" class="color {pickerPosition:'right'}" />

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

<p>WPFolio took us <em>a lot</em> of time to build, develop, and document. Did our project save you time? Save you the costs of a designer or webmaster? Would you have otherwise needed a tutor? If you met us in person, would you buy us a beer? A dinner? Would you like to see new features implemented? Please consider making a donation based on what you think WPFolio was worth to you. Although we'll likely never make back what we've put into this, it does mean a lot.</p>

<p>WPFolio is Free Software under the <a href="http://www.gnu.org/licenses/quick-guide-gplv3.html">GPLv3</a>. Our <a href="http://wpfolio.visitsteve.com">WPFolio Wiki</a> includes instructions to help you make the most of the WPFolio theme. You are free to modify, share, and distribute WPFolio however you like. We do all this because we want artists to have great websites using the best, free and open source software available. You can contribute by helping with the <a href="http://github.com/slambert/WPFolio/">development of the theme</a>, or by donating. </p>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" type="hidden" value="_s-xclick" /> <input name="hosted_button_id" type="hidden" value="ZMXNTHG3LHX8Q" /> <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" type="image" /> </form>

<p>Thanks.</p>
<p> </p>
<?php
}

add_action('admin_menu', 'wpfolio_add_admin');
?>