<?php

namespace Libellule\Router;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{

    private $router;

    /**
     * Router constructor.
     * Initialise le router avec le tableau de routes
     * @param array $l_routes
     */
    public function __construct(array $l_routes)
    {
        $this->router = new \AltoRouter();
        $this->router->addRoutes($l_routes);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function matcher(Request $request): Response {
        $this->router->setBasePath($request->getBaseUrl());

        $match = $this->router->match();

        if ($match) {
            $target = explode('::', $match['target']);
            $controller = new $target[0];
            $action = $target[1];
            return call_user_func([$controller, $action], $match['params']);
        } else {
            return new Response('Erreur 404', Response::HTTP_NOT_FOUND);
        }
    }
}