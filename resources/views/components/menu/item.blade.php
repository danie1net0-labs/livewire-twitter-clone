@props([
  'route',
  'icon',
  'title' => '',
])

<a
  href="{{ $route }}"
  {{ $attributes->class([
    'bg-transparent hover:bg-gray-200 hover:bg-opacity-10 rounded-full pl-3 pr-6 py-3.5 flex w-auto space-x-4 mr-auto',
  ]) }}
>
  <div class="flex items-center">
    <x-dynamic-component :component="'icons.' . $icon" class="w-7 fill-[#d6d9db]"/>
  </div>

  @if($title)
    <div @class(['text-xl', 'font-bold' => request()->path() === $route])>
      {{ $title }}
    </div>
  @endif
</a>
