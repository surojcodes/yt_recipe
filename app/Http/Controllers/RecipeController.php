<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        $recipies = Recipe::all();
        return view('recipe.index',compact('recipies'));
    }
    public function create(){
        return view('recipe.create');
    }
    public function show(Recipe $recipe){
        return view('recipe.show',compact('recipe'));
    }
    public function store(Request $req){
        $data = $req->validate([
            'title'=>'required',
            'serving'=>'required',
            'cook_time'=>'required',
            'description'=>'required'
        ]);
        Recipe::create($data);
        return redirect()->route('recipe.index')->with('recipe_success','Recipe Created');
    }
    public function edit(Recipe $recipe){
        return view('recipe.edit',compact('recipe'));
    }
    public function update(Request $req,Recipe $recipe){
        $data = $req->validate([
            'title'=>'required',
            'serving'=>'required',
            'cook_time'=>'required',
            'description'=>'required'
        ]);
        $recipe->update($data);
        return redirect()->route('recipe.index')->with('recipe_success','Recipe Updated');
    }
    public function destroy(Recipe $recipe){
        $recipe->delete();
        return redirect()->route('recipe.index')->with('recipe_success','Recipe Deleted');
    }
}
