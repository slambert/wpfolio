<?php get_header(); ?>   

<!-- Checking if this is the blog -->
<?php /* If this is a category archive */ if(is_category(array('news','latest', 'updates', 'blog', 'notable'))):	 ?>	
<!-- If it's the blog, run the following -->

	<!-- begin post -->   
	<br />   
	<div id="content" class="pages">  	  	 
	<?php if (have_posts()): ?>  
	
						 
		<h2><?php echo single_cat_title(); ?></h2> <!--CATEGORY TITLE-->
	 
		
		</div> 
		<div class="pages">    
			<?php while (have_posts()) : the_post(); ?>     
		
				<div class="notable-post">
		
					<h3><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h3> <!--POST TITLE-->
			
					<?php the_content('continue...'); ?>
			
					<h5><?php the_date('F d, Y', 'posted ', ''); ?><?php comments_popup_link(__(' | Comments (0)'), __(' | Comments (1)'), __(' | Comments (%)'), __(''), __('')); ?><?php the_tags('| Tags: ',', ',''); ?>  <?php edit_post_link('edit this entry', '<span class="adminuser">', '</span>'); ?> <!--USER EDIT LINK--></h5>
				</div>
	
			<?php endwhile; ?>   	  
		</div>	
		
	
		<div class="entry">  
		
		<div class="prevnext" align="center"><?php next_posts_link('Previous') ?> <?php previous_posts_link('Next') ?></div>   	  
	
		<?php else : // if there are posts ?>  	  
			<h2 class="center">Page not found</h2> 	 
			
		<?php endif; ?> 		    		  
	
	
	</div>   	  
<!-- end post -->  
<div id="links">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 

</div>



<!-- If it's NOT the blog, run the following -->
<?php else: ?>

	<div id="content" class="entry">  	  	 
		<?php if (have_posts()) : ?>  		     
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     
			<?php /* If this is a category archive */ if (is_category()) { ?>				 		 
				<h2 class="pagetitle"><?php echo single_cat_title(); ?></h2> 
			
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?> 		  
				<h2 class="pagetitle">Author Archive</h2>  		    
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> 		  
			<?php /*if this is a year archive */ } elseif (is_archive()) { ?>
				<h2 class="pagetitle"><?php wp_title(''); ?></h2>
				<div class="entry"></div>	
			
			<?php } ?>   		  		  
			<br /> 	 
		</div> 
		
		
		
		<div class="entrycat"> 
		
		
		
		<div class="img-container">
		<?php while (have_posts()) : the_post(); ?> 
			
			<div class="img-frame">
				<a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php echo get_thumb($post->ID); ?></a> 
				<br />
				<div class="img-frame-caption"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php the_title('' ); ?></a>
			</div>
		</div>
		
		<?php endwhile; ?>   
		
		</div>
		</div>
		<div class="entry">  
		<div class="prevnext" align="center"><?php next_posts_link('Previous') ?> <?php previous_posts_link('Next') ?></div>   	  
	<?php else : // have posts ?>  	  
		<h2 class="center">Page not found</h2> 	 	 	 
	<?php endif; // have posts ?> 


</div>	   	  
<!-- end post -->     


<?php endif; // end if we are in particular categories ?>




<?php get_footer(); ?>