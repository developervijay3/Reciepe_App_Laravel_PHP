<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RecipeIngredientControllerTest extends TestCase
{
	//use DatabaseMigrations;
	
    /**
     * Create Ingredient test.
     *
     * @return void
     */
    public function testCreateIngredient()
    {
	
	    $this->json('POST', '/api/recipe',
		    [
			    'title' => 'American Chopsuey',
			    'description' => 'American chop suey is believed to be invented by Chinese immigrants in America in 1880s. A dish consisting of meat, veggies and noodles cooked quickly in sweet and tangy thickened sauce. A meal by itself!',
			    'user_id' => 1
		    ]);
	    
        $this->json('POST', '/api/recipe/ingredient',
		    [
		    	'recipe_id' => 2,
		    	'name' => 'capsicum',
			    'quantity' => 50,
			    'unit' => 'gram'
		    ])->seeJson(['name' => 'capsicum','quantity' => 50,'unit' => 'gram']);
	
	
	    $this->seeInDatabase('ingredients', ['name' => 'capsicum']);
    }
	
	/**
	 * Get single Ingredient test.
	 *
	 * @return void
	 */
	public function testGetIngredient()
	{
		$this->json('GET', '/api/recipe/ingredients/2')->seeJson(['name' => 'capsicum']);
	}
	
	
	/**
	 * update Ingredient test.
	 *
	 * @return void
	 */
	public function testUpdateIngredient()
	{
		$this->json('PUT', '/api/recipe/ingredient/1', [
			'name' => 'cabbage'
		])->seeJson(['name' => 'cabbage']);
		
		$this->seeInDatabase('ingredients', ['name' => 'cabbage']);
	}
	
	
	
	/**
	 * Delete Ingredient test.
	 *
	 * @return void
	 */
	public function testDeleteIngredient()
	{
		$this->json('DELETE', '/api/recipe/ingredient/1');
		
		$this->missingFromDatabase('ingredients', ['name' => 'cabbage']);
	}
}
