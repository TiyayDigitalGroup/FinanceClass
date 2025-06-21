@extends('layouts.app')

@section('title', 'Simuladores')
@section('description', 'Descripción de la página')

@section('content')
  <x-ui.state-poster tipo="info" titulo="Pagina en desarrollo"
    mensaje="Estamos trabajando para traerte esta funcionalidad." porcentaje-progreso="50" mostrar-progreso />
@endsection