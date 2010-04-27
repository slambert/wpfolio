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

			<p>You 
			<?php
#some variables for the script to use
#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_bloginfo('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress

  if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
        echo "tried going to "; #starts assembling an output paragraph
	$casemessage = "All is not lost!";
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
	echo "clicked a link to"; #now the message says You clicked a link to...
        #setup a message to be sent to me
	$failuremess = "A user tried to go to $website"
        .$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
	$failuremess .= "It wasn't their fault, so try fixing it.  
        They came from ".$_SERVER['HTTP_REFERER'];
	mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
        $failuremess, "From: $websitename <noreply@$website>"); #email you about problem
	$casemessage = "An administrator has been emailed 
        about this problem, too.";#set a friendly message
  }
  echo " ".$website.$_SERVER['REQUEST_URI']; ?> 
and it doesn't exist.</p> 

<p><?php echo $casemessage; ?>  </p>

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