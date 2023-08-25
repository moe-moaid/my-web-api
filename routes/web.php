<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/contact','contactInfoController@getContactInfo');

    $router->get('/hero','heroController@getHero');

    $router->get('/about','aboutController@getAbout');
    $router->post('/postabout','aboutController@postAbout');

    $router->get('/exp','experienceController@getExperiences');

    $router->get('/skills','skillsController@getSkills');

    $router->get('/projects','projectsController@getProjects');
});