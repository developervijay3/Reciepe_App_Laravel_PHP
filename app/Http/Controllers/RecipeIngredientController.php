<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    /**
     * Create a new RecipeIngredientController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	/**
	 * Lists all of the Ingredient for given Recipe
	 *
	 * @return Json
	 */
    public function ingredientsForRecipe($id) {
	    return response()->json(Ingredient::where('recipe_id',$id)->get());
    }
    
	/**
	 * Create new Recipe's Ingredient
	 *
	 * @return Json
	 */
    public function create(Request $request) {
	    $this->validate($request, [
		    'recipe_id' => 'required|integer|exists:recipes,id',
		    'name' => 'required|string|min:3|max:150',
		    'quantity' => 'required|numeric|min:0.001',
		    'unit' => 'required|in:gram,litre,piece'
	    ]);
	    
	    $recipeIngredient = Ingredient::create($request->all());
	
	    return response()->json($recipeIngredient, 201);
    }
	
	/**
	 * Update existing Recipe's Ingredient
	 *
	 * @return Json
	 */
    public function update($id, Request $request) {
    	
	    $this->validate($request, [
		    'recipe_id' => 'integer|exists:recipes,id',
		    'name' => 'string|min:3|max:150',
		    'quantity' => 'numeric|min:0.001',
		    'unit' => 'in:gram,litre,piece'
	    ]);
	    
	    $recipeIngredient = Ingredient::findOrFail($id);
	    $recipeIngredient->update($request->all());
	
	    return response()->json($recipeIngredient, 200);
    }
	
	
	
	/**
	 * Delete existing Recipe's Ingredient
	 *
	 * @return Json
	 */
    public function delete($id) {
	    Ingredient::findOrFail($id)->delete();
	    return response('Deleted Successfully.', 200);
    }
}
