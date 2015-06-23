<?php 
add_filter( 'wpmem_sidebar_status', 'my_sidebar_status' );

function my_sidebar_status( $string ) 
{
	/*
	$string comes in as an html string of:
	<p>You are logged in as {username}<br />
	<a href="http://yoursite.com/?a=logout">
	click here to logout</a></p>

	You can do something here to filter that,
	change it, or append to it.
	*/

	$string = '<a href="'. get_bloginfo('url').'?a=logout">Log out</a></p>';

	return $string;
}

//disable admin bar
add_filter( 'show_admin_bar', '__return_false' );


add_filter( 'wpmem_sb_login_args', 'my_sidebar_args' );
function my_sidebar_args( $args ) {
	/**
	 * This example changes the status message
	 */
	$args = array(
		'status_msg' => '',
	);

	return $args;
}
?>