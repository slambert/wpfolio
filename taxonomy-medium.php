<?php

    // calling the header.php
    get_header();  

?>  

<!-- generated with taxonomy-medium.php (this template is designed to just show art/portfolio posts in the yearly archive view) -->

<!-- begin post -->    
<div id="content" class="entry taxonomy-medium">  
	  	 
		<?php if (have_posts()) : ?>
		
		<h2 class="pagetitle"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
			  		  	 	

<div class="entrycat"> 

<div class="img-container">

		<?php while (have_posts()) : the_post(); ?> 


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
	<div class="img-frame-caption"><a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php the_title('' ); ?>  
	</a> 
	</div><!-- .img-frame-caption -->
</div><!-- .img-frame -->

<?php endwhile; ?>   

</div><!-- img-container-->
</div><!-- entrycat -->

<div class="entry">  
		
		<div class="prevnext">
				<div class="prev"><?php previous_post_link('%link', 'Newer', TRUE); ?></div> <div class="next"><?php next_post_link('%link', 'Older', TRUE); ?></div>
		</div> <!--.prevnext -->
					  
<?php else : 

	if ( is_date() ) { // If this is a date archive
		echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
	} else {
		echo("<h2 class='center'>No posts found.</h2>");
	
	}
		get_search_form();
	
	endif
?>  	  
		    		  
</div>	<!-- .entry -->   	  
<!-- end post -->     
</div><!-- #content -->
<?php     

	// calling footer.php
    get_footer();

?>