<?php
/**
 * Created by PhpStorm.
 * User: leetspeakv2
 * Date: 24/12/16
 * Time: 18:37
 */

namespace App\Middleware;


class SecurityMiddleware extends Middleware
{
    public function __invoke($request,$response,$next)
    {
        // ajouter '!'
        if(!isset($_SESSION['admin'])){
            return $response->withRedirect($this->container->router->pathFor('auth'));
        }
        $response = $next($request, $response);
        return $response;
    }
}