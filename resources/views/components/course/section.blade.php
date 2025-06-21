<div>
  <x-course.header :titulo="$titulo" :descripcion="$descripcion" :icono="$icono" :color="$color"
    :cantidad="count($cursos)" />

  <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($cursos as $curso)
      <x-course.card :curso="$curso" :tipo="$tipo" :color="$color" />
    @endforeach
  </div>
</div>