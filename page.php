<!-- generated with page.php -->
<?php

    // calling the header.php
    get_header(); 

?>
   
<!-- begin page -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?> 

<div id="content">
	<div class="page"> 
<div class="<?php wp_title('',true,''); ?>">

<?php if (is_page('home')) { echo ""; } else if (is_page("")) {
	 echo the_title('<h2>','</h2>');
	}
?>


<?php the_content(); ?>    
<?php edit_post_link('edit this', '<br /><span class="edit-link">', '</span>'); ?>
</div><!--.page title--> 	
<?php wp_link_pages(); ?>
	    
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