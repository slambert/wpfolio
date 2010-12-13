<?php 

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
			echo ' <a href="feed:' . get_bloginfo("rss2_url") . '"><img src="' . get_template_directory_uri() . '/images/rss.png" border="0" width="14" alt="RSS Feed" /></a> ';}
		if ( $show_comment_feed ){
			echo   ' <a href="feed:' . get_bloginfo("comments_rss2_url") . '"><img src="' . get_template_directory_uri() . '/images/comment.gif" border="0" alt="Comments Feed" ></a> ' ;}
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

?>
