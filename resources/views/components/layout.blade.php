<!doctype html>

<title>Tickets</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/Logo.jpg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
              @auth
    <x-dropdown>
        <x-slot name="trigger">
            <button class="text-xs font-bold uppercase">
                Dobrodosli {{ auth()->user()->username }}!
            </button>
        </x-slot>

        @admin
          <div class="flex items-center">
    <a href="{{ route('dashboard') }}" class="text-xs font-bold mx-auto">
        Dashboard
    </a>
</div>
            
        @endadmin
    </x-dropdown>

    <form method="POST" action="/logout" class="text-xs text-blue-500 font-semibold ml-6">
        @csrf
        <x-primary-button type="submit">Log Out</x-primary-button>
    </form>
@else
    <x-primary-button>
        <a href="/register" class="text-xs font-bold uppercase">Register</a>
    </x-primary-button>
    <x-primary-button>
        <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
    </x-primary-button>
@endauth
             
            </div>
        </nav>

      {{ $slot }}
    <footer class="bg-green-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
   <div class="col-span-1">
        <img src="/images/Logo.jpg" alt="Company Logo" style="width: 145px;">
      </div>
  
  <div class="lg:grid lg:grid-cols-3 ml-20">
    

    <div class="col-lg-2 col-6">
      <h4><b>Usefull links</b></h4>
      <ul>
        <li><a href="#">Home Page</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="#">Log Out</a></li>
        <li><a href="#">Log In</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4><b>Services</b></h4>
      <ul>
        <li><a href="#">Buy tickets </a></li>
        <li><a href="#">Reserve</a></li>
        <li><a href="#">Transfer</a></li>
 
      </ul>
    </div>

    <div class="text-left margin-auto">
      <h4><b>Contact</b></h4>
      <p>  
        Belgrade, Serbia<br>
        <strong>Phone:</strong> 1234567<br>
        <strong>Email:</strong> ccc-ccc@gmail.com<br>
      </p>
    </div>
  </div>

  <div class="container mt-4">
    <div class="copyright">
      &copy;  <strong><span>KullBeg</span></strong>All rights reserved.
    </div>
    <div class="credits">
      Designed by ccc
    </div>
  </div>
</footer>

      

                  
                    </form>
                </div>
            </div>
        </footer>
    </section>

</body>
