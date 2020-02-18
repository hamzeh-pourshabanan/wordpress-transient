<?php
/*
* With this snippet we can see the time to load posts
* from database ( for the first rendering) and the time to 
* load posts from cache (for subsequent renders ).
* The first person who opens the page in each 24 hour
* will burden the load from database, and subsequent users
* will see load the page from the cache.
*/
$start_time = microtime(true); // record the start time of transaction

if (false === ($recent_posts = get_transient('recent_posts'))){ //if there is no transient, execute the if statement logic
    $recent_posts = get_posts([
        'posts_per_page' => '20'
    ]);

    set_transient('recent_posts', $recent_posts, DAY_IN_SECONDS); // cache the posts for 24 hour
}

echo '<pre>';
print_r($recent_posts);  
echo '</pre>';

$end_time = microtime(true);  // Record the end time of execution of above code

$run_time = ($end_time - $start_time); // substract times to obtain the run time

echo '<p> It took: <strong>'.$run_time.'</strong> to run this script.';
