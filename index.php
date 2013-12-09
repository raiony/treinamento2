<?php

require_once "vendor/autoload.php";

$app = new Silex\Application();

$app['posts'] = array(
    1 => array(
        'titulo' => 'Artigo 1',
        'texto' => 'materia do artigo1'

    ),
    2 => array(
        'titulo' => 'Artigo 2',
        'texto' => 'materia do artigo1'

    ),
    3 => array(
        'titulo' => 'Artigo 3',
        'texto' => 'materia do artigo1'

    ));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => 'views'
));

$app->get("/posts", function() use ($app){
    return $app['twig']->render('posts.html', array(
        'posts'=> $app['posts']
    ));
});

$app->get("/contato", function() use ($app){
    return $app['twig']->render('contato.html');
});


$app->get("/sobre", function() use ($app){
    return $app['twig']->render('sobre.html');
});


$app->get("/home", function() use ($app){
    return $app['twig']->render('index.html');
});

$app->run();
