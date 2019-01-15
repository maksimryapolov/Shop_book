<?php 
// автозагрузка классов 
spl_autoload_register ('autoload');

function autoload($class_name)
{
// директории в которых содержаться загружаемые классы
    $array_path = array (
        '/models/',
        '/components/'
    );
    foreach($array_path as $path) {
        $path = ROOT . $path . $class_name . ".php";

        if(file_exists($path)){
            include_once $path;
        }
    }
}