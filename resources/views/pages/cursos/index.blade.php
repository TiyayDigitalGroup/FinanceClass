@extends('layouts.app')

@section('title', 'Cursos')
@section('description', 'Descripción de la página')

@section('content')
  @include("partials.cursos.hero")
  <main class="pt-16 pb-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
    <x-course.section
      titulo="Cursos Gratuitos"
      descripcion="Comienza tu viaje financiero sin costo"
      color="green"
      icono="study"
      tipo="gratis"
      :cursos="$gratuitos"
    />
  
    <x-course.section
      titulo="Cursos Premium"
      descripcion="Accede al contenido exclusivo y avanzado"
      color="purple"
      icono="star"
      tipo="premium"
      :cursos="$premium"
    />
  </main>
@endsection