@extends('recipe.layout')
@section('title')
  Update Recipe
@endsection
@section('content')
  <div class="mt-4 mx-5">
    <h2>Update Recipe : {{$recipe->title}}</h2>
    @if(session('recipe_success'))
      <div class="alert alert-success">
        {{session('recipe_success')}}
      </div>
    @endif
    <form action="{{route('recipe.update',$recipe->id)}}" class="mt-4" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title">Recipe Title:</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter recipe title"
        value="{{$recipe->title}}">
        @error('title')
          <span class="text-danger">Recipe Title is Required.</span>
        @enderror
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Servings:</label>
            <input type="number" min="1" class="form-control @error('serving') is-invalid @enderror" name="serving" placeholder="Enter servings" value="{{$recipe->serving}}">
            @error('serving')
              <span class="text-danger">Servings is required.</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Cook Time:</label>
            <input type="text" class="form-control @error('cook_time') is-invalid @enderror" name="cook_time"
             placeholder="Enter cook time"
             value="{{$recipe->cook_time}}">
            @error('cook_time')
              <span class="text-danger">Cook time is Required.</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="description">Full Recipe:</label>
        <textarea name="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter full recipe">{{$recipe->description}}</textarea>
        @error('description')
          <span class="text-danger">Full recipe is Required.</span>
        @enderror
      </div>
      <input type="submit" value="Update Recipe" class="btn btn-dark">
    </form>
  </div>
@endsection