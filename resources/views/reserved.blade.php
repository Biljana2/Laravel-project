<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <header class="text-center font-bold">
               You bought tickest for:
            </header>

<div class="bg-white  p-6 rounded-lg shadow-lg">
<p>Event: {{ $event->title }}</p>
<p>Place: {{ $event->town }}</p>
<p>Date: {{ $event->published_at }}</p>
<p>Seat Category: {{ $ticket->seat_category }}</p>
<p></p>
<p>Price: ${{ $ticket->price }}</p>
</div>
Back to the homepage   <x-primary-button><a href="/">Go</a></x-primary-button>
</x-layout>