@props([
    'sm' => null,
])

@php
  $sizes = 'py-4 text-lg';

  if($sm) {
      $sizes = 'py-1 px-4 text-base';
  }
@endphp

<button {{ $attributes->class(["bg-twitter font-semibold rounded-full text-center text-white $sizes"]) }}>
  {{ $slot }}
</button>
