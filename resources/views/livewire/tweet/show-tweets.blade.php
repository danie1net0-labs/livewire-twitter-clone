<div
  class="text-center text-twitter text-sm py-4 bg-transparent hover:bg-opacity-20 hover:bg-gray-900 cursor-pointer"
  wire:click="more"
  wire:poll.keep-alive
>
  Mostrar {{ $this->count }} Tweets
</div>
