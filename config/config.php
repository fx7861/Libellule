<?php

$l_routes = [
  ['GET', '/', 'App\Controller\FrontController::homeAction', 'front_home'],
  ['GET', '/[:category]', 'App\Controller\FrontController::categoryAction', 'front_category'],
  ['GET', '/[:category]/[i:id]-[:slug]', 'App\Controller\FrontController::articleAction', 'front_article'],
  ['GET', '/creer-un-article', 'App\Controller\ArticleController::createAction', 'article_create'],
  ['GET', '/editer-un-article/[i:id]', 'App\Controller\ArticleController::editAction', 'article_edit']
];