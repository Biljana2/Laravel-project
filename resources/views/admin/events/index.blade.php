<x-layout>

<x-settings heading="Manage Event">
<div class="flex flex-col"> 
 <div class="-my-2 overflow-x-auto sm:mx-6 lg:mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200"> 
        	<thead class="border-gray-500">
    <tr>
        <th scope="col" class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Event title</th>
        <th scope="col" class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider whitespace-nowrap text-right font-medium">Action</th>
    </tr>
</thead>

            <body class="bg-white divide divide-gray-200">
                @foreach($events as $event)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="text-sm font-medium text-gray-900"> 
                            <a href="/events/{{$event->slug}}">
                     {{ $event->title}}

                     </a> 
                        </div>   
                        </div>
                        
                    </td>
                  
                   
                     <td class="py-6 px-4 whitespace-nowrap text-right text-sm font-medium">
       <form method="POST" action="{{ route('admin.events.destroy', $event->slug) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
                    </td>
                </tr>
                @endforeach
            </body>
        </table>   

        </div>
</x-settings >
</x-layout>