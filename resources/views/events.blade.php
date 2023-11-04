<x-layout>
    @include('_event-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($events->count())
            <x-event-featured-card :event="$events[0]" />

            @if ($events->count() > 1)
                <div class="lg:grid">
                    @foreach ($events->skip(1) as $event)
                        @if ($loop->even)
                            <div class="col-span-2 lg:flex lg:flex-row-reverse">
                                <x-event-card :event="$event" />
                            </div>
                        @else
                            <div class="col-span-2">
                                <x-event-card :event="$event" />
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            {{ $events->links() }}
        @else
            <p class="text-center">No events. Try later!</p>
        @endif
    </main>
</x-layout>
