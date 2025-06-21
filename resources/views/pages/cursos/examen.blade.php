@extends('layouts.app')

@section('title', 'Curso - {{ $curso->titulo }}')
@section('description', 'Descripción de la página')

@section('content')
<x-ui.state-poster tipo="info" titulo="Pagina en desarrollo"
  mensaje="Estamos trabajando para traerte esta funcionalidad." porcentaje-progreso="75" mostrar-progreso />
@endsection