<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <header class="text-center font-bold">
                You bought tickets for:
            </header>
            <!-- This is an example component -->

 <h2 class="text-2xl text-gray-500 font-bold">  Event: {{ $event->title }}</h2>
<style>

    .table {
    border-spacing: 0 15px;
  }

  i {
    font-size: 1rem !important;
  }

  .table tr {
    border-radius: 20px;
  }

  tr td:nth-child(n + 6),
  tr th:nth-child(n + 6) {
    border-radius: 0 0.625rem 0.625rem 0;
  }

  tr td:nth-child(1),
  tr th:nth-child(1) {
    border-radius: 0.625rem 0 0 0.625rem;
  }

</style>

  
<!-- component -->
<link
  href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
  rel="stylesheet"
/>
<div class="flex items-center justify-center min-h-screen bg-white">
  <div class="col-span-12">
    <div class="overflow-auto lg:overflow-visible">
      <div class="flex lg:justify-between border-b-2 border-fuchsia-900 pb-1">
       
       <div class="text-center flex-auto">

      <table class="table text-gray-400 border-separate space-y-6 text-sm">
        <thead class="bg-green-400 text-white">
          <tr>

            <th class="p-3">Town</th>
               <th class="p-3 text-left">Place</th>
            <th class="p-3 text-left">Date</th>
            <th class="p-3 text-left">Seat Category</th>
            <th class="p-3 text-left">Tickets no</th>

            <th class="p-3 text-left">Price per ticket</th>
            <th class="p-3 text-left">Total</th>
          </tr>
        </thead>
        <tbody>
      
          <tr class="bg-green-100 lg:text-black">
            <td class="p-3 font-medium capitalize">{{ $event->town }}</td>
             <td class="p-3 font-medium capitalize">{{ $event->place }}</td>
            <td class="p-3">{{ $event->published_at }}</td>
            <td class="p-3">{{ $ticket->seat_category }}</td>
            <td class="p-3 uppercase">{{ $userPurchaseCount }}</td>
            <td class="p-3 uppercase">${{ $ticket->price }}</td>
<td class="p-3 uppercase">${{ $userPurchaseCount * $ticket->price }}</td>
         
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

      

            Back to the homepage
            <x-primary-button><a href="/">Go</a></x-primary-button>
        </main>
    </section>
</x-layout>
