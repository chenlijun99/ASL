<?php
//session_start();

//Header("Location: http://$_SERVER[SERVER_NAME]/pages/login/?error=401"); 
?>

<?php
echo (new Framework\Renderer(file_get_contents('template.html', FILE_USE_INCLUDE_PATH)))->render();
?>
