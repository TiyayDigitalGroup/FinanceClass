@extends('layouts.app')

@section('title', 'Curso | ' . $curso->titulo)
@section('description', 'Descripción de la página')

@section('content')
<header class="bg-gradient-to-r from-blue-50 to-indigo-50 pt-20 pb-8 px-4 sm:px-6 lg:px-8 text-center space-y-4">
  <div class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
    <x-icon.chat class="size-8 mr-2" />
    Chat Interactivo
  </div>

  <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">
    {{ $curso->titulo }}
  </h1>

  <p class="text-gray-600 max-w-3xl mx-auto leading-snug">
    Tu tutor virtual especializado está aquí para ayudarte con cualquier duda sobre el contenido del curso
  </p>
</header>
<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
    <header class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <x-icon.computer class="size-10 bg-white/90 rounded-full p-2" />
        <div>
          <h3 class="text-white font-semibold">Tutor Virtual FinanceClass</h3>
          <div class="flex items-center space-x-2">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
            <span class="text-white text-opacity-80 text-sm">En línea</span>
          </div>
        </div>
      </div>

      <div class="flex items-center space-x-2">
        <span id="chat-count" class="px-3 py-1 bg-white bg-opacity-20 text-stone-900 rounded-full text-sm font-medium">
          0 preguntas
        </span>
      </div>
    </header>
    <main>
      <div class="h-[30rem] bg-gray-50 p-4 overflow-auto" id="chat-messages">

      </div>
      <div class="p-4 border-t border-gray-200">
        <form class="flex space-x-2">
          <div class="flex-1 relative">
            <input type="text" id="chat-input"
              class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 placeholder-gray-500"
              placeholder="Escribe tu pregunta sobre el curso..." autocomplete="off" required>
            <button type="button" id="chat-clear"
              class="absolute right-3 top-1/2 transform -translate-y-1/2 p-1 text-gray-400 hover:text-gray-600 transition-colors duration-200 cursor-pointer"
              title="Limpiar chat">
              <x-icon.trash />
            </button>
          </div>
          <x-ui.button type="submit" variant="primary" id="chat-send" class="px-3 py-3">
            <x-icon.send />
          </x-ui.button>
        </form>

        {{-- <div class="mt-4 flex flex-wrap gap-2">
          <button
            class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
            📝 Resumen del curso
          </button>
          <button
            class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
            🎯 Conceptos clave
          </button>
          <button
            class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-gray-200 transition-colors duration-200">
            💪 Ejercicios
          </button>
        </div> --}}
      </div>
    </main>
  </div>
  <footer class="flex justify-between mt-5">
    <x-ui.button href="{{ route('cursos.show', $curso->codigo) }}"
      class="px-3 py-3 bg-gray-100 text-gray-700 hover:bg-gray-200">
      <x-icon.arrow-left />
      Volver al contenido
    </x-ui.button>
    <x-ui.button href="{{ route('cursos.examen', $curso->codigo) }}" variant="sunset" class="px-3 py-3">
      <x-icon.storm />
      Ir al examen
    </x-ui.button>
  </footer>
</section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const chat = {
    count: 0,
    form: null,
    input: document.getElementById('chat-input'),
    messages: document.getElementById('chat-messages'),
    button: document.getElementById('chat-send'),
    counter: document.getElementById('chat-count'),
    clear: document.getElementById('chat-clear'),
    curso: @json($curso->codigo)
  };

  function addMessage(text, isUser = false) {
    const msg = document.createElement('div');
    msg.className = isUser
      ? 'flex justify-end mb-3'
      : 'flex justify-start mb-3';

    const bubble = document.createElement('div');
    bubble.className = isUser
      ? 'bg-indigo-500 text-white px-4 py-2 rounded-2xl max-w-xs text-sm shadow'
      : 'bg-white border border-gray-300 text-gray-800 px-4 py-2 rounded-2xl max-w-xs sm:max-w-md text-sm shadow';

    bubble.innerHTML = marked.parse(text);
    msg.appendChild(bubble);
    chat.messages.appendChild(msg);
    chat.messages.scrollTop = chat.messages.scrollHeight;
  }

  chat.clear.addEventListener('click', () => {
    chat.messages.innerHTML = '';
    chat.count = 0;
    chat.counter.textContent = '0';
  });

  chat.button.addEventListener('click', (event) => {
    event.preventDefault();

    const q = chat.input.value.trim();
    if (!q) return;

    addMessage(q, true);
    chat.count++;
    chat.counter.textContent = chat.count;
    chat.input.value = '';
    addMessage('<em>Escribiendo...</em>');

    console.log(JSON.stringify({ pregunta: q }))

    fetch(`/cursos/${chat.curso}/chat`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ pregunta: q })
    }).then(async res => {
    if (!res.ok) throw new Error('Error al responder');

    const reader = res.body.getReader();
    const decoder = new TextDecoder();
    const msg = document.createElement('div');
    msg.className = 'flex justify-start mb-3';
    chat.messages.lastChild.remove();

    const bubble = document.createElement('div');
    bubble.className = 'bg-white border border-gray-300 text-gray-800 px-4 py-2 rounded-2xl max-w-sm sm:max-w-lg text-sm shadow';

    const paragraph = document.createElement('p');
    paragraph.className = 'space-y-5';
    bubble.appendChild(paragraph);
    msg.appendChild(bubble);
    chat.messages.appendChild(msg);

    chat.messages.scrollTop = chat.messages.scrollHeight;

    let fullText = '';

    while (true) {
      const { done, value } = await reader.read();
      if (done) break;

      const chunk = decoder.decode(value, { stream: true });
      fullText += chunk;
      paragraph.innerHTML = marked.parse(fullText);
      chat.messages.scrollTop = chat.messages.scrollHeight;
    }
    }).catch(err => {
        chat.messages.lastChild.innerHTML = `<span class="text-red-500">Error: ${err.message}</span>`;
      });
    });
    addMessage(`¡Hola! 👋 Soy tu tutor virtual para el curso **{{ $curso->titulo }}**. Puedes preguntarme sobre los temas del contenido o pedir recomendaciones.`);
});
</script>