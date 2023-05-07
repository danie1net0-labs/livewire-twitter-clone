<div
  class="border-y-[0.625px] border-lines py-2 px-3 bg-transparent hover:bg-opacity-20 hover:bg-gray-900 cursor-pointer"
>
  <div class="flex align-top space-x-3">
    <img
      alt="User avatar"
      draggable="true"
      class="w-11 h-11 rounded-full"
      src="{{  Vite::asset('resources/images/avatar.png') }}"
    />

    <div class="w-full">
      <div class="flex justify-between w-full">
        <div>
          <span class="text-white font-semibold text-base flex items-center space-x-1">
            <span>
              {{ $tweet->createdBy->name }}
            </span>

            @if($tweet->createdBy->subscribed('default'))
              <x-icons.blue-badge />
            @endif

            @if($tweet->createdby->subscribed('verified-org'))
              <x-icons.gold-badge />
            @endif
          </span>

          <span class="text-sm text-neutral-500">
            @username · <span class="text-[15px]">1h</span>
          </span>
        </div>

        <div>
          <x-tweet.action icon="dots" color="gray"/>
        </div>
      </div>

      <div class="text-[15px] -mt-2.5">
        {{ $tweet->body }}
      </div>

      <div class="flex items-center justify-between w-4/5 -ml-3 mt-3">
        <x-tweet.action icon="reply" color="blue" counter="21"/>
        <x-tweet.action icon="retweet" color="green" counter="4"/>
        <x-tweet.action icon="like" color="pink" counter="101"/>
        <x-tweet.action icon="view" color="blue" counter="75.3K"/>
        <x-tweet.action icon="share" color="blue"/>
      </div>
    </div>
  </div>
</div>
