<?php 

if ( function_exists('register_sidebar') )
    register_sidebar(array('name'=>'navbar')); 
    
    
if ( function_exists('register_sidebar') )
    register_sidebar(array('name'=>'sidebar'));

//Thumbnail Function
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

$themename = "WPFolio";
$shortname = "WPFolio";
$options = array (

   array( "name" => "Headline Font",
           "id" => $shortname."_headline_font",
           "type" => "select",
           "std" =>"Arial",
           "options" => array("Arial, sans-serif", "Gill Sans, sans-serif", "Helvetica, sans-serif", "Lucida, sans-serif", "Verdana, sans-serif", "Arial Black, sans-serif", "Georgia, serif", "Palatino, serif", "Times, serif", "Courier, monospace" )),


   array( "name" => "Headline Font Size",
			"id" => $shortname."_headline_size",
            "std" => "36px",
            "type" => "text"),
     array(    "name" => "Body font",
            "id" => $shortname."_body_font",
            "type" => "select",
            "std" => "Arial",
            "options" => array("Arial, sans-serif", "Gill Sans, sans-serif", "Helvetica, sans-serif", "Lucida, sans-serif", "Verdana, sans-serif", 
            "Arial Black, sans-serif", "Georgia, serif", "Palatino, serif", "Times, serif", "Courier, monospace")),
            
   array(    "name" => "Body Foreground Color",
            "id" => $shortname."_foreground_color",
            "std" => "#ffffff",
            "type" => "text"),        
   
   array(    "name" => "Body background color",
            "id" => $shortname."_body_backgroundcolor",
            "std" => "#c0c0c0",
            "type" => "text"),          
   
            
  array(    "name" => "Body font color",
            "id" => $shortname."_body_color",
            "std" => "#000000",
            "type" => "text"),
   	
   array( "name" => "Highlight Font Color",
          "id" => $shortname."_highlight_color",
          "std" => "#000000",
          "type" => "text"),
   
   array( "name" => "Secondary Font Color",
           "id" => $shortname."_second_color",
           "std" => "#000000",
           "type" => "text"), 
   
 

   
   array(  "name" => "Blog Title Visibility",
            "id" => $shortname."_visible",
            "type" => "select",
            "std" => "visible",
            "options" => array("visible", "hidden")),
   
   array( "name" => "Text Transform",
           "id" => $shortname."_text_transform",
           "type" => "select",
           "std" =>"none", 
           "options" => array("none", "uppercase", "lowercase","capitalize" )),
 



);

function mytheme_add_admin() {
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
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<form method="post">
<table class="optiontable">
<?php foreach ($options as $value) { 
    if ($value['type'] == "text") { ?>
        <tr valign="top"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
    </td>
</tr>
<?php } elseif ($value['type'] == "select") { ?>
<tr valign="top"> 
        <th scope="row"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>

<?php } }?>
</table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
<p><strong>Links:</strong>
<ul><li>Colors must be in hex format.  Use a <a href="http://www.colorpicker.com/" target="_blank">color picker tool</a> for help.</li>
<li>Check the <a href="http://dev.eyebeam.org/projects/wpfolio/wiki/WPFolio" target="_blank"> WPFolio site</a> for theme updates and documentation.</li></ul>
</form>
<?php
}

function mytheme_wp_head() { ?>
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
<?php }
	add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php                                             
    function wpfolio_archives($args) {
	extract($args);
	$options = get_option('widget_archives');
	$c = $options['count'] ? '1' : '0';
	$d = $options['dropdown'] ? '1' : '0';
	$title = empty($options['title']) ? __('Archives') : apply_filters('widget_title', $options['title']);

	echo $before_widget;
	echo $before_title . $title . $after_title;
	if($d) {
?>
	<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=""><?php echo attribute_escape(__('Select Month')); ?></option> <?php wp_get_archives("type=yearly&format=option&show_post_count=$c"); ?> </select>
<?php } else { ?>
		<ul>
		<?php wp_get_archives("type=yearly&show_post_count=$c"); ?>
		</ul>
<?php
	}
	echo $after_widget;
}
register_sidebar_widget('Yearly Archives', 'wpfolio_archives'); 



// CATEGORY ARCHIVE WIDGET
function wpfolio_widget_categories($args, $widget_args = 1) {

    $title = empty($options[$number]['title']) ? __('') : apply_filters('widget_title', $options[$number]['title']);

    echo $before_widget;
    echo $before_title . $title . $after_title;

    $order = get_option('wpfolio_categories_order');
    $order = explode(",", $order);
    
    foreach($order as $cat_name):
    $cat_name = trim($cat_name);
    $cat_id = get_cat_id($cat_name);	
    $this_category = get_category($cat_id);
?>
    <ul>
    <a href="<?php echo get_category_link($cat_id);?>"><?php echo $this_category->name ?></a>
    </ul>
<?php
    endforeach;
    echo $after_widget;
}


function wpfolio_widget_categories_control( $widget_args=null ) {
	global $wp_registered_widgets;

	if (!empty($_POST['widget-wpfolio-categories-submit'])) {
		update_option('wpfolio_categories_order', $_POST['widget-wpfolio-categories-order']);
	}
	$order = get_option('wpfolio_categories_order');
?>
		<p>
			<label for="categories-order-<?php echo $number; ?>">
				<?php _e( 'List categories by category name (painting, drawing, art work, etc):' ); ?>
				<input class="widefat" id="wpfolio-categories-order" name="widget-wpfolio-categories-order" type="text" value="<?php echo $order; ?>" />
			</label>
		</p>

		<input type="hidden" name="widget-wpfolio-categories-submit" value="1" />
		
<?php
}



wp_register_sidebar_widget('wpfolio_categories', __("WPFolio Categories"), 'wpfolio_widget_categories');
wp_register_widget_control('wpfolio_categories', __("WPFolio Categories"),  'wpfolio_widget_categories_control');

?>
