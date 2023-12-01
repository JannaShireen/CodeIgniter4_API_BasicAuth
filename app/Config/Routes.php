<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group("api", ["namespace" => "App\Controllers\Api"], function ($routes){

    //category
    $routes->post("create-category","ApiController::createCategory");
    $routes->get("list-category", "ApiController::listCategory");

    //blog
    $routes->post("create-blog", "ApiController::createBlog");
    $routes->get("list-blog", "ApiController::listBlogs");
    $routes->get("single-blog/(:num)", "ApiController::singleBlogDetail/$1");
    $routes->put("update-blog/(:num)", "ApiController::updateBlog/$1");
    $routes->delete("delete-blog/(:num)", "ApiController::deleteBlog/$1");




});
