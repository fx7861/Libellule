<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    public function createAction() {
        return new Response('<h1>JE SUIS SUR LA PAGE CREATION ARTICLE</h1>');
    }

    public function editAction() {
        return new Response('<h1>JE SUIS SUR LA PAGE EDIT ARTICLE</h1>');
    }
}