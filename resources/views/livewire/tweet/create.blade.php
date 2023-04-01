<div>
  <div>
    <x-textarea-input id="body" class="block mt-1 w-full" wire:model.defer="body" placeholder="What's up doc?"/>
    <x-input-error class="mt-1" :messages="$errors->get('body')"/>
  </div>

  <div class="flex justify-end mt-3">
    <x-primary-button class="ml-auto" wire:click="tweet">
      Tweet
    </x-primary-button>
  </div>
</div>
