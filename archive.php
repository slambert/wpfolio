<?php

    // calling the header.php
    get_header(); 

?>  

<!-- generated with archive.php -->

<!-- begin post -->    
<div id="content" class="entry">  	  	 
<?php if (have_posts()) : ?>  		     
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     <?php /* If this is a category archive */ if (is_category()) { ?>				 		 
<h2 class="pagetitle"><?php echo single_cat_title(); ?></h2> 


<?php /* If this is an author archive */ } elseif (is_author()) { ?> 		  
<h2 class="pagetitle">Artist Archive</h2>  		    
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> 		  
<?php /*if this is a year archive */ } elseif (is_archive()) { ?>
<h2 class="pagetitle"><?php wp_title(''); ?></h2>

<!-- START: why is this here? -->
<div class="entry"></div><!-- .entry -->
<!-- END: why is this here? -->

<?php } ?>   		  		  	 	



<div class="entrycat"> 



<div class="img-container">

<?php while (have_posts()) : the_post(); ?> 
<?php /* if(in_category('news','latest', 'updates', 'blog', 'notable')) continue; */ ?>
<?php
$reserved_names = array('news','latest', 'updates', 'blog', 'notable','News','Latest', 'Updates', 'Blog', 'Notable'); 
$category = get_the_category(); 
$categories_to_exclude = $category[0]->cat_name;
if (in_array($categories_to_exclude, $reserved_names)) continue;
?>

<div class="img-frame">
	
	<a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>">
	
	
	
	
	<?php 
	
	
	#If there is a post thumbnail , it will display. If not it is the thumb function. These
	# can be edited in the functions.php file.
	
	if(has_post_thumbnail()){
		the_post_thumbnail();
	}
	else{

	
	echo get_thumb($post->ID); 
}
	

	
	
	?>
	
	
	
	</a> 
	<br />
	<div class="img-frame-caption"><a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php the_title('' ); ?></a>
	</div><!-- .img-frame-caption -->
</div><!-- .img-frame -->

<?php endwhile; ?>   

</div><!-- img-container-->
</div><!-- entrycat -->

<div class="entry">  
<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380
<div class="prevnext" align="center"><?php next_posts_link('Previous') ?> <?php previous_posts_link('Next') ?></div> -->  	  
<?php else : ?>  	  
<h2 class="center">Sorry, page not found</h2> 	 	 	 
<?php endif; ?> 		    		  
</div>	<!-- .entry -->   	  
<!-- end post -->     
</div><!-- #content -->
<?php     

	// calling footer.php
    get_footer();

?>