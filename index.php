<?php



//$content = file_get_contents(__DIR__ . '/test.json');
//
//$obj = json_decode($content);
//echo $obj->foo;die();

$obj = new stdClass();
$obj->title = 'zagolovok';
$obj->text = 'text';

echo json_encode($obj); die;

require_once __DIR__ . '/autoload.php';


$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = 'Application\Controllers\\' . $ctrl;

//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';
try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
}
catch (Exception $e) {

    $view = new View();
    $view->error = $e->getMessage();
    $view->display('error.php');

//    die('Something wrong!!! ' . $e->getMessage());
}

