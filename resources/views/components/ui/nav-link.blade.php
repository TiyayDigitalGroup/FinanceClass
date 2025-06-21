@props(['class' => ''])

@php
  $active = request()->url() === url($href);
@endphp

<li>
  <a href="{{ $href }}"
    {{ $attributes->merge([
        'class' =>
            ($active ? 'text-blue-600 bg-blue-50 active-nav ' : 'hover:text-blue-600 hover:bg-blue-50 ') .
            'font-medium block px-2.5 py-1.5 md:py-4 content-center relative max-md:rounded-t-lg ' .
            $class,
    ]) }}>
    {{ $slot }}
  </a>
</li>

<style>
  li>a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 50%;
    background: linear-gradient(90deg, #3b82f6, #1d4ed8);
    transition: all 0.3s ease;
    transform: translateX(-50%);
  }

  li>a:hover::after,
  li>a.active-nav::after {
    width: 100%;
  }
</style>
