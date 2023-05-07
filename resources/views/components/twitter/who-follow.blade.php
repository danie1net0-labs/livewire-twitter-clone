<div class="flex items-center space-x-2 px-5 py-3 cursor-pointer hover:bg-neutral-800 space-y-px">
  <img
    alt="{{ $name . ' avatar' }}"
    draggable="true"
    class="w-10 h-10 rounded-full"
    src="{{ Vite::asset('resources/images/avatar.png') }}"
  />

  <div class="w-full">
    <div class="flex justify-between w-full">
      <div>
        <div class="text-white font-medium text-sm">
          {{ $name }}
        </div>

        <div class="text-sm text-neutral-500">
          {{ $username }}
        </div>
      </div>

      <div class="flex items-center">
        <button class="bg-white rounded-full text-black py-[4px] font-semibold text-sm px-5 ">
          Seguir
        </button>
      </div>
    </div>
  </div>
</div>
