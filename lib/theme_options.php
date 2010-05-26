<?php
$themename = "WPFolio";
$shortname = "WPFolio";

//...BEGIN THEME OPTIONS...

$options = array (

//Headline Font
   array( "name" => "Headline Font",
           "id" => $shortname."_headline_font",
           "type" => "select",
           "std" =>"Arial",
           "options" => array("Arial, sans-serif", "Gill Sans, sans-serif", "Helvetica, sans-serif", "Lucida, sans-serif", "Verdana, sans-serif", "Arial Black, sans-serif", "Georgia, serif", "Palatino, serif", "Times, serif", "Courier, monospace" )),

//Headline Font Size
	array( "name" => "Headline Font Size",
			"id" => $shortname."_headline_size",
            "std" => "28px",
            "type" => "text"),

//Body Font
	array(  "name" => "Body Font",
            "id" => $shortname."_body_font",
            "type" => "select",
            "std" => "Arial",
            "options" => array("Arial, sans-serif", "Gill Sans, sans-serif", "Helvetica, sans-serif", "Lucida, sans-serif", "Verdana, sans-serif", 
            "Arial Black, sans-serif", "Georgia, serif", "Palatino, serif", "Times, serif", "Courier, monospace")),

//Body Foreground Color            
	array(	"name" => "Body Foreground Color",
            "id" => $shortname."_foreground_color",
            "std" => "ffffff",
			"type" => "color"),        

//Body Background Color
	array(	"name" => "Body Background Color",
            "id" => $shortname."_body_backgroundcolor",
            "std" => "E0E0E0",
            "type" => "color"), 
                     
//Body Font Color
	array(	"name" => "Body Font Color",
            "id" => $shortname."_body_color",
            "std" => "000000",
            "type" => "color"),

//Highlight Font Color
	array(	"name" => "Highlight Font Color",
			"id" => $shortname."_highlight_color",
			"std" => "666666",
			"type" => "color"),

//Secondary Font Color
   array( "name" => "Secondary Font Color",
           "id" => $shortname."_second_color",
           "std" => "ABABAB",
           "type" => "color"), 

//Blog Title Visibility (replace for image based headers)  
   array(  "name" => "Blog Title Visibility",
            "id" => $shortname."_visible",
            "type" => "select",
            "std" => "visible",
            "options" => array("visible", "hidden")),

//Text Transform (uppercase, lowercase, or capitalize)
   array( "name" => "Text Transform",
           "id" => $shortname."_text_transform",
           "type" => "select",
           "std" =>"none", 
           "options" => array("none", "uppercase", "lowercase", "capitalize" )),

);
//...END THEME OPTIONS...//
?>