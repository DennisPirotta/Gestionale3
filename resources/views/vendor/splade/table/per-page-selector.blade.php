<select
    name="per_page"
    class="block focus:ring-indigo-500 focus:border-indigo-500 min-w-max shadow-sm text-sm border-gray-300 rounded-md dark:border-gray-600 dark:text-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600 "
    @change="table.updateQuery('perPage', $event.target.value)"
  >
    @foreach($table->allPerPageOptions() as $perPage)
        <option value="{{ $perPage }}" @selected($perPage === $table->perPage())>
            {{ $perPage }} {{ __('per page') }}
        </option>
    @endforeach
</select>
