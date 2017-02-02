<?php
use App\Middleware\SecurityMiddleware;

// Home
$app->get('/', 'App\Action\HomeController:home')
    ->setName('home');
