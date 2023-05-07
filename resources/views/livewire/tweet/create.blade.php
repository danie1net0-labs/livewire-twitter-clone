<div class="px-3">
  <div class="flex align-top">
    <img
      alt="User avatar"
      draggable="true"
      class="w-11 h-11 rounded-full"
      src="{{  Vite::asset('resources/images/avatar.png') }}"
    />

    <div x-data="{ editing: false }" class="w-full">
      <label>
          <textarea
            wire:model="body" placeholder="O que está acontecendo?"
            @click="editing = true"
            class="bg-transparent placeholder-gray-500 text-white text-xl w-full border-none resize-none focus:outline-none focus:ring-0 mt-1"
            rows="2"
            cols="50"
          ></textarea>
      </label>

      <div class="flex justify-between" :class="{ 'border-t-[0.625px] border-lines pt-4' : editing }">
        <div class="flex items-center space-x-1">
          <x-tweet.action icon="media"/>
          <x-tweet.action icon="gif"/>
          <x-tweet.action icon="poll"/>
          <x-tweet.action icon="emoji"/>
          <x-tweet.action icon="schedule"/>
          <x-tweet.action icon="gps" disabled/>
        </div>

        <x-buttons.tweet sm wire:click="tweet">
          Tweetar
        </x-buttons.tweet>
      </div>
    </div>
  </div>
</div>
