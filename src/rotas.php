<?php

use \Symfony\Component\HttpFoundation\Request;

$app->get("/rotae", function() use ($app){
    return $app['twig']->render('index.html');
});
