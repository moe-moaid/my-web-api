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
    $router->get('/getcontact','contactInfoController@getContactInfo');
    $router->post('/postcontact','contactInfoController@postContactInfo');

    $router->get('/hero','heroController@getHero');

    $router->get('/getabout','aboutController@getAbout');
    $router->post('/postabout','aboutController@postAbout');

    $router->get('/getexp','experienceController@getExperiences');
    $router->post('/postexp','experienceController@postExperiences');

    $router->get('/skills','skillsController@getSkills');

    $router->get('/getprojects','projectsController@getProjects');
    $router->post('/projects','projectsController@postProjects');
});