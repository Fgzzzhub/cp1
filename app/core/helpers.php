<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function base_url($path = '')
{
    $base = rtrim(BASE_URL, '/');
    if ($base === '') {
        return $path ? '/' . ltrim($path, '/') : '';
    }

    return $base . ($path ? '/' . ltrim($path, '/') : '');
}

function route_url($route = '', array $params = [])
{
    $route = trim($route, '/');
    if ($route !== '') {
        $params = array_merge(['route' => $route], $params);
    }

    $query = http_build_query($params);
    $base = base_url('index.php');

    return $query === '' ? $base : $base . '?' . $query;
}

function current_route()
{
    if (defined('CURRENT_ROUTE')) {
        return CURRENT_ROUTE;
    }

    return trim((string) ($_GET['route'] ?? ''), '/');
}

function view($template, array $data = [])
{
    $template = trim($template, '/');
    $path = dirname(__DIR__) . '/views/' . $template . '.php';

    if (!is_file($path)) {
        http_response_code(500);
        echo 'View not found.';
        return;
    }

    extract($data, EXTR_SKIP);
    require $path;
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field()
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function validate_csrf($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token ?? '');
}

function is_logged_in()
{
    return !empty($_SESSION['user']);
}

function require_login()
{
    if (!is_logged_in()) {
        redirect(route_url('admin/login'));
    }
}
