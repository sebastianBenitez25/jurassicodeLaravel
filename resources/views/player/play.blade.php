@extends('layouts.public')

@section('title','Jugar')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h1 class="h5 mb-2">¡Hola, {{ auth()->user()->nombre }}!</h1>
          <p class="text-muted mb-0">
            Acá va el panel para jugar / unirse a partidas. (Placeholder)
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
