<?php

namespace app\Core\Route;

use app\Core\Exception\RouteException;

class Route{

    protected static $routes = array();

    public static function get(array $routes = []) 
    {
        self::add($routes, "GET");
    }

    public static function post(array $routes = [])
    {
        self::add($routes,"POST");
    }

    public static function add(array $routes = [], $method) {

        foreach ($routes as $uri => $controllers) {

            self::$routes[$method][$uri] = $controllers;
        }

    }

    public static function resolved() {
        // Mendapatkan URI yang diminta dari permintaan HTTP saat ini
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        // Mendapatkan metode HTTP yang digunakan dalam permintaan saat ini
        $method = $_SERVER["REQUEST_METHOD"];
       
    
        // Memeriksa apakah ada route yang sesuai dengan URI dan metode HTTP yang diminta
        if ($method === "GET" || $method === "POST") {

            // dd($method);

            foreach (self::$routes[$method] as $route => $controllers) {
              
                // Mencocokkan URI dengan pola route
                $pattern = str_replace("/", "\/", $route);
                $pattern = preg_replace("/{([a-zA-Z0-9]+)}/", "([a-zA-Z0-9]+)", $pattern);
                if (preg_match("/^" . $pattern . "$/", $uri, $matches)) {
                    // Jika route ditemukan, mengambil kelas controller dan metode yang sesuai
                    $controllerClass = $controllers[0];
                    $controllerMethod = $controllers[1];

                    // chek mothod di kelass controlller apkah tersedia 
                    if (class_exists($controllerClass) && method_exists($controllerClass, $controllerMethod)) {
                        // Mengonversi backslash dalam nama namespace menjadi DIRECTORY_SEPARATOR yang sesuai dengan sistem file
                        $controllerClass = str_replace("\\", DIRECTORY_SEPARATOR, $controllerClass);
            
                        // Mendapatkan jalur lengkap ke file kelas controller
                        $controllerFilePath = get_base_path($controllerClass . ".php");
            
                        // Memuat file kelas controller
                        require_once $controllerFilePath;
            
                        // Membuat instance dari kelas controller
                        $controller = new $controllerClass();

                         // bagi url menjadi bagian bagian dan ambil id atau url bagian ahir and 
                        $segments = explode("/", $uri);
                        $id = end($segments);
            
                        // Memanggil metode  kelas controller, dan ambil parameter dari url bagian ahir url=/posts/{1}->
                        $controller->$controllerMethod($id);
            
                        // Menghentikan iterasi setelah menemukan route yang cocok
                        return;
                    }else {
                        RouteException::RouteExceptionErrorMethodAndCalss($controllerMethod, $controllerClass);
                        
                    }
                }
            }
        }
        // Jika route tidak ditemukan, tampilkan halaman 404
        self::handleNotFound();
    
    }
    
    public static function handleNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        exit("404 Not Found"); 
    }
}

