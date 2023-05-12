@extends('layout')

@section('menu')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Weather report<span class="sr-only"></span></a>
</li>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Site statistics<span class="sr-only"></span></a>
</li>
@endsection


@section('content')
    <h1 class="text-uppercase fs-1 fw-bold mt-5">Úvodná stránka</h1>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus eius reiciendis suscipit ut voluptas
        voluptatibus? Autem blanditiis, error et natus neque nulla odio placeat quam voluptatem voluptatum. Dicta, sapiente.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias consectetur cum deleniti error eum facere in
        ipsum libero maiores neque officia placeat, quia quis, ratione reiciendis reprehenderit tempora voluptas?
    </p>
@endsection