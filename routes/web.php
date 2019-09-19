<?php

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

//recipes
$router->group(['prefix' => 'api'], function () use ($router) {
	$router->get('recipes',  ['uses' => 'RecipeController@showAllRecipes']);
	
	$router->get('recipe/{id}', ['uses' => 'RecipeController@showOneRecipe']);
	
	$router->post('recipe', ['uses' => 'RecipeController@create']);
	
	$router->put('recipe/{id}', ['uses' => 'RecipeController@update']);
	
	$router->delete('recipe/{id}', ['uses' => 'RecipeController@delete']);
});

//ingredients
$router->group(['prefix' => 'api/recipe'], function () use ($router) {
	
	$router->get('ingredients/{id}',  ['uses' => 'RecipeIngredientController@ingredientsForRecipe']);
	
	$router->post('ingredient', ['uses' => 'RecipeIngredientController@create']);
	
	$router->put('ingredient/{id}', ['uses' => 'RecipeIngredientController@update']);
	
	$router->delete('ingredient/{id}', ['uses' => 'RecipeIngredientController@delete']);
});

//steps
$router->group(['prefix' => 'api/recipe'], function () use ($router) {
	
	$router->get('steps/{id}',  ['uses' => 'RecipeStepController@stepsForRecipe']);
	
	$router->post('step', ['uses' => 'RecipeStepController@create']);
	
	$router->put('step/{id}', ['uses' => 'RecipeStepController@update']);
	
	$router->delete('step/{id}', ['uses' => 'RecipeStepController@delete']);
});