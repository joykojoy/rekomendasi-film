<div class="fixed left-0 top-0 w-64 h-screen bg-gray-900 p-4 transform transition-transform duration-150 ease-in-out md:translate-x-0" id="sidebar">
    <div class="flex flex-col space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-yellow-400 text-xl font-bold">Menu</h2>
            <button class="md:hidden text-gray-400 hover:text-white" id="closeSidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}" class="flex items-center text-gray-300 hover:text-yellow-400 py-2">
                <span class="mr-3">🏠</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('films.index') }}" class="flex items-center text-gray-300 hover:text-yellow-400 py-2">
                <span class="mr-3">🎬</span>
                <span>All Films</span>
            </a>
            <a href="{{ route('films.recommendations') }}" class="flex items-center text-gray-300 hover:text-yellow-400 py-2">
                <span class="mr-3">⭐</span>
                <span>Recommendations</span>
            </a>
            <a href="{{ route('films.newforyou') }}" class="flex items-center text-gray-300 hover:text-yellow-400 py-2">
                <span class="mr-3">🆕</span>
                <span>New For You</span>
            </a>
        </nav>
    </div>
</div>