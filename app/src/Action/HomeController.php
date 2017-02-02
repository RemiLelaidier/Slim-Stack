<?php
/**
 * Created by PhpStorm.
 * User: leetspeakv2
 * Date: 25/12/16
 * Time: 22:23
 */

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;


class HomeController extends Controller
{
    /**
     * Page Home
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function home(Request $request, Response $response, $args){
        $this->logger->info("Home page action dispatched");

        $this->view->render($response, 'home.twig');
        return $response;
    }
}
