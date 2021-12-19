@extends('recipe.layout')
@section('title')
  All Recipies
@endsection
@section('content')
  <div class="mt-4 mx-5">
    <h2>All Recipies</h2>
    <a href="{{route('recipe.create')}}" class="btn btn-dark">Add Recipe</a>
     @if(session('recipe_success'))
      <div class="alert alert-success">
        {{session('recipe_success')}}
      </div>
    @endif
    <div class="row mt-3">
      @foreach ($recipies as $recipe)
        <div class="col-md-4 mb-3">
          <div class="card shadow">
            <div class="card-body">
              <h5 class='card-title'><a href="{{route('recipe.show',$recipe->id)}}">{{$recipe->title}}</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">Servings:{{$recipe->serving}}</h6>
              <h6 class="card-subtitle mb-2 text-muted">Cook Time:{{$recipe->cook_time}}</h6>
              <p class='card-text'>
                {{$recipe->description}}
              </p>
              <a href="{{route('recipe.edit',$recipe->id)}}" class="btn btn-outline-secondary">Edit Recipe</a>
              <form action="{{route('recipe.destroy',$recipe->id)}}" method="POST" class="mt-2">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">Delete Recipe</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection