<?php
/**
 * Template Name: Full Width Page
 * 
 * A custom page template that uses the full width of the page
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 */
?>

<?php

    // calling the header.php
    get_header(); 

?>

<!-- generated with page.php -->
   
<!-- begin page -->    
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="content"> 
	
	<div class="<?php wp_title('',true,'');  ?>">

		<h2 class="pagetitle"><a href="<?php the_permalink() ?>" title="Permalink">
		
		<?php if (is_page('home')) { 
				
				echo ""; 
				
				} 
				
				else if (is_page("")) 
				{
	 				the_title();
				}
		?></a></h2>
		
		<?php if (is_page(array('RESUME','Resume','resume','CV','cv'))) { ?>
		
		<div class="cv-style"><!-- conditional class added to resume/cv -->
		
		<?php the_content(); ?> 
		
		<?php } 
		
		elseif (is_front_page()) { ?>
		
		<div class="front-page"><!-- conditional class added to Front Page -->
		
		<?php the_content(); ?> 
		
		<?php } 
		
		else { ?>
		
		<div class="fullwidthpage"><!-- conditional class added to Full Width Pages -->
		
		<?php the_content(); ?> 
		
		<?php } ?>
		
		 
		<?php wp_link_pages(); ?>
		
		</div><!-- .conditional class -->
  
		<div class="post-bottom-title"> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?>	</div><!-- .post-bottom-title -->
		
		<div class="widemargins">
		<?php comments_template('', true); ?> 	 
		<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
		</div><!--.widemargins-->

	</div><!-- .page[title] -->
</div><!-- #content -->
   

<!-- <?php trackback_rdf(); ?> -->    

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'wpfolio'); ?></p>
<?php endif; ?>

<!-- end page -->     

<?php     

	// calling footer.php
    get_footer();

?>