<?php


use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\ErrorController;
use App\Controller\CategoryController;


function createRoute(string $controllerName, string $methodName) {
    return [
        'controller' => $controllerName,
        'method' => $methodName,
    ];
}

$routes = [
    '/' => createRoute(IndexController::class, 'indexAction'),
    '/produtos' => createRoute(ProductController::class,'listAction'),
    '/produtos/novo' => createRoute(ProductController::class,'addAction'),
    '/produtos/excluir' => createRoute(ProductController::class,'removeAction'),
    '/produtos/editar' => createRoute(ProductController::class,'editAction'),
    '/categorias' => createRoute(CategoryController::class,'listAction'),
    '/categorias/nova' => createRoute(CategoryController::class,'addAction'),
    '/categorias/excluir' => createRoute(CategoryController::class,'removeAction'),
    '/categorias/editar' => createRoute(CategoryController::class,'updateAction'),

    
  ];

  
  return $routes;