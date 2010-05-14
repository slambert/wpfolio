<?php

    // calling the header.php
    get_header(); 

?>

<!-- generated with page.php -->
   
<!-- begin page -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?> 

<div id="content">
	<div class="page"> 
<div class="<?php wp_title('',true,''); ?>">

<a href="<?php the_permalink() ?>" title="Permalink"><?php if (is_page('home')) { echo ""; } else if (is_page("")) {
	 echo the_title('<h2 class="pagetitle">','</h2>');
	}
?></a>
</div><!--.page title--> 

<?php the_content(); ?>    
<div class="post-bottom-title"> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>	</div>
<?php comments_template(); ?> 	 
<?php wp_link_pages(); ?>
<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .page -->
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