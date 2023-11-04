@props(['category'])

@if ($category)
    <a href="/categories/{{$category->slug}}"
       class="inline-flex items-center px-4 py-2 bg-white dark:bg-green-800 border border-green-300 dark:border-green-500 rounded-md font-bold text-xs text-gray-700 dark:text-green-900 uppercase tracking-widest shadow-sm hover:bg-green-50 dark:hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 disabled:opacity-25 transition ease-in-out duration-150"
       style="font-size: 12px">{{$category->name}}</a>
@else
    <p>No category provided</p>
@endif