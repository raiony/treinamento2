<?php

require_once "vendor/autoload.php";

$app = new Silex\Application();


$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array (
        'mysql' => array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'treinamento2',
            'user'      => 'usu',
            'password'  => 'usu',
            'charset'   => 'utf8',
        )
    ),
));


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


$app->get('/lista/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM usuario WHERE id = 1";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));


    return  "<h1>{$post['nome']}</h1>".
    "<p>{$post['idade']}</p>";
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

require_once"src/rotas.php";

require_once"store/store.php";

$app->run();
