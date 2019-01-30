<?php

namespace Libellule\Core;

use App\Controller\ArticleController;
use Libellule\Core\Container\Container;
use Libellule\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\FrontController;


class Core
{

    private $l_routes, $container;

    public function __construct(array $l_routes) {
        $this->l_routes = $l_routes;
        $this->container = Container::getInstance();
    }

    /**
     * Initialisation du routeur
     * Initialisation de twing
     */
    public function boot() {
        $this->initializeRouter($this->l_routes);
        $this->initializeTwing();
    }



    /**
     * Initialisation de la configuration du routeur
     * @param array $l_routes - Tableau de routes de mon application.
     */
    public function initializeRouter(array $l_routes) {
        $router = new Router($l_routes);
        $this->container->set('router', $router);
    }

    /**
     * Initialisation de la configuration de twig
     * TODO : Ajouter la detection de l'environnement pour le cache
     */
    public function initializeTwing() {
        $loader = new \Twig_Loader_Filesystem($this->getTemplateDir());
        $twig = new \Twig_Environment($loader, [
            'cache' => false,
        ]);
        $this->container->set('twig', $twig);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response {
        $this->container->set('request', $request);
        $this->boot();

        return $this->container->get('router')->matcher($request);
    }

    /**
     * Return le dossier Root du projets.
     */
    public function getProjectDir() {
        $r = new \ReflectionObject($this);
        $dir = dirname($r->getFileName());
        while (!file_exists($dir.'/composer.json')) {
            $dir = dirname($dir);
        }
        return $dir;
    }

    public function getTemplateDir(): string {
        return $this->getProjectDir(). '/templates';
    }

    public function getCacheDir(): string {
        return $this->getProjectDir(). '/var/cache';
    }

    public function getPublicDir(): string {
        return $this->getProjectDir(). '/public';
    }
}