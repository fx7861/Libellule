<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class FrontController
 * @package App\Controller
 */
class FrontController
{
    public function homeAction() {
        return new Response('<h1>JE SUIS SUR LA PAGE D\'ACCUEIL</h1>');
    }

    public function categoryAction($params) {
        return new Response('<h1>JE SUIS SUR LA PAGE DE LA CATEGORIE : ' . strtoupper($params['category']) . '</h1>');
    }

    public function articleAction($params) {
        return new Response('<h1>JE SUIS SUR LA PAGE ARTICLE AVEC ID : ' . $params['id'] . ' ET LE TITRE EST : ' . strtoupper(str_replace('-', ' ', $params['slug'])) . ' ET IL SE TROUVE DANS LA CATEGORIE : ' . strtoupper($params['category']) . '</h1>');
    }

}