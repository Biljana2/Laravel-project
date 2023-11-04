<x-layout>
    <x-settings >
        <h1 class="ml-10 mb-6 font-bold text-m">Add new Tickets</h1>
        <form method="POST" action="{{ route('admin.tickets.store') }}">
            @csrf
            @isset($ticket)
                <x-form.input name="event_id" :value="$ticket->event_id" />
                <x-form.input name="price" :value="$ticket->price" />
                <x-form.input name="seat_category" :value="$ticket->seat_category" />
                <x-form.input name="max_no_user" :value="$ticket->max_no_user" />
                <x-form.input name="max_no" :value="$ticket->max_no" />
            @else
                <!-- Fields for creating a new ticket -->
                <x-form.input name="event_id" />
                <x-form.input name="price" />
                <x-form.input name="seat_category" />
                <x-form.input name="max_no_user" />
                <x-form.input name="max_no" />
            @endisset

            <div class="mb-6">
                <x-primary-button type="submit">Publish</x-primary-button>
            </div>
        </form>
    </x-settings>
</x-layout>
