<?php 
function matchPath(array $paths, string $path) {
	if (isset($paths[$path])) {
		return $path;
	}

	foreach($paths as $key => $value) {
		$regex = preg_replace("/:\w+/", "w+", preg_quote($key), -1, $count);
		if ($count > 0) {
			if (preg_match("<" . $regex . ">", $path) === 1) {
				return $key;
			}
		}
	}
	return false;
}

function getNeededParameters(array $queryParameters, $path) {
	preg_match_all("/:\w+/", $path, $matches);

	$parameters = array();
	foreach ($matches as $match) {
		$parameters[] = $queryParameters[substr($match[0], 1)];
	}
	return $parameters;
}

// get query parameter
$parts = parse_url($_SERVER["REQUEST_URI"]);
$queryParameters = array();
if (isset($parts['query'])) {
	parse_str($parts['query'], $queryParameters);
}

// remove query parameters
$url = $_SERVER["REQUEST_URI"];
// remove trailing slashes
$url = preg_replace("/\/*$/", "", $url);
$pathFragments =  explode("/", $url);

$paths = array();
for ($i = 0, $length = count($pathFragments); $i < $length; ++$i) {
	$paths[] = implode("/", array_slice($pathFragments, 0, $i + 1));
}
?>

<div class="ui breadcrumb fill">
<?php
$index = 0;
$length = count($paths);
foreach ($paths as $path) {
	if ($index === 0) {
		$path = "/";
	}

	$matchedPath = matchPath($model["paths"], $path);
	if ($matchedPath) {
		echo '<a class="section" href="' . $path . '">';
		if (is_callable($model["paths"][$matchedPath])) {
			$parameters = getNeededParameters($queryParameters, $matchedPath);
			echo call_user_func_array($model["paths"][$matchedPath], $parameters);
		} else {
			echo $model["paths"][$matchedPath];
		} 
		echo '</a>';
		echo '<i class="right angle icon divider"></i>';
	}

	++$index;
}

?>
</div>
