<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
));

$app['menu'] = $app->share(function ($app) {
    $data = require __DIR__ . '/../src/menus.php';
    return new Ratchet\Menu($app['request'], $data);
});

$app->get('/{page}', function ($page) use ($app) {
    $page = rtrim($page, '/');

    if (!file_exists(__DIR__ . '/../views/' . $page . '.html.twig')) {
        $app->abort(404);
    }

    return $app['twig']->render($page . '.html.twig');
})
    ->assert('page', '[a-zA-Z0-9\/_-]+')
    ->value('page', 'index');

$app->error(function ($e, $code) use ($app) {
    if (404 === $code) {
        return $app['twig']->render('404.html.twig');
    }
});

$app->run();
