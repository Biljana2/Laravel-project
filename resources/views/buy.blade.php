<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <header class="text-center font-bold">
                Get your tickets for <h1 class="text-green-500 text-4xl">{{ $event->title }}</h1>
            </header>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <div class="bg-white  p-6 rounded-lg shadow-lg">
               <form method="POST" action="{{ route('purchaseTickets') }}">
                    @csrf
                    <div class=" item-center w-full flex  flex-wrap bg-white p-6 ">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
           <select id="seat-category" name="ticket_id" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-56 text-left lg:inline-flex rounded-xl bg-gray-100 mr-4">
    <option value="">Select a seat category</option>
    @foreach ($tickets as $ticket)
        <option value="{{ $ticket->id }}" data-max-no-user="{{ $ticket->max_no_user }}" data-price="{{ $ticket->price }}">
            {{ $ticket->seat_category }}
        </option>
    @endforeach
</select>

<select id="ticket_quantity" name="ticket_quantity" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-24 text-left lg:inline-flex rounded-xl bg-gray-100 ml-10 mr-10">
    <option value="">Select a seat category first</option>
</select>

                    <p id="total-price-display" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-52 text-left lg:inline-flex rounded-xl bg-green-100 ml-10 mr-10">Total Price: $<span id="total-price">0.00</span></p>

                    <x-primary-button type="submit">Buy Ticket</x-primary-button>
                   
</div>
                </form>
            </div>
        </main>
    </section>
</x-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     document.addEventListener("DOMContentLoaded", function () {
        // JavaScript to update the available ticket quantity
        const seatCategory = document.getElementById('seat-category');
        const ticketQuantity = document.getElementById('ticket_quantity');
 const totalPriceDisplay = document.getElementById('total-price');
        seatCategory.addEventListener('change', updateTicketQuantity);
  ticketQuantity.addEventListener('change', updateTotalPrice);
function updateTotalPrice() {
    const selectedOption = seatCategory.options[seatCategory.selectedIndex];
    const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
    const selectedQuantity = parseInt(ticketQuantity.value) || 0;
    const total = price * selectedQuantity;

    totalPriceDisplay.innerText = `${total.toFixed(1)}`;
}



        function updateTicketQuantity() {
            const selectedOption = seatCategory.options[seatCategory.selectedIndex];
            const maxNoUser = parseInt(selectedOption.getAttribute('data-max-no-user')) || 0;

            // Update the ticket quantity select options based on the selected seat category
            ticketQuantity.innerHTML = '';
            for (let i = 1; i <= maxNoUser; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.text = i;
                ticketQuantity.appendChild(option);
            }
        }

        // Initialize the available ticket quantity when the page loads
        updateTicketQuantity();
          updateTotalPrice();
    });
</script>
