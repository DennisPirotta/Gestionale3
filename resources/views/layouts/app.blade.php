<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            {{ $slot }}
        </div>
    </main>
</div>
