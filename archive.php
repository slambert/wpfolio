<?php get_header(); ?>   

<!-- begin post -->   
<br />   
<div id="content" class="entry">  	  	 
<?php if (have_posts()) : ?>  		     
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     <?php /* If this is a category archive */ if (is_category()) { ?>				 		 
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
<?php if(in_category('news','latest', 'updates', 'blog', 'notable')) continue; ?>

<div class="img-frame">
<a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php echo get_thumb($post->ID); ?></a> 
</br>
<a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><div class="img-frame-caption"><?php the_title('' ); ?></a></div>
</div>

<?php endwhile; ?>   

</div>
</div>
<div class="entry">  
<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380
<div class="prevnext" align="center"><?php next_posts_link('Previous') ?> <?php previous_posts_link('Next') ?></div> -->  	  
<?php else : ?>  	  
<h2 class="center">Page not found</h2> 	 	 	 
<?php endif; ?> 		    		  
</div>	   	  
<!-- end post -->     

<?php get_footer(); ?>  