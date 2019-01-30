<?php

use Libellule\Core\Core;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

$request = Request::createFromGlobals();

// TODO : Vérifiez si le fichier de config existe. (Fichier + Tableau)
require '../config/config.php';

$core = new Core($l_routes);

$response = $core->handle($request);

$response->send();