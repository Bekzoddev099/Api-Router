<?php

declare(strict_types=1);

require "vendor/autoload.php";

$router = new Router();

if ($router->isApiCall()){
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if ($router->getREsourceTd()) {
            echo 'Task' . $router->getResourceTd();
            return;
        }
        echo 'all tasks';
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo 'Add new recourse';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
        echo 'Resourse' . $router->getResourceTd().' updated';
    }
}
