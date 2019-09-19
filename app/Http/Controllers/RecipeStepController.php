<?php

namespace App\Http\Controllers;

use App\RecipeStep;
use Illuminate\Http\Request;

class RecipeStepController extends Controller
{
    /**
     * Create a new RecipeStepController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	/**
	 * Lists all of the Step for given Recipe
	 *
	 * @return Json
	 */
    public function stepsForRecipe($id) {
	    return response()->json(RecipeStep::where('recipe_id',$id)->get());
    }
    
	/**
	 * Create new Recipe's Step
	 *
	 * @return Json
	 */
    public function create(Request $request) {
    	
	    $this->validate($request, [
		    'recipe_id' => 'required|integer|exists:recipes,id',
		    'step_order' => 'required|integer|min:1',
		    'description' => 'required|string|min:10'
	    ]);
	    
	    $recipeStep = RecipeStep::create($request->all());
	
	    return response()->json($recipeStep, 201);
    }
	
	/**
	 * Update existing Recipe's Step
	 *
	 * @return Json
	 */
    public function update($id, Request $request) {
	
	    $this->validate($request, [
		    'recipe_id' => 'integer|exists:recipes,id',
		    'step_order' => 'integer|min:1',
		    'description' => 'string|min:10'
	    ]);
	
	    $recipeStep = RecipeStep::findOrFail($id);
	    $recipeStep->update($request->all());
	
	    return response()->json($recipeStep, 200);
    }
	
	
	
	/**
	 * Delete existing Recipe's Step
	 *
	 * @return Json
	 */
    public function delete($id) {
	    RecipeStep::findOrFail($id)->delete();
	    return response('Deleted Successfully.', 200);
    }
}
