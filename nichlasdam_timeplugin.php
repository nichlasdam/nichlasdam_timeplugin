<?php
/*
Plugin Name: Nichlas Dam Tid siden sidste post
Plugin URI: http://nichlasdam.dk/
Description: Tid siden post 
Author: Nichlas Dam
Version: 1.0
Author URI: http://nichlasdam.dk/
*/

class wp_time_since_last_post extends WP_Widget {
    
    function wp_time_since_last_post() {
        parent::WP_Widget(false, $name = __('Tid siden sidste post', 'wp_widget_plugin') );
    }
    
    function form($instance) { 
        
    }
    
    function update($new_instance, $old_instance) {

    }
    
    function widget($args, $instance) {      
        
        $posts = wp_get_recent_posts(); //Seneste posts i en variabel
        $nu = date("U"); //Nuværende tid i en varabel - U = Unix
        $dengang = strtotime($posts[0]['post_date']); //finder tid siden sidste post via strtotime             http://dk1.php.net/manual/en/function.strtotime.php
        echo "Tid siden sidste post:", human_time_diff($dengang, $nu); // finder tid siden sidste post.
         
    }

}
add_action('widgets_init', create_function('', 'return register_widget("wp_time_since_last_post");'));


?>