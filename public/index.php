<?php 

// todas las rutas serán relativas a la raíz del sitio
chdir(dirname(__DIR__));

// constantes para emprolijar
define('SYS_PATH', 'core/');
define('APP_PATH', 'app/');


// hacemos disponibles los archivos Router y routes
require SYS_PATH . "Router.php";
require APP_PATH . "http/routes.php";

// obtenemos la url que está en una query_string llamada url
$url = isset($_GET['url']) ? $_GET['url'] : '';
 

// denntro del try codificamos laas acciones
 try {

 	// obtenemos la acción de la ruta con el método getaction() con la url obtenida como parámetro
 	$action = Router::getAction($url);
 	
 	// traemos el nombre del controlador, mediante el array action con el index controller
    $controllerName = $action['controller'];

    // traemos el nombre del method, mediante el array action con el index method
    $method = $action["method"];

    // requerimos dinámicamente el controlador basado en el nombre del controlador que está arriba
    require APP_PATH . "controllers/" . $controllerName . ".php";

    // instanciamos el controlador
    $controller = new $controllerName();

    // llamamos al método del controlador
    $controller->$method();    

 } catch (Exception $e) {
 	echo($e->getMessage());
 }

 ?>