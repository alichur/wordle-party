<?php
/*
Plugin Name:  Wordle party
Description:  Adds a random Wordle result to the end of your post. This is purely a silly test plugin.
Version:      0.0.2
Author:       Spicynzapps 
*/

// īncludes css scripts
function wordle_party_styles() {
   wp_enqueue_style( 'wordle-party',  plugin_dir_url( __FILE__ ) . '/styles/common.css' );                      
}
add_action( 'wp_enqueue_scripts', 'wordle_party_styles');

// Returns a 5 character string representing a finished wordle
function get_random_wordle_result() {
   $wordle_tiles = array('⬜','🟨','🟩');
   $result = "";
   $index = 0;
   do {
      $result .= $wordle_tiles[rand(0, 2)];
      $i ++;
   } while ($i < 5);
   return $result;
}

if( !function_exists("wordle_party") ) { 
   function wordle_party($content) {
 
      $wordle_result = get_random_wordle_result();
      $content .=  "<p class='tiles'>$wordle_result</p>";

      return $content; 
       
   }
   add_filter('the_content', 'wordle_party'); 
}
