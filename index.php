<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with index.php -->

<div id="content">  
<!-- begin post -->
<h1>Congratulations on choosing WPFolio. </h1>
<br />
	
	<h2>You need to set up a static front page - <a href="wp-admin/options-reading.php">do that here</a>. </h2>   
<br />

	<h2>The following might look like a mess, but it will go away after you set up a static front page... </h2> 
	
	<br /><br /><br /><br />
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

	<div class="entry <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">   

			<!-- START PREVIOUS/NEXT BUTTONS --> 

			<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380 
			<div class="prevnext">
			<?php next_post_link('%link', 'newer', TRUE); ?> <?php previous_post_link('%link', 'older', TRUE); ?>
			</div> .prevnext -->

			<!-- END PREVIOUS/NEXT BUTTONS -->    

	<?php the_content(); ?>   
	</div> <!-- .entry --> 		    

<div class="post-bottom-title">   
<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php the_tags('| Tags: ',', ',''); ?>  | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>

<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .post-bottom-title -->
     
<?php comments_template(); ?> 	  

<?php wp_link_pages(); ?>
 
</div><!-- #content -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

<!-- end post-->     

<?php     

	// calling footer.php
    get_footer();

?>