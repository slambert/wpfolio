<!-- generated with 404.php -->
<?php @header("HTTP/1.1 404 Not found", TRUE, 404); ?>
<?php

    // calling the header.php
    get_header(); 

?>  
<!-- begin page -->    


<div id="content"> 
	<div class="<?php wp_title('',true,''); ?>">

		<h2><?php wp_title('',true,''); ?></h2>

<p>You can click back and try again OR search for what you're looking for:</p>

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <div class="search">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
  </div><!-- .search -->
</form>
</h4>

	</div> 	<!-- .dynamic-title-->	    
</div><!-- #content-->
   

<!-- <?php trackback_rdf(); ?> -->     


<!-- end page -->     

<?php     

	// calling footer.php
    get_footer();

?>