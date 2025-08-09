@extends('layouts.public')

@section('title','Jugar')

@section('content')
<div class="container">
  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="h5 mb-2">¡Hola, {{ auth()->user()->nombre }}!</h1>
      <p class="text-muted mb-0">Acá va el panel para jugar / unirse a partidas. (Placeholder)</p>
    </div>
  </div>
</div>
@endsection
