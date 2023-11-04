<header class="max-w-xl mx-auto mt-20 text-center ">
    <h1 class="text-4xl">
        Search Latest <span class="text-green-500">Events</span>
    </h1>

    <form method="GET" action="{{ route('events.index') }}">
        <div class="mt-10 w-full flex items-center flex-wrap">
           

            <!-- Category Dropdown -->
            <div class="mb-2 lg:w-1/4">
                <select name="category" id="categorySelect" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-56 text-left lg:inline-flex rounded-xl bg-gray-100 mr-4">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Town Dropdown -->
            <div class="ml-40 mb-2 lg:w-1/4">
                <select name="town" id="townSelect" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-56 text-left lg:inline-flex rounded-xl bg-gray-100 mr-4">
                    <option value="">Select Town</option>
                </select>
            </div>

            <!-- Date Range Container -->
         <div class="ml-40 mb-2 lg:w-1/4 flex">
    <input type="date" name="date_from" id="dateFrom" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-40 text-left rounded-xl bg-gray-100 mr-4">
    <input type="date" name="date_to" id="dateTo" class="form-select py-2 pl-3 pr-9 text-sm font-semibold lg:w-40 text-left rounded-xl bg-gray-100">
</div>

            <!-- Submit Button -->
            <div class="mb-2 lg:w-1/4">
                <x-primary-button type="submit" >Search</x-primary-button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const categorySelect = $('#categorySelect');
            const townSelect = $('#townSelect');

            categorySelect.on('change', function () {
                const selectedCategory = $(this).val();
                const dateFrom = $('#dateFrom').val();
                const dateTo = $('#dateTo').val();

                // Make an Ajax request to fetch towns based on the selected category and date range
                $.get(`/getTownsByCategory/${selectedCategory}?date_from=${dateFrom}&date_to=${dateTo}`, function (data) {
                    townSelect.empty();
                    townSelect.append('<option value="">Select Town</option>');
                    data.forEach(function (town) {
                        townSelect.append(`<option value="${town}">${town}</option>`);
                    });
                });
            });
        });
    </script>
</header>
