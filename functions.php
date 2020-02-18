<?php

/*
*Add this chunk of code in your functions.php file in your theme root
* to delete previous chaches while adding a new post, otherwise the 
* new posts won't be retrieved if you retrieve posts from cache.
*
* Add an action in 'save_post' hook, so whenever we add a new post,
*  it deletes the transient 'recent_posts'.
*  
* Also see the 'https://github.com/hamzehXXX/wordpress-transient/blob/master/page-test.php'
* in this repository to learn about how to cache get_posts() in wordpress.
*/

add_action('save_post', function () {
	    if (false !== get_transient('recent_posts')) {
	        delete_transient('recent_posts');
        }
    });
