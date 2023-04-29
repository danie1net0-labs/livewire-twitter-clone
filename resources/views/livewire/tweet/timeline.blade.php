<div class="divide-y divide-gray-300">
  @foreach($tweets as $tweet)
      <div class="flex-4 p-4">
{{--        <div class="mr-2">--}}
{{--          <img src="{{ $tweet->createdBy->avatar }}" alt="avatar" class="rounded-full mr-2 w-8 h-8">--}}
{{--        </div>--}}

        <div>
          <h5 class="font-bold mb-2">
            <a >
              {{ $loop->iteration }} - {{ $tweet->createdBy->name }}
            </a>
          </h5>

          <p class="text-sm">
            {{ $tweet->body }}
          </p>
        </div>
      </div>
  @endforeach

  <div x-init="observeScroll()" x-data="{
    observeScroll() {
      const observer = new IntersectionObserver((items) => {
        items.forEach(item => {
          if (item.isIntersecting) {
            @this.loadMore();
          }
        });
      }, {
        threshold: 1,
      });

      observer.observe(this.$el);
    },
  }"></div>
</div>
