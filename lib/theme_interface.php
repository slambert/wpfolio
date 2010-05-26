<!-- WPFolio Theme Interface -->

<script language="javascript" type="text/javascript" src="<?php echo bloginfo('stylesheet_directory') ?>/js/jscolor/jscolor.js"></script>
<div class="wrap">

<h2><?php echo $themename; ?> Settings</h2>

<p>Remember to set up <a href="<?php bloginfo('wpurl'); ?>/wp-admin/widgets.php">widgets</a>. WPFolio includes 3 custom widgets for changing your navigation, including licensing information, and adding a link to your RSS feed.  Also, please check the <a href="http://dev.eyebeam.org/projects/wpfolio/wiki/WPFolio" target="_blank"> WPFolio site</a> for theme updates, documentation, and more.</p>

<form method="post">
	<table class="optiontable">
	
	<?php foreach ($options as $value) { 
    if ($value['type'] == "text") { ?>
        <tr valign="top"> 
    		<th scope="row"><?php echo $value['name']; ?>:</th>
    		<td>
        		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
    		</td>
		</tr>
	
	<?php } elseif ($value['type'] == "select") { ?>

		<tr valign="top"> 
        	<th scope="row"><?php echo $value['name']; ?>:</th>
        	<td>
            	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            	</select>
        	</td>
    	</tr>

	<?php } elseif ($value['type'] == "color") { ?><!--if the option needs a color picker, use js color picker-->
		<!--Code taken from Allan Cole's Autofocus Plus Theme - thanks! -->

		<tr valign="top"> 
        	<th scope="row"><?php echo $value['name']; ?>:</th>
        	<td>

				<input type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" class="color {pickerPosition:'right'}" />
				<!--grabbed the above block almost whole with a few modifications. It works, but please make changes if I missed something - SL -->

        	</td>
    	</tr>

<?php } }?>
</table>

<p class="submit">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
</p>
</form>

<form method="post">
<p class="submit">
	<input name="reset" type="submit" value="Reset" />
	<input type="hidden" name="action" value="reset" />
</p>

</form>
