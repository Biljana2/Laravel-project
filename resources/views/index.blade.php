<x-layout>
   @include('_event-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if (count($events))
            <x-event-featured-card :event="$events[0]" />
            @if ($events->count() > 1)
                <div class="lg:grid lg:grid-cols-2">
                    @foreach($events->skip(1) as $event)
                        <x-event-card :event="$event" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
                {{ $events->link() }}
            @else
                <p>No events. Please come back later.</p>
            @endif
        @endif
    </main>
</x-layout>