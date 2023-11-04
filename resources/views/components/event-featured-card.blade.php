
@props(['event'])
<article
                class="transition-colors duration-300 bg-green-100 hover:bg-green-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                      <img src="{{ asset( $event->picture) }}" alt="" class="rounded-xl">


                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
                               <x-category-button :category="$event->category" />
                               
                                </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">

                                  
                                  {{ $event->title }}

                                 
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
    <i class="text-sm" id="loginMessage" style="display: none">You must be logged in to see more</i>
    <a href="/events/{{ $event->slug }}"
        class="transition-colors duration-300 text-xs font-semibold bg-green-500 hover:bg-green-300 rounded-full py-2 px-8"
        id="seeMoreButton"
    >See More</a>
</div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add an event listener to the "See More" button
    document.getElementById("seeMoreButton").addEventListener("click", function(event) {
        // Check if the user is authenticated
        @auth
            // User is logged in, do nothing
        @else
            // User is not logged in, show the message
            event.preventDefault(); // Prevent the default link behavior
            document.getElementById("loginMessage").style.display = "inline"; // Display the message
        @endauth
    });
</script>

</footer>

                    </div>
                </div>
            </article>