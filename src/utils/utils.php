<?php
// render
/**
 * Renders a view by including a PHP views file.
 * 
 * This function extracts the provided data array and makes the variables available in the view.
 *
 * @param string $path The path to the view file (without the file extension).
 * @param array $data An associative array of data to be passed to the view.
 */
function view($path, $data = [])
{
	extract($data);

	require "views/$path.php";
}

/**
 * Renders a template by including a PHP template file.
 * 
 * This function extracts the provided data array and makes the variables available in the template.
 *
 * @param string $path The path to the template file (without the file extension).
 * @param array $data An associative array of data to be passed to the template.
 */
function template($path, $data = [])
{
	extract($data);

	require "templates/$path.php";
}

// redirection 
/**
 * Redirects the user to a specified URL.
 * 
 * This function sends a location header to redirect the user to the given URL.
 *
 * @param string $url The URL to redirect to.
 */
function redirectTo($url)
{
	header("Location: $url");
}


// check if the admin is connected
/**
 * Redirects the user to a specified URL.
 * 
 * This function sends a location header to redirect the user to the given URL.
 *
 * @param string $url The URL to redirect to.
 */
function admin()
{
	if ($_SESSION['email'] != 'pigny.kenny@gmail.com') {
		redirectTo('/');
	}
}
