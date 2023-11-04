<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row space-x-6">
                    <div x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" class="bg-green-500 text-white uppercase ml-5 font-semibold text-sm py-2 px-10 rounded-xl hover:bg-green-600">
                            Events
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false" > 
                          
                            <ul class="ml-10">
                                <li>
                                    <a href="/admin/events/create">Create new</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ isOpen: false }">
                       <button @click="isOpen = !isOpen" class="bg-green-500 text-white uppercase ml-5 font-semibold text-sm py-2 px-10 rounded-xl hover:bg-green-600">
                            Categories
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false">
                                <ul class="ml-10">
                                <li>
                                    <a href="/admin/categories/create">New Category</a>
                                </li>
                                <li>
                                    <a href="/admin/categories">All categories</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen" class="bg-green-500 text-white uppercase ml-5 font-semibold text-sm py-2 px-10 rounded-xl hover:bg-green-600">
                            Users
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false">
                              <ul class="ml-10">
                        
                                <li>
                                    <a href="/admin/users">All users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ isOpen: false }">
                      <button @click="isOpen = !isOpen" class="bg-green-500 text-white uppercase ml-5 font-semibold text-sm py-2 px-10 rounded-xl hover:bg-green-600">
                            Comments
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false">
                                 <ul class="ml-10">
                              
                                <li>
                                    <a href="/admin/comments">All comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ isOpen: false }">
                   <button @click="isOpen = !isOpen" class="bg-green-500 text-white uppercase ml-5 font-semibold text-sm py-2 px-10 rounded-xl hover:bg-green-600">
                            Tickets
                        </button>

                        <div x-show="isOpen" @click.away="isOpen = false">
                               <ul class="ml-10">
                                <li>
                                    <a href="/admin/tickets/create">New Tickets</a>
                                </li>
                                <li>
                                    <a href="/admin/tickets">All tickets</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
