<?php
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
