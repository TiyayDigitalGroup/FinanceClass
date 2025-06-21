@extends('layouts.app')

@section('title', 'Inicio')
@section('description', 'Descripción de la página')

@section('content')
  @include("partials.inicio.hero")
  @include("partials.inicio.feature")
  @include("partials.inicio.about")
  @include("partials.inicio.cta")
@endsection