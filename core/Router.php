<?php 
class Router 
{
	// array que almacena acciones
	private static $routes = [];

	private function __construct(){}

	// pone acciones al array
	public static function add($route,$controller,$method)
	{
		// enlace estático en tiempo de ejecución
		// guardamos en cada acción el controlador y el método 
	 	static::$routes[$route] = ["controller" => $controller,"method" => $method]; 
	}


    // obtenemos la acción
	public static function getAction($route)
	{
		// verificamos que la acción exista en el vector
	 	if (array_key_exists($route, static::$routes)) {
	 		
	 		// si existe el index con la acción, lo devolvemmos
	 		return static::$routes[$route] ;
	 	}
	 	else{
	 		// la ruta no fue encontrada
		    throw new Exception("the route $route was not found");
        }
	}
}
 ?>







