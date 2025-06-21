@php
  $url = asset('storage/' . $archivo->ruta);
  $ext = strtolower($archivo->tipo);
@endphp

<div class="bg-white mt-4 border border-gray-200 rounded-2xl p-4 shadow-sm">
  @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
    <img src="{{ $url }}" alt="{{ $archivo->titulo }}" class="rounded-lg max-w-full mx-auto h-[30rem]" />
  
  @elseif ($ext === 'pdf')
    <iframe src="{{ $url }}" class="w-full h-[30rem] rounded-lg" frameborder="0"></iframe>

  @elseif (in_array($ext, ['mp4', 'webm', 'mov']))
    <video controls class="rounded-lg w-full max-h-[30rem]">
      <source src="{{ $url }}" type="video/{{ $ext }}">
      Tu navegador no soporta el video.
    </video>

  @elseif (in_array($ext, ['mp3', 'wav', 'ogg']))
    <audio controls class="w-full mt-2">
      <source src="{{ $url }}" type="audio/{{ $ext }}">
      Tu navegador no soporta el audio.
    </audio>

  @else
    <div class="text-gray-600 text-center">
      <p class="mb-2">Este tipo de archivo no puede visualizarse directamente.</p>
      <a href="{{ $url }}" target="_blank" class="text-blue-600 underline">Descargar archivo</a>
    </div>
  @endif
</div>
