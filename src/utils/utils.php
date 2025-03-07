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

function redirectTo($url)
{
	header("Location: $url");
}

function logMessage($message)
{
	$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 5);

	$log  = "[" . date("Y-m-d H:i:s") . "] " . $message . "\nCall Stack:\n";

	foreach ($trace as $index => $frame) {
		$file = $frame['file'] ?? 'N/A';
		$line = $frame['line'] ?? 'N/A';

		$function = ($frame['class'] ?? '') . ($frame['type'] ?? '') . ($frame['function'] . '(' ?? 'N/A');
		if ($function != 'N/A') {
			if (!empty($frame['args'])) $function .=  implode(', ', $frame['args']);
			$function .= ')';
		}

		$log .= "#$index $file:$line - $function\n";
	}

	error_log($log, 3, "mon_fichier_log.log");
}
