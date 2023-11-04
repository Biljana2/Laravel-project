
<section class=" py-8 max-w-4xl mx-auto">

<div class="flex">	
	<ul>
<li>  
	<x-secondary-button>
		<a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}"> Dashboard</a>
			</x-secondary-button>
</li>
	</ul>
<main class="flex-1">
{{ $slot }}
</main>
</div>	
</section>