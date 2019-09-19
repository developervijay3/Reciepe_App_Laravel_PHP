<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Recipe extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id'
    ];
	
	
	
	public function ingredients()
	{
		return $this->hasMany('App\Ingredient','recipe_id','id');
	}
	
	
	public function steps()
	{
		return $this->hasMany('App\RecipeStep','recipe_id','id');
	}
}
