<?php
$pathDir = dirname(__FILE__);
$paths = array('controllers', 
		       'controllers'. DIRECTORY_SEPARATOR .'phase1',
		       'controllers'. DIRECTORY_SEPARATOR .'phase2',
		       'models',
		       'models' . DIRECTORY_SEPARATOR .'phase1',
		       'models' . DIRECTORY_SEPARATOR . 'phase1' . DIRECTORY_SEPARATOR .'phase2'
);
for ($k = 0; $k < count($paths); $k++) {
   set_include_path(get_include_path() . PATH_SEPARATOR . 
   		$pathDir . DIRECTORY_SEPARATOR . $paths[$k]);
}

spl_autoload_extensions('.class.php');
spl_autoload_register();

?>