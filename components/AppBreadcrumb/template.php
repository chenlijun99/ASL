<?php 
// remove query parameters
$url = strtok($_SERVER["REQUEST_URI"], "?");
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

	if (isset($model["paths"][$path])) {
		echo '<a class="section" href="' . $path . '">' . $model["paths"][$path] . '</a>';
		echo '<div class="divider">/</div>';
	}

	++$index;
}
?>
</div>
