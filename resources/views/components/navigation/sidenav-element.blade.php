<Link href="{{ $redirect ?? '' }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 {{ $active ? 'bg-blue-400 dark:bg-blue-700' : 'bg-gray-100 dark:bg-gray-800' }} ">
    <svg aria-hidden="true" class="w-6 h-6" stroke-width="1.5" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        {{ $svg }}
    </svg>
    <span class="ml-1">{{ $title }}</span>
</Link>
