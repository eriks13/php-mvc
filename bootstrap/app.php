<?php

require BASE_PATH. "vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;

$dotEnv =  new Dotenv();

$dotEnv->load(BASE_PATH.".env");


require BASE_PATH. "config/Config.php";

require BASE_PATH."app/Core/function.php";


require BASE_PATH. "route/web.php";
