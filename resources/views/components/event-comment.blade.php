  @props(['comment'])
  <article class="flex border border-gray-300 bg-gray-100 p-6 rounded-xl space-x-4">  
                    <div style="flex-shrink: 0;">   
                        <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60px" height="40" class="rounded-xl">
                    </div>
                    <div>   
                        <header>
                            <h3 class="font-bold"> {{ $comment->author->username }}  </h3>
                            <p class="text-xs">
                                <time>{{ $comment->created_at }}</time>
                            </p>
                        </header>
                        <p>{{ $comment->body }}</p>
                    </div> 

                    </article>