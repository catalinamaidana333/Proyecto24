<?php

/**
 * Punto de entrada para Vercel (runtime vercel-php).
 * Redirige todas las peticiones al front controller de Laravel.
 */

$tmp = '/tmp';

foreach (['views', 'cache'] as $dir) {
    if (! is_dir($tmp.'/'.$dir)) {
        @mkdir($tmp.'/'.$dir, 0777, true);
    }
}

// El filesystem de Vercel es de solo lectura salvo /tmp.
$overrides = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_CONFIG_CACHE' => $tmp.'/config.php',
    'APP_EVENTS_CACHE' => $tmp.'/events.php',
    'APP_PACKAGES_CACHE' => $tmp.'/packages.php',
    'APP_ROUTES_CACHE' => $tmp.'/routes.php',
    'APP_SERVICES_CACHE' => $tmp.'/services.php',
    'VIEW_COMPILED_PATH' => $tmp.'/views',
    'SESSION_DRIVER' => 'cookie',
    'CACHE_STORE' => 'array',
    'QUEUE_CONNECTION' => 'sync',
    'LOG_CHANNEL' => 'stderr',
];

// Si APP_URL quedó apuntando al entorno local, usamos el dominio de Vercel.
$appUrl = getenv('APP_URL');

$isLocalUrl = $appUrl === false
    || $appUrl === ''
    || str_contains($appUrl, '.test')
    || str_contains($appUrl, 'localhost')
    || str_contains($appUrl, '127.0.0.1');

if ($isLocalUrl) {
    $vercelHost = getenv('VERCEL_ENV') === 'production'
        ? (getenv('VERCEL_PROJECT_PRODUCTION_URL') ?: getenv('VERCEL_URL'))
        : (getenv('VERCEL_URL') ?: getenv('VERCEL_PROJECT_PRODUCTION_URL'));

    if ($vercelHost) {
        $overrides['APP_URL'] = 'https://'.$vercelHost;
    }
}

foreach ($overrides as $key => $value) {
    putenv($key.'='.$value);
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

require __DIR__.'/../public/index.php';
