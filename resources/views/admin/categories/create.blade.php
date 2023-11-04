<x-layout>



<x-settings >
		<h1 class="ml-10 mb-6 font-bold text-m">Add new Category</h1>
<form method="POST" action="{{ route('admin.categories.store') }}" />
    @csrf
	<x-form.input  name="name" />
		<x-form.input  name="slug" />
		

		
	
			<x-primary-button type="submit" >Publish</x-primary-button >
	</form>
</x-settings >


</x-layout>