<?php

    // calling the header.php
    get_header(); 

?>

<!-- generated with page.php -->
   
<!-- begin page -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?> 

<div id="content"> 
	<div class="<?php wp_title('',true,''); ?>">

		<h2 class="pagetitle"><a href="<?php the_permalink() ?>" title="Permalink"><?php if (is_page('home')) { echo ""; } else if (is_page("")) {
	 echo the_title();
	}
?></a></h2>
		
		<?php if (is_page(array('RESUME','Resume','resume','CV','cv'))) { ?>
		<div class="cv-style widemargins">
		<?php the_content(); ?> 
		</div><!-- .cvstyle -->
		
		<? } else if (is_page()) { ?>
		<div class="widemargins">
		<?php the_content(); ?> 
		
		<? } ?>
		 
		<?php wp_link_pages(); ?>
  
		<div class="post-bottom-title"> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>	</div><!-- .post-bottom-title -->
		
		<div class="widemargins">
		<?php comments_template(); ?> 	 
		<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
		</div><!--.widemargins-->

	</div><!-- .page[title] -->
</div><!-- #content -->
   

<!-- <?php trackback_rdf(); ?> -->    

<?php endforeach; else: ?> 
<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    


<!-- end page -->     

<?php     

	// calling footer.php
    get_footer();

?>