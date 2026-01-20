<?php

class BaseController
{
    protected $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    protected function render($view, array $data = [])
    {
        view($view, $data);
    }
}
