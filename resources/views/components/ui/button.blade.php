<{{ $tag }}
    @if($tag === 'a') href="{{ $href }}" @endif
    @if($tag === 'button') type="{{ $type }}" @endif
    {{ $attributes->merge(['class' => $finalClass]) }}
>
  {{ $slot }}
</{{ $tag }}>
