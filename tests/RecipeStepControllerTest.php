<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RecipeStepControllerTest extends TestCase
{
	//use DatabaseMigrations;
	
    /**
     * Create Step test.
     *
     * @return void
     */
    public function testCreateStep()
    {
	
	    $this->json('POST', '/api/recipe',
		    [
			    'title' => 'American Chopsuey',
			    'description' => 'American chop suey is believed to be invented by Chinese immigrants in America in 1880s. A dish consisting of meat, veggies and noodles cooked quickly in sweet and tangy thickened sauce. A meal by itself!',
			    'user_id' => 1
		    ]);
	    
        $this->json('POST', '/api/recipe/step',
		    [
		    	'recipe_id' => 2,
		    	'step_order' => 1,
		    	'description' => 'Heat oil in a pan, add cut vegetables and saute for a minute.'
		    ])->seeJson(['description' => 'Heat oil in a pan, add cut vegetables and saute for a minute.','step_order' => 1]);
	
	
	    $this->seeInDatabase('recipe_steps', ['description' => 'Heat oil in a pan, add cut vegetables and saute for a minute.']);
    }
	
	/**
	 * Get single Ingredient test.
	 *
	 * @return void
	 */
	public function testGetStep()
	{
		$this->json('GET', '/api/recipe/steps/2')->seeJson(['description' => 'Heat oil in a pan, add cut vegetables and saute for a minute.']);
	}
	
	
	/**
	 * update Step test.
	 *
	 * @return void
	 */
	public function testUpdateStep()
	{
		$this->json('PUT', '/api/recipe/step/1', [
			'description' => 'Heat oil in one pan, add cut vegetables and saute for a minute.'
		])->seeJson(['description' => 'Heat oil in one pan, add cut vegetables and saute for a minute.']);
		
		$this->seeInDatabase('recipe_steps', ['description' => 'Heat oil in one pan, add cut vegetables and saute for a minute.']);
	}
	
	
	
	/**
	 * Delete Step test.
	 *
	 * @return void
	 */
	public function testDeleteStep()
	{
		$this->json('DELETE', '/api/recipe/step/1');
		
		$this->missingFromDatabase('recipe_steps', ['description' => 'Heat oil in one pan, add cut vegetables and saute for a minute.']);
	}
}
