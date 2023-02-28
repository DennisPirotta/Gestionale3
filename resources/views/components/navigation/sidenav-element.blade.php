<Link href="{{ $redirect ?? '' }}" class="relative z-50 flex items-center p-4 text-base font-normal text-gray-900 rounded-lg {{ $active ? 'bg-blue-100' : 'bg-gray-100' }} ">
    <svg aria-hidden="true" class="w-6 h-6" stroke-width="1.5" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        {{ $svg }}
    </svg>
    <span class="ml-1">{{ $title }}</span>
</Link>
