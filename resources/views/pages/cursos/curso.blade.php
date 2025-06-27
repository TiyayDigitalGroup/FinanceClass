@extends('layouts.app')

@section('title', 'Curso | ' . $curso->title)
@section('description', 'Descripción de la página')

@section('content')
<div x-data="{ index: 0, total: {{ count($curso->files) }} }" x-init="$watch('index', () => $nextTick(() => window.scrollTo(0, 0)))">
  <x-course.banner :curso="$curso" />
  
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid lg:grid-cols-4 gap-8">
      <x-course.sidebar :archivos="$curso->files" />
      <x-course.viewer-panel :curso="$curso" />
    </div>
  </main>
</div>
@endsection
