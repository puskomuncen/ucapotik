<?php

namespace PHPMaker2025\apotik2025baru;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Symfony\Component\Routing\Attribute\Route;

class JadwalPraktekController extends ControllerBase
{
    // list
    #[Route("/jadwalprakteklist[/{id_jadwal}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "list.jadwal_praktek")]
    public function list(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "JadwalPraktekList");
    }

    // add
    #[Route("/jadwalpraktekadd[/{id_jadwal}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "add.jadwal_praktek")]
    public function add(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "JadwalPraktekAdd");
    }

    // view
    #[Route("/jadwalpraktekview[/{id_jadwal}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "view.jadwal_praktek")]
    public function view(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "JadwalPraktekView");
    }

    // edit
    #[Route("/jadwalpraktekedit[/{id_jadwal}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "edit.jadwal_praktek")]
    public function edit(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "JadwalPraktekEdit");
    }

    // delete
    #[Route("/jadwalpraktekdelete[/{id_jadwal}]", methods: ["GET", "POST", "OPTIONS"], defaults: ["middlewares" => [PermissionMiddleware::class, AuthenticationMiddleware::class]], name: "delete.jadwal_praktek")]
    public function delete(Request $request, Response &$response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "JadwalPraktekDelete");
    }
}
