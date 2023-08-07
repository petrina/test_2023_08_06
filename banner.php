<?php

error_reporting(E_ALL);
ini_set('error_reporting', 1);
require_once "./services/BannerService.php";
require_once "./classes/Response.php";
require_once "./classes/Request.php";
require_once "./classes/Config.php";
require_once "./classes/Mysql.php";
require_once './repository/VisitorRepository.php';

$mysql = new Mysql();

$bannerService = new BannerService(
    new VisitorRepository($mysql),
    new Request()
);
$responseDTO = $bannerService->action();

$response = new Response();
$response->setHeaders($responseDTO->getHeaders())
    ->setResponse($responseDTO->getResponse())
    ->responseBinary();