<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RecipeControllerTest extends TestCase
{
	//use DatabaseMigrations;
	
    /**
     * Create Recipe test.
     *
     * @return void
     */
    public function testCreateRecipe()
    {
        $this->json('POST', '/api/recipe',
		    [
		    	'title' => 'American Chopsuey',
			    'description' => 'American chop suey is believed to be invented by Chinese immigrants in America in 1880s. A dish consisting of meat, veggies and noodles cooked quickly in sweet and tangy thickened sauce. A meal by itself!',
			    'user_id' => 1
		    ])->seeJson(['title' => 'American Chopsuey']);
	
	
	    $this->seeInDatabase('recipes', ['title' => 'American Chopsuey']);
    }
	
	/**
	 * Get single Recipe test.
	 *
	 * @return void
	 */
	public function testGetRecipe()
	{
		$this->json('GET', '/api/recipe/1')->seeJson(['title' => 'American Chopsuey']);
	}
	
	
	/**
	 * update Recipe test.
	 *
	 * @return void
	 */
	public function testUpdateRecipe()
	{
		$this->json('PUT', '/api/recipe/1', [
			'title' => 'Lovely American Chopsuey'
		])->seeJson(['title' => 'Lovely American Chopsuey']);
		
		$this->seeInDatabase('recipes', ['title' => 'Lovely American Chopsuey']);
	}
	
	
	
	/**
	 * Delete Recipe test.
	 *
	 * @return void
	 */
	public function testDeleteRecipe()
	{
		$this->json('DELETE', '/api/recipe/1');
		
		$this->missingFromDatabase('recipes', ['title' => 'Lovely American Chopsuey']);
	}
}
