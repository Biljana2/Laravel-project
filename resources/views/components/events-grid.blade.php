@props(['events'])

    <x-event-featured-card :event="$events[0]" />
    @if ($events->count() >1)

       <div class="lg:grid lg:grid-cols-6">
    @foreach($events->skip(1) as $event)
        <x-event-card :event="$event" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
    @endforeach
</div>
@endif