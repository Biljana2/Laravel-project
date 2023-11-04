@props(['event'])
<article class="transition-colors duration-300 bg-indigo-300 hover:bg-indigo-500 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl mb-6">
  <div class="py-6 px-5 lg:flex lg:flex-row-reverse">
        <div class="flex-1">
      <img src="{{ $event->picture }}" alt="" class="rounded-xl">

        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$event->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/events/{{ $event->slug }}">{{ $event->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $event->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {!! $event->excerpt !!}
                </p>
            </div>

           <footer class="flex justify-between items-center mt-8">
    <div class="hidden lg:block">
        <i class="text-sm">You must be logged in to</i>
        @auth
            <a href="/events/{{ $event->slug }}"
               class="transition-colors duration-300 text-xs font-semibold bg-green-500 hover:bg-green-300 rounded-full py-2 px-8"
            >See More</a>
        @else
            <x-primary-button>See More</x-primary-button>
        @endauth
    </div>
</footer>

        </div>
    </div>
</article>
