@extends('recipe.layout')
@section('title')
  Recipe
@endsection
@section('content')
  <div class="container">
    <h4>{{$recipe->title}}</h4>
    <span class="text-muted">Serving:{{$recipe->serving}}</span> <br>
    <span class="text-muted">Cook Time:{{$recipe->cook_time}}</span>
    <p>
      {{$recipe->description}}
    </p>
    <a href="{{route('recipe.index')}}" class="btn btn-outline-dark">All Recipies</a>
  </div>
@endsection