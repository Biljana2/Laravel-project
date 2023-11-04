<x-layout>
<x-settings>
	<h1 class="ml-10 mb-6 font-bold text-m">Publis new Event</h1>
<form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
    @csrf
	    <x-form.input  name="title" />
		<x-form.input  name="slug" />
		<x-form.input  name="town" />
		<x-form.input  name="place" />
		<x-form.input  name="picture" type="file" />
		<x-form.textarea  name="excerpt" />
		<x-form.textarea  name="body" />
		
		
		<div class="mb-6">
		<label class="block mb-2 uppercase font-bold text-xs " for="category"> Category</label>
		   <select name="category_id" id="category_id" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-56 text-left lg:inline-flex rounded-xl bg-gray-100 mr-4">
        @php
        $categories = \App\Models\Category::all();
        @endphp
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
        @endforeach
    </select>
		@error('category')

		<p>{{ $message }}</p>
		@enderror

		</div>
	
			<x-primary-button type="submit" >Publish</x-primary-button >
	</form>
</x-settings >
</x-layout>