<x-splade-component is="dropdown" dusk="select-rows-dropdown" close-on-click>
    <x-slot:trigger>
        <input
            type="checkbox"
            class="text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-600 dark:border-gray-700"
            :checked="table.allVisibleItemsAreSelected"
        />
    </x-slot:trigger>

    <div class="mt-2 min-w-max rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
        <div class="flex flex-col">
            <button
                class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-normal"
                @click="table.setSelectedItems(@js($table->getPrimaryKeys()))"
                dusk="select-all-on-this-page">
                {{ __('Select all on this page') }} ({{ $table->totalOnThisPage() }})
            </button>

            @if($showPaginator())
                <button
                    class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-normal"
                    @click="table.setSelectedItems(['*'])"
                    dusk="select-all-results">
                    {{ __('Select all results') }} ({{ $table->totalOnAllPages() }})
                </button>
            @endif

            <button
                v-if="table.hasSelectedItems"
                class="text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 font-normal"
                @click="table.setSelectedItems([])"
                dusk="select-none">
                {{ __('Clear selection') }}
            </button>
        </div>
    </div>
</x-splade-component>
