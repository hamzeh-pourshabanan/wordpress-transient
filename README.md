# wordpress-transient

In this snippet of code we can see how to cache the **get_posts()** in wordpress,

so whenever a user opens the page, it first checks if there is any transient,

it will get the transient and does not retrieve posts from databse, 

otherwise, it will get_posts() from database and set a new transient.

in functions.php we delete the transient everytime we add a new post.
