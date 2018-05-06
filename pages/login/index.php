<?php
echo (new Framework\Renderer(file_get_contents('template.html', FILE_USE_INCLUDE_PATH)))->render();
?>

