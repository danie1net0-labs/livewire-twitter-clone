<div class="px-5 py-3 cursor-pointer hover:bg-neutral-800 space-y-px">
  <div class="flex items-center justify-between relative">
    <span class="text-xs text-neutral-500">
      {{ $topic }}
    </span>

    <x-tweet.action icon="dots" color="blue" class="absolute right-1"/>
  </div>

  <div class="text-white font-bold">
    {{ $title }}
  </div>

  <div class="text-sm text-neutral-500">
    {{ $count }} Tweets
  </div>
</div>
