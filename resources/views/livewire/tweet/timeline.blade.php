<div class="text-white text-lg w-full">
  @foreach($this->tweets as $tweet)
    <x-tweet :tweet="$tweet" />
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
