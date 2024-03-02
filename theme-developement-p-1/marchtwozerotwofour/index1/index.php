<h1>wp_get_current_user</h1>
<pre>
<?php
 $user = wp_get_current_user(); 
 var_dump($user);
?>
</pre>
<hr>
<h1>get_super_admins(): Now that WordPress has determined Multisite is running, the function calls get _ super _
admins() to retrieve an array of all super admins in WordPress using the following code</h1>
<pre>
<?php
 $user = get_super_admins(); 
 var_dump($user);
?>
</pre>
<hr>
<h1>current_time('mysql') | current_time('timestamp')</h1>
<pre>
<?php
 $user = current_time('timestamp'); 
 var_dump($user);
?>
</pre>
<hr>
<h1>wp_nonce_field()</h1>
<pre>
<?php
 $user = wp_nonce_field(); 
 var_dump($user);
?>
</pre>
<hr>
<h1>get_option()</h1>
<?php
var_dump(get_option("current_theme"));
?>
<hr>
<h1>Testing Loop</h1>
<?php 
 if ( have_posts() ) :
 while ( have_posts() ) : the_post(); 
 //loop content (template tags, html, etc)
 echo "<h1>";
 the_title();
 echo " - ";
 the_author();
 echo "</h1>";
 echo "<br>";
 the_content();
 echo "<hr>";

endwhile;
 endif;
?>