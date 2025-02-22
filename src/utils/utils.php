<?php
function redirectTo($path)
{
	header('Location: ' . $path);
}

// function render($path, $template = false, $data = [])
// {
// 	extract($data);
// 	if ($template) {
// 		require "templates/$path.php";
// 	} else {
// 		require "views/$path.php";
// 	}
// }
function view($path, $data = [])
{
	extract($data);

	require "views/$path.php";
}

function template($path, $data = [])
{
	extract($data);

	require "templates/$path.php";
}
