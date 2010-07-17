<?php

    // calling the header.php
    get_header(); 

?>  

<!-- generated with date.php (this template is designed to just show art/portfolio posts in the yearly archive view) -->

<!-- begin post -->    
<div id="content" class="entry date">  
	  	 
		<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     
		
		
		
		<?php /* If this is a daily archive */ if (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
		
		  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
		
		  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>    
		
		  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Archives</h2>
		
		  <?php /*if this is a year archive */ } elseif (is_archive()) { ?>
		<h2 class="pagetitle"><?php wp_title(''); ?></h2>
		<?php } ?>   		  		  	 	

<div class="entrycat"> 

<div class="img-container">

		<?php while (have_posts()) : the_post(); ?> 


<?php /* if(in_category('news','latest', 'updates', 'blog', 'notable')) continue; */ ?>
<?php 
// This section of code removes posts from the archive if they are in a blog/news category
// This is done so the yearly archives are just art/portfolio posts
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