<?php /* 
Template Name: Archives 
*/ ?>  

<?php get_header(); ?>      

<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : start_wp(); ?>  

<div class="entrycat"> 
<h2>All Work</h2> 

<!-- archives with the_excerpt so the page shows a grid of thumbnails for each post-->    
<?php $arc_query = new WP_Query('orderby=post_date&order=DESC&showposts=-1'); ?> <?php while ($arc_query->have_posts()) : $arc_query->the_post(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				
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
 
 <?php the_title(''); ?>
<?php endwhile; ?>  	
</div> <!-- .entry cat (?)-->     

<?php endforeach; else: ?>    

<p><h2 class="center">Sorry, page not found</h2></p> 
<?php endif; ?>    
<!-- end post -->   

 <?php get_footer(); ?> 
</div> <!-- is this superfluous? -->
