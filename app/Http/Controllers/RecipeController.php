<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeStep;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Create a new RecipeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	/**
	 * Lists all of the Recipes
	 *
	 * @return Json
	 */
    public function showAllRecipes() {
	    return response()->json(Recipe::all());
    }
	
	/**
	 * Return a specific Recipe
	 *
	 * @return Json
	 */
    public function showOneRecipe($id) {
	    $recipe = Recipe::findOrFail($id);
	    $recipe->ingredients;
	    $recipe->steps;
	
	    return response()->json($recipe);
    }
    
	/**
	 * Create new Recipe
	 *
	 * @return Json
	 */
    public function create(Request $request) {
	    $this->validate($request, [
		    'title' => 'required|unique:recipes|string|min:10|max:150',
		    'description' => 'required|string|min:10',
		    'user_id' => 'required|integer|min:1'
	    ]);
	
	    $recipe = Recipe::create($request->all());
	
	    return response()->json($recipe, 201);
    }
	
	/**
	 * Update existing Recipe
	 *
	 * @return Json
	 */
    public function update($id, Request $request) {
	    $this->validate($request, [
		    'description' => 'string|min:10',
		    'user_id' => 'integer|min:1'
	    ]);
	    $recipe = Recipe::findOrFail($id);
	    $recipe->update($request->all());
	    return response()->json($recipe, 200);
    }
	
	
	
	/**
	 * Delete existing Recipe
	 *
	 * @return Json
	 */
    public function delete($id) {
	    Recipe::findOrFail($id)->delete();
	    return response('Deleted Successfully.', 200);
    }
}
