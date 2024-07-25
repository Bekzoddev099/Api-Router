<?php

declare(strict_types=1);

class Router
{
    public $updates;

    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }

    public function isApicall()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        return array_search('api', $path);
    }

    public function getResourceTd()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        $resourceId = $path[count($path)-1];
        return is_numeric($resourceId) ? $resourceId : false;
    }

    public function isTelegramUpdate()
    {
        if (isset($this->updates->chat_id)) {
            return true;
        }
        return false;
    }
}
